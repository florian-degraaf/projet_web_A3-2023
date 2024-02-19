$('input[name="confirm"]').click(function () {
    var input_data = {};

    $('.input').each(function () { input_data[this.name] = this.value; });
    var json_data = JSON.stringify(input_data);
    console.log(json_data);
    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 7, table: "entreprise", inputData: json_data },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});


