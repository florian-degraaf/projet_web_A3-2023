$('input[name="confirm"]').click(function () {
    var input_data = {};

    $('.input').each(function () { input_data[this.name] = this.value; });
    var json_data = JSON.stringify(input_data);
    console.log(json_data);

    id = $('input[name="confirm"]').data('id');
    console.log(id);
    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 3, table: "entreprise", inputData: json_data, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

$('input[name="delete_sector"]').click(function () {
    var secteur = $(this).data('id');
    var id = $('input[name="confirm"]').data('id');
    console.log(id);
    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 4, column: 1, table: "entreprise", value: secteur, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});


$('input[name="delete_location"]').click(function () {
    var localite = $(this).data('id');
    var id = $('input[name="confirm"]').data('id');
    console.log(id);
    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 4, column: 2, table: "entreprise", value: localite, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});


$('input[name="add_sector"]').click(function () {
    var secteur = $(this).closest('tr').find('input[id="input_sector"]').val();
    var id = $('input[name="confirm"]').data('id');
    console.log(secteur);
    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 5, column: 1, table: "entreprise", value: secteur, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

$('input[name="add_location"]').click(function () {
    var location = $(this).closest('tr').find('input[id="input_location"]').val();
    var id = $('input[name="confirm"]').data('id');
    console.log(location);

    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 5, column: 2, table: "entreprise", value: location, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

