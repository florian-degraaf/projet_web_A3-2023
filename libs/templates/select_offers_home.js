$('input[name="apply"]').click(function () {
    var table = $(this).attr('class');
    var id = $(this).data('id');

    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 10, table: table, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

$('input[name="confirm"]').click(function () {
    var table = $(this).attr('class');
    var id = $(this).data('id');
    var cv = $('input[name="cv"]').val();
    var lm = $('textarea[name="motivation_letter"]').val();
    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 11, table: table, data_id: id, cv: cv, lm: lm },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

$('input[name="wishlist"]').click(function () {
    var table = $(this).attr('class');
    var id = $(this).data('id');
    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 12, table: table, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

$('input[name="wishlist_remove"]').click(function () {
    var table = $(this).attr('class');
    var id = $(this).data('id');
    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 13, table: table, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

