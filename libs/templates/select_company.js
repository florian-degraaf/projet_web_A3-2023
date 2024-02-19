$('input[name="modify"]').click(function () {
    var table = $(this).attr('class');
    var id = $(this).data('id');

    console.log(table);

    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 2, table: table, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

$('input[name="delete"]').click(function () {
    var table = $(this).attr('class');
    var id = $(this).data('id');

    console.log(table);

    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 8, table: table, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

$('input[name="create"]').click(function () {
    var table = $(this).attr('class');

    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 6, table: table },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});