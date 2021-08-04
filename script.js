// Get Quote Button Function for FuelQuote
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

// Disabling Submit and Get Quote Button with empty form values, better function.
function success() {
    if(document.getElementById("gallons").value==="" || document.getElementById("datepicker").value==="") {
    document.getElementById('submit').disabled = true;
    document.getElementById('formsubmit').disabled = true;
    }
    else {
    document.getElementById('submit').disabled = false;
    document.getElementById('formsubmit').disabled = false;
    }
}

/*
// Disabling Submit and Get Quote Button with empty form values, slight bug with delivery date
const submitButton = document.getElementById("submit");
const getQuoteButton = document.getElementById("formsubmit");
[document.querySelector('#datepicker'),document.querySelector('#gallons')].forEach(item => {
    item.addEventListener('keyup', (e) => {
        const value = e.currentTarget.value;

        submitButton.disabled = value === "";
    });
    item.addEventListener('keyup', (e) => {
        const value = e.currentTarget.value;

        getQuoteButton.disabled = value === "";
    });
});

 */