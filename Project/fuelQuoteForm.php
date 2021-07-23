<?php include('server.php')?>
<?php
if (!isset($_SESSION["username"])) {
    $_SESSION['msg'] = "You must log in first";
    header("Location: login.php");
}
if (!isset($_SESSION["id"])) {
    $_SESSION['msg'] = "You must log in first";
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fuel Quote</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css"
          rel="stylesheet" id="bootstrap-css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
            integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

</head>

<body>
<!--Navbar-->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <a href="#" class="navbar-brand">Fuel Rate</a>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"></li>
            <a href="index.php"><button type="submit" class="btn btn-danger"> Home</button> </a> <a href="index.php?logout='1'" style="float:right; color: red;" >logout</a> </p>
            </li>
        </ul>
    </div>
</nav>
<!--End Navbar-->

<div class="header">
    <h1>Fuel Quote Form</h1>
</div>

<form name ="form-fdata" action="fuelHistory.php" method="get">
    <div class="form-group">
        <!-- Gallons Requested -->
        <label for="gallons_req" class="control-label">Gallons Requested</label>
        <input type="number" pattern=".{1,50}" required title="50 characters maximum" class="form-control"
               id="gallons_req" name="gallons" placeholder="18" required="required" onclick="delivered();" />
    </div>

    <div class="form-group">
        <!-- Delivery Address -->
        <label for="delivery_id" class="control-label">Delivery Address</label>
        <input type="text" pattern=".{,100}" class="form-control" name="delivery" id=delivery_id
               placeholder="16218 South Temple Drive, Houston, Tx, 77077" readonly />
    </div>



    <div class="form-group">
        <label for="date-picker-example">Delivery Date</label>
        <div class='input-group date' id='datepicker'>
            <input type="text"
                   placeholder="Selected date" class="form-control" required="required" onclick="delivered();"/>
            <span class="input-group-addon">
                    <span class="glyphicon glyphicon-calendar"></span>
                </span>
        </div>
    </div>


    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(function () {
            $('#datepicker').datepicker({
                format: "mm/dd/yyyy",
                autoclose: true,
                todayHighlight: true,
                showOtherMonths: true,
                selectOtherMonths: true,
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                orientation: "button"
            });
        });
    </script>


    <div class="form-group">
        <!-- Price Suggestion-->
        <label for="sug_price" class="control-label">Suggested Price</label>
        <input type="number" pattern=".{,100}" required title="100 characters maximum" class="form-control"
               id="sug_price" name="price" placeholder="$9999" readonly>
    </div>


    <div class="form-group">
        <!-- Total Price-->
        <label for="total_price" class="control-label">Total Amount</label>
        <input type="number" pattern=".{5,9}" required title="5 to 9 characters" class="form-control"
               id="total_price" name="totPrice" placeholder="$9999" readonly>
    </div>

    <div class="form-group">
        <Submit Button>
            <button type="submit" class="btn btn-primary">View Quote History!</button>
    </div>

    <div class="back" action="fuelQuoteForm.php">
        <Submit Button>
            <button type="submit" class="btn btn-primary" onclick="history.back()">Go Back</button>
    </div>

</form>

</body>


</html>