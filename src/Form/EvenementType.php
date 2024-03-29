<?php

namespace App\Form;

use App\Entity\Evenements;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('businessAccount', TextType::class, [
            'label'         => 'Compte affaire  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le compte affaire ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('eventAccount', TextType::class, [
            'label'         => 'Compte évènement  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le compte évènement ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('lastEventCount', TextType::class, [
            'label'         => 'Compte dernier évènement  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le compte dernirer évènement ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('fileNumber', TextType::class, [
            'label'         => 'Numéro de fiche  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le libellé civilité ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('civilityWording', TextType::class, [
            'label'         => 'Libellé civilité  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le libellé civilité ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('currentVehicleOwner', TextType::class, [
            'label'         => 'Propriétaire actuel du véhicule  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le propriétaire actuel du véhicule ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('name', TextType::class, [
            'label'         => 'Nom  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le nom ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('firstName', TextType::class, [
            'label'         => 'Prénom  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le prénom ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('routeNumberAndName', TextType::class, [
            'label'         => 'N° et nom de la voie  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le n° et Nom de la voie ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('adressComplement', TextType::class, [
            'label'         => "Complement d'adresse 1  :",
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => "Le complement d'adresse 1 ne peut pas être vide.",
                ]),
            ],
        ])
        ->add('postalCode', TextType::class, [
            'label'         => 'Code postal  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le code postal ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('city', TextType::class, [
            'label'         => 'Ville  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'La ville ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('homePhone', TextType::class, [
            'label'         => 'Tel domicile  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le tel domicile ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('cellPhone', TextType::class, [
            'label'         => 'Tel portable  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le tel portable ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('phoneJob', TextType::class, [
            'label'         => 'Tel job  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le tel job ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('email', TextType::class, [
            'label'         => 'Email  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => "L'email ne peut pas être vide.",
                ]),
            ],
        ])
        ->add('dateOfCirculation', DateType::class, [
            'widget' => 'single_text',
            'label'  => 'Date de mise en circulation  :'
        ])
        ->add('purchaseDate', DateType::class, [
            'widget' => 'single_text',
            'label'  => 'Date achat (date de livraison)  :'
        ])
        ->add('lastEventDate', DateType::class, [
            'widget' => 'single_text',
            'label'  => 'Date dernier évènement (Veh)  :'
        ])
        ->add('brandName', TextType::class, [
            'label'         => 'Libellé marque  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le libellé marque ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('modelWording', TextType::class, [
            'label'         => 'Libellé modele  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le libellé modele ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('version', TextType::class, [
            'label'         => 'Version  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'La version ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('vin', TextType::class, [
            'label'         => 'VIN  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le vin ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('registration', TextType::class, [
            'label'         => 'Immatriculation  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => "L'immatriculation ne peut pas être vide.",
                ]),
            ],
        ])
        ->add('leadType', TextType::class, [
            'label'         => 'Type de prospect  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le type de prospect ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('mileage', TextType::class, [
            'label'         => 'Kilometrage   :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le kilometrage ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('energyLabel', TextType::class, [
            'label'         => 'Libellé energnie  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le libellé energnie ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('sellerVN', TextType::class, [
            'label'         => 'Vendeur vn  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le vendeur vn ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('sellerVO', TextType::class, [
            'label'         => 'Vendeur vo  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le vendeur vo ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('billingComment', TextType::class, [
            'label'         => 'Commentaire de facturation  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le commentaire de facturation ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('typeVoVn', TextType::class, [
            'label'         => 'Type vn vo  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le type vn vo ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('fileNumberVnVo', TextType::class , [
            'label'         => 'N° de dossier vo vn  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => 'Le n° de dossier vo vn ne peut pas être vide.',
                ]),
            ],
        ])
        ->add('vnSalesIntermediary', TextType::class, [
            'label'         => 'Intermediaire de vn  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => "L'intermediaire de vn ne peut pas être vide.",
                ]),
            ],
        ])
        ->add('eventDate', DateType::class, [
            'widget'    => 'single_text',
            'label'     => 'Date évènement (Veh)  :',
        ])
        ->add('originOfEvent', TextType::class, [
            'label'         => 'Origine évènement  :',
            'required'      => false,
            'constraints'   => [
                new NotBlank([
                    'allowNull' => true,
                    'message' => "L'origine évènement ne peut pas être vide.",
                ]),
            ],
        ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Evenements::class,
        ]);
    }
}
