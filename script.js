$(document).ready(function() {

    $('#formsubmit').click(function() {
        $.post("submit.php",
            {gallons: $('#gallons').val(), state: $('#state').val()},
            function(data) {
                $('#response').html(data);
            }
        );
    });

});

