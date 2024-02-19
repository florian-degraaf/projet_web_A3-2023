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
        data: { type: 3, table: "offre", inputData: json_data, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

$('input[name="delete_skill"]').click(function () {
    var secteur = $(this).data('id');
    var id = $('input[name="confirm"]').data('id');
    console.log(id);
    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 4, table: "offre", value: secteur, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});

$('input[name="add_skill"]').click(function () {
    var skill = $(this).closest('tr').find('input[id="input_skill"]').val();
    var id = $('input[name="confirm"]').data('id');
    console.log(skill);
    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 5, table: "offre", value: skill, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});