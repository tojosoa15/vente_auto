$(document).ready(function() {

    $('#evenements-table').DataTable({
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": $('#evenements-table').data('url'),
            "dataSrc": ""
        },
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
        "language": {
            "url": $('#evenements-table').data('frenchjson'),
        },
        "order": [],
        "orderCellsTop": true,
        "paging": true,
        "lengthMenu": [10, 25, 50, 100],
        "pageLength": 10,
        "searching": true,
        "info": true,
        "responsive": true
    });

    // Suppression d'un événement
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

    // Ajout d'un événement
    $(document).on('click', '#add-evenement-btn', function(e) {
        e.preventDefault();
        $('#ajoutEvenementModal').modal('show');
    });

    $(document).on('submit', '#ajout-evenement-form', function(e) {
        e.preventDefault();
        var formData = $(this).serialize();
        addEvenement(formData);
    });

    function addEvenement(formData) {

        console.log(formData);
        var urlAdd = $('#evenements-table').data('url-add');
        $.ajax({
            url: urlAdd,
            method: 'POST',
            data: formData,
            success: function(response) {
                $('#ajoutEvenementModal').modal('hide');
                $('#success-response').text(response.message).addClass('show');
                $('#evenements-table').DataTable().ajax.reload();
                setTimeout(function() {
                    $('#success-response').removeClass('show');
                }, 5000);
            },
            error: function(xhr, status, error) {
                console.error('Erreur lors de l\'ajout de l\'événement:', error);
            }
        });
    }

});
