$(document).ready(function() {

    //loadListEvenement();

    $('#evenements-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": "{{ path('evenements_list') }}",
        "columns": [
            {"data": "id"},
            {"data": "compteAffaire"},
            {"data": "compteEvenement"},
            {"data": "lastEventCount"},
            {"data": "fileNumber"},
            {"data": "civilityWording"},
            {"data": "currentVehicleOwner"},
            {"data": "name"},
            {"data": "firstName"},
            {"data": "routeNumberAndName"},
            {"data": "adressComplement"},
            {"data": "postalCode"},
            {"data": "city"},
            {"data": "homePhone"},
            {"data": "cellPhone"},
            {"data": "phoneJob"},
            {"data": "email"},
            {"data": "dateOfCirculation"},
            {"data": "purchaseDate"},
            {"data": "lastEventDate"},
            {"data": "brandName"},
            {"data": "modelWording"},
            {"data": "version"},
            {"data": "vin"},
            {"data": "registration"},
            {"data": "leadType"},
            {"data": "mileage"},
            {"data": "energyLabel"},
            {"data": "sellerVN"},
            {"data": "sellerVO"},
            {"data": "billingComment"},
            {"data": "typeVoVn"},
            {"data": "fileNumberVnVo"},
            {"data": "vnSalesIntermediary"},
            {"data": "eventDate"},
            {"data": "originOfEvent"},
            {
                "data": "id",
                render: function (data, type, row) {
                    let urlDelete       = $('#evenements-table').data('url-delete').replace('/0/', '/' + data + '/');
                    let urlEdit         = $('#evenements-table').data('url-edit').replace('/0/', '/' + data + '/');
                    let urlShow         = $('#evenements-table').data('url-show').replace('/0/', '/' + data + '/');

                    var imagePathShow   = $('#evenements-table').data('src-show');
                    var imagePathEdit   = $('#evenements-table').data('src-edit');
                    var imagePathDelete = $('#evenements-table').data('src-delete');

                    let showButton = `<div class="d-flex align-items-center">
                                        <a href="${urlShow}" class="p-0 btn btn-icon btn-sm kl-text-21" data-toggle="tooltip" title="Voir">
                                            <img src="${imagePathShow}" />
                                        </a>`;
                    let editButton = `<a href="${urlEdit}" class="p-0 pt-2 btn btn-icon btn-sm pen-vertical-icon kl-text-21" data-toggle="tooltip" title="Modifier">
                                            <img src="${imagePathEdit}" />
                                        </a>`;
                    let deleteButton = `<a href="javascript:;" data-href="${urlDelete}" class="p-0 btn btn-icon btn-sm remove-item-datatable kl-text-21"
                                        data-message="Êtes-vous sûr de bien vouloir supprimer cette evenement?"
                                        data-toggle="tooltip" title="Supprimer">
                                            <img src="${imagePathDelete}" />
                                        </a>`;

                    return `<div class="d-flex align-items-center">${showButton} ${editButton} ${deleteButton}</div>`;
                }
            }
        ],
        "ajax": {
            "url": $('#evenements-table').data('url'),
            "dataSrc": ""
        }
    });

    // Suppretion d'un evenement
    $(document).on('click', '.remove-item-datatable', function(e) {
        e.preventDefault();
        var deleteUrl = $(this).data('href');

        $.ajax({
            url: deleteUrl,
            type: 'GET',
            success: function(response) {
                $('#success-response').text(response.message).addClass('show');

                $('#evenements-table').DataTable().ajax.reload();

                setTimeout(function() {
                    $('#success-response').removeClass('show');
                }, 5000);
            },
            error: function(error) {
                // Gérer les erreurs
                console.error('Une erreur s\'est produite : ', error);
            }
        });
    });

    // Ajout d'un evenement
    $(document).on('click', '#add-evenement-btn', function(e) {
        e.preventDefault();

        $('#compteAffaire').val('');
        $('#compteEvenement').val('');
        $('#lastEventCount').val('');
        $('#fileNumber').val('');
        $('#civilityWording').val('');
        $('#currentVehicleOwner').val('');
        $('#name').val('');
        $('#firstName').val('');
        $('#routeNumberAndName').val('');
        $('#adressComplement').val('');
        $('#postalCode').val('');
        $('#city').val('');
        $('#homePhone').val('');
        $('#cellPhone').val('');
        $('#phoneJob').val('');
        $('#email').val('');
        $('#dateOfCirculation').val('');
        $('#purchaseDate').val('');
        $('#lastEventDate').val('');
        $('#brandName').val('');
        $('#modelWording').val('');
        $('#version').val('');
        $('#vin').val('');
        $('#registration').val('');
        $('#leadType').val('');
        $('#mileage').val('');
        $('#energyLabel').val('');
        $('#sellerVN').val('');
        $('#sellerVO').val('');
        $('#billingComment').val('');
        $('#typeVoVn').val('');
        $('#fileNumberVnVo').val('');
        $('#vnSalesIntermediary').val('');
        $('#eventDate').val('');
        $('#originOfEvent').val('');

        $('#ajoutEvenementModal').modal('show');
    });

    $(document).on('submit', '#ajout-evenement-form', function(e) {
        e.preventDefault();

        var compteAffaire       = $('#compteAffaire').val();
        var compteEvenement     = $('#compteEvenement').val();
        var lastEventCount      = $('#lastEventCount').val();
        var fileNumber          = $('#fileNumber').val();
        var civilityWording     = $('#civilityWording').val();
        var currentVehicleOwner = $('#currentVehicleOwner').val();
        var name                = $('#name').val();
        var firstName           = $('#firstName').val();
        var routeNumberAndName  = $('#routeNumberAndName').val();
        var adressComplement    = $('#adressComplement').val();
        var postalCode          = $('#postalCode').val();
        var city                = $('#city').val();
        var homePhone           = $('#homePhone').val();
        var cellPhone           = $('#cellPhone').val();
        var phoneJob            = $('#phoneJob').val();
        var email               = $('#email').val();
        var dateOfCirculation   = $('#dateOfCirculation').val();
        var purchaseDate        = $('#purchaseDate').val();
        var lastEventDate       = $('#lastEventDate').val();
        var brandName           = $('#brandName').val();
        var modelWording        = $('#modelWording').val();
        var version             = $('#version').val();
        var vin                 = $('#vin').val();
        var registration        = $('#registration').val();
        var leadType            = $('#leadType').val();
        var mileage             = $('#mileage').val();
        var energyLabel         = $('#energyLabel').val();
        var sellerVN            = $('#sellerVN').val();
        var sellerVO            = $('#sellerVO').val();
        var billingComment      = $('#billingComment').val();
        var typeVoVn            = $('#typeVoVn').val();
        var fileNumberVnVo      = $('#fileNumberVnVo').val();
        var vnSalesIntermediary = $('#vnSalesIntermediary').val();
        var eventDate           = $('#eventDate').val();
        var originOfEvent       = $('#originOfEvent').val();

        addEvenement(
            compteAffaire, compteEvenement,
            lastEventCount, fileNumber,
            civilityWording, currentVehicleOwner,
            name, firstName, routeNumberAndName,
            adressComplement, postalCode, city,
            homePhone, cellPhone, phoneJob,
            email, dateOfCirculation,
            purchaseDate,lastEventDate,
            brandName,modelWording, version,
            vin,registration, leadType, mileage,
            energyLabel, sellerVN, sellerVO,
            billingComment,typeVoVn,fileNumberVnVo,
            vnSalesIntermediary, eventDate, originOfEvent
        );
    });

   /* function loadListEvenement() {
        // Requête AJAX pour récupérer la liste des événements
        var urlList = $('#evenements-table').data('url-list');

        $.ajax({
            url: urlList,
            method: 'GET',
            success: function(response) {
                // Traiter la réponse et afficher les événements dans le tableau
                showEvenements(response);
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors du chargement des événements:', error);
            }
        });
    }

    function showEvenements(evenements) {
        // Vider le tableau existant
        $('#evenements-table tbody').empty();

        // Parcourir les événements et les ajouter au tableau
        evenements.forEach(function(evenement) {
            var row = '<tr>';
            row += '<td>' + evenement.compteAffaire + '</td>';
            row += '<td>' + evenement.compteEvenement + '</td>';
            row += '</tr>';
            $('#evenements-table tbody').append(row);
        });
    }*/

    function addEvenement
    (
        compteAffaire, compteEvenement,
        lastEventCount, fileNumber,
        civilityWording, currentVehicleOwner,
        name, firstName, routeNumberAndName,
        adressComplement, postalCode, city,
        homePhone, cellPhone, phoneJob,
        email, dateOfCirculation,
        purchaseDate,lastEventDate,
        brandName,modelWording, version,
        vin,registration, leadType, mileage,
        energyLabel, sellerVN, sellerVO,
        billingComment,typeVoVn,fileNumberVnVo,
        vnSalesIntermediary, eventDate, originOfEvent
    ) {
        // Requête AJAX pour ajouter un nouvel événement
        var urlAdd = $('#evenements-table').data('url-add');

        $.ajax({
            url: urlAdd,
            method: 'POST',
            data: {
                compteAffaire: compteAffaire, compteEvenement: compteEvenement,
                lastEventCount: lastEventCount, fileNumber: fileNumber,
                civilityWording: civilityWording, currentVehicleOwner: currentVehicleOwner,
                name: name, firstName: firstName,
                routeNumberAndName: routeNumberAndName, adressComplement: adressComplement,
                postalCode: postalCode, city: city,
                homePhone: homePhone, cellPhone: cellPhone,
                phoneJob: phoneJob, email: email,
                dateOfCirculation: dateOfCirculation, purchaseDate: purchaseDate,
                lastEventDate: lastEventDate, brandName: brandName,
                modelWording: modelWording, version: version,
                vin: vin, registration: registration,
                leadType: leadType, mileage: mileage,
                energyLabel: energyLabel, sellerVN: sellerVN,
                sellerVO: sellerVO, billingComment: billingComment,
                typeVoVn: typeVoVn, fileNumberVnVo: fileNumberVnVo,
                vnSalesIntermediary: vnSalesIntermediary, eventDate: eventDate,
                originOfEvent: originOfEvent
            },
            success: function(response) {
                $('#ajoutEvenementModal').modal('hide');

                $('#success-response').text(response.message).addClass('show');

                $('#evenements-table').DataTable().ajax.reload();

                setTimeout(function() {
                    $('#success-response').removeClass('show');
                }, 5000);

                // Recharger la liste des événements après l'ajout
                //loadListEvenement();

                //$('#ajout-evenement-container').empty();
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de l\'ajout de l\'événement:', error);
            }
        });
    }
});