$('#person').click(function () {
    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        async: true,
        data: { type: 1, table: 'personne' },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

$('#company').click(function () {
    $.ajax({

        url: 'templates/select_person.php',
        type: 'POST',
        async: true,
        data: { type: 1, table: 'entreprise' },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

