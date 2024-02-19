/*
    var myItems = [];
    var obj = {};

    $('input[type="text"]').each(function(){obj[this.name] = this.value;});
    //$('input[type="text"]').each(console.log(this.value));
    myItems.push(obj);
    var items = JSON.stringify(myItems);    
    console.log(items);
    var table = $('#input').attr('class');
    console.log(table);
*/
$('#confirm').click(function() {    
    var inputData = {};
    $('input[class="entreprise"]').each(function() {
        var name = $(this).attr('name');
        var value = $(this).val();
        if (name == 'secteur' || name == 'localite') {
            if (!inputData.hasOwnProperty(name)) {
                inputData[name] = [];
            }
            inputData[name].push(value);
        } else {
            inputData[name] = value;
        }
    });
    console.log(inputData);
    json_data = JSON.stringify(inputData);

    $.ajax({
        url: 'templates/select_person.php',
        type: 'POST',
        data: { type: 3, table: "entreprise", inputData: json_data },
        success: function (data) {
            $('#table_container').html(data);
        }
    });
});
