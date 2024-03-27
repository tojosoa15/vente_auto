<?php

namespace App\Controller;

use App\Entity\Evenements;
use App\Form\ImportEvenementType;
use App\Repository\EvenementsRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ImportEvenementController extends AbstractController
{

    public function __construct(
        private EntityManagerInterface $em
    )
    {
    }

    #[Route('/import/evenement', name: 'app_import_evenement')]
    public function index(): Response
    {
        return $this->render('import_evenement/index.html.twig', [
            'controller_name' => 'ImportEvenementController',
        ]);
    }

    #[Route('/import-evenements', name: 'import_evenements')]
    public function importEvenements(Request $request): Response
    {
        $form = $this->createForm(ImportEvenementType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file           = $form->get('file')->getData();
            $spreadsheet    = IOFactory::load($file);
            $sheet          = $spreadsheet->getActiveSheet();
            $entityManager  = $this->em;
            $rowIterator    = $sheet->getRowIterator();
            $rowIterator->next();

            $firstRow       = true;

            foreach ($rowIterator as $row) {
                if ($firstRow) {
                    $firstRow = false;
                    continue;
                }

                $evenementData = [];
                foreach ($row->getCellIterator() as $cell) {
                    $evenementData[] = $cell->getValue();
                }

                $dateOfCirculation  = $this->formatDateExcel($evenementData[16]);
                $purchaseDate       = $this->formatDateExcel($evenementData[17]);
                $lastEventDate      = $this->formatDateExcel($evenementData[18]);
                $eventDate          = $this->formatDateExcel($evenementData[33]);

                // Création nouvelle evenement
                $evenement = new Evenements();
                $evenement->setBusinessAccount($evenementData[0]);
                $evenement->setEventAccount($evenementData[1]);
                $evenement->setLastEventCount($evenementData[2]);
                $evenement->setFileNumber(intval($evenementData[3]));
                $evenement->setCivilityWording($evenementData[4]);
                $evenement->setCurrentVehicleOwner($evenementData[5]);
                $evenement->setName($evenementData[6]);
                $evenement->setFirstName($evenementData[7]);
                $evenement->setRouteNumberAndName($evenementData[8]);
                $evenement->setAdressComplement($evenementData[9]);
                $evenement->setPostalCode(intval($evenementData[10]));
                $evenement->setCity($evenementData[11]);
                $evenement->setHomePhone(intval($evenementData[12]));
                $evenement->setCellPhone(intval($evenementData[13]));
                $evenement->setPhoneJob(intval($evenementData[14]));
                $evenement->setEmail($evenementData[15]);
                $evenement->setDateOfCirculation($dateOfCirculation);
                $evenement->setPurchaseDate($purchaseDate);
                $evenement->setLastEventDate($lastEventDate);
                $evenement->setBrandName($evenementData[19]);
                $evenement->setModelWording($evenementData[20]);
                $evenement->setVersion($evenementData[21]);
                $evenement->setVin($evenementData[22]);
                $evenement->setRegistration($evenementData[23]);
                $evenement->setLeadType($evenementData[24]);
                $evenement->setMileage(intval($evenementData[25]));
                $evenement->setEnergyLabel($evenementData[26]);
                $evenement->setSellerVN($evenementData[27]);
                $evenement->setSellerVO($evenementData[28]);
                $evenement->setBillingComment($evenementData[29]);
                $evenement->setTypeVoVn($evenementData[30]);
                $evenement->setFileNumberVnVo($evenementData[31]);
                $evenement->setVnSalesIntermediary($evenementData[32]);
                $evenement->setEventDate($eventDate);
                $evenement->setOriginOfEvent($evenementData[34]);
                // Persist evenement entity
                $entityManager->persist($evenement);
            }

            // Flush changement de la base de données
            $entityManager->flush();

            $this->addFlash('success', 'Evenements importer successfully.');

            return $this->redirectToRoute('import_evenements');
        }

        return $this->render('import_evenement/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    // Formater la date retourner par excel
    public function formatDateExcel($dateExcel)
    {
        $realDate = ($dateExcel-25569)*86400;
        $realDate = date("d-m-Y", $realDate);
        $realDate = new \DateTimeImmutable($realDate);

        return $realDate;
    }

    #[Route('/evenements', name: 'evenements_list', methods:['GET'])]
    public function ajaxListEvenements(): JsonResponse
    {
        $evenements = $this->em->getRepository(Evenements::class)->findAll();
        $data       = [];

        foreach ($evenements as $evenement) {
            $data[] = [
                'id'                    =>  $evenement->getId(),
                'compteAffaire'         => $evenement->getBusinessAccount(),
                'compteEvenement'       => $evenement->getEventAccount(),
                'lastEventCount'        => $evenement->getLastEventCount(),
                'fileNumber'            => $evenement->getFileNumber(),
                'civilityWording'       => $evenement->getCivilityWording(),
                'currentVehicleOwner'   => $evenement->getCurrentVehicleOwner(),
                'name'                  => $evenement->getName(),
                'firstName'             => $evenement->getFirstName(),
                'routeNumberAndName'    => $evenement->getRouteNumberAndName(),
                'adressComplement'      => $evenement->getAdressComplement(),
                'postalCode'            => $evenement->getPostalCode(),
                'city'                  => $evenement->getCity(),
                'homePhone'             => $evenement->getHomePhone(),
                'cellPhone'             => $evenement->getCellPhone(),
                'phoneJob'              => $evenement->getPhoneJob(),
                'email'                 => $evenement->getEmail(),
                'dateOfCirculation'     => $evenement->getDateOfCirculation()->format('d/m/Y'),
                'purchaseDate'          => $evenement->getPurchaseDate()->format('d/m/Y'),
                'lastEventDate'         => $evenement->getLastEventDate()->format('d/m/Y'),
                'brandName'             => $evenement->getBrandName(),
                'modelWording'          => $evenement->getModelWording(),
                'version'               => $evenement->getVersion(),
                'vin'                   => $evenement->getVin(),
                'registration'          => $evenement->getRegistration(),
                'leadType'              => $evenement->getLeadType(),
                'mileage'               => $evenement->getMileage(),
                'energyLabel'           => $evenement->getEnergyLabel(),
                'sellerVN'              => $evenement->getSellerVN(),
                'sellerVO'              => $evenement->getSellerVO(),
                'billingComment'        => $evenement->getBillingComment(),
                'typeVoVn'              => $evenement->getTypeVoVn(),
                'fileNumberVnVo'        => $evenement->getFileNumberVnVo(),
                'vnSalesIntermediary'   => $evenement->getVnSalesIntermediary(),
                'eventDate'             => $evenement->getEventDate()->format('d/m/Y'),
                'originOfEvent'         => $evenement->getOriginOfEvent()
            ];
        }

        return new JsonResponse($data);
    }

    #[Route('/{id}/show', name: 'show_evenement', methods: ['GET'])]
    public function show(Evenements $evenement): Response
    {
        return $this->render('import_evenement/show.html.twig', [
            "evenement" => $evenement
        ]);
    }

    #[Route('/{id}/edit', name: 'edit_evenement', methods:['GET', 'POST'])]
    public function edit(Request $request, Evenements $bom, EvenementsRepository $evenementsRepository): Response
    {
        return $this->render('import_evenement/edit.html.twig');
    }

    #[Route('/{id}/delete', name: 'delete_evenement', methods:['GET'])]
    public function delete(Evenements $evenement, EvenementsRepository $evenementsRepository): Response
    {
        $id    = $evenement->getId();
        $order = $evenementsRepository->findBy(['id' => $id]);

        if(empty($order)){
            $evenementsRepository->remove($evenement, true);
            $this->addFlash('success', 'Suppression réussie');
        } else {
            $this->addFlash('error', 'Erreur de suppression');
        }

        return $this->redirectToRoute('app_import_evenement');
    }
}
