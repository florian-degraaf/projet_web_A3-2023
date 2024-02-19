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
        data: { type: 3, table: "personne", inputData: json_data, data_id: id },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});



