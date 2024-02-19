if($('#modify')){
    $('#modify').click(function() {
        var table = $('#modify').attr('class');
        console.log(table);
    
        $.ajax({
            url: 'templates/select_person.php',
            type: 'POST',
            data: { type: 2, table: table },
            success: function (data) {
                $('#table_container').html(data);
            }
        });
    });
    
    
    
}
