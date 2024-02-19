$('#offer').click(function () {;
    var offer_id = $(this).data('id');
    console.log(offer_id);
    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        async: true,
        data: { type: 9, table: 'offre', offer_id: offer_id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});
