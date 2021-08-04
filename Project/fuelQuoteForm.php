<?php include('server.php') ?>
<?php

if (!isset($_SESSION["username"])) {
    $_SESSION['msg'] = "You must log in first";
    header("Location: login.php");
}

if (!isset($_SESSION["id"])) {
    $_SESSION['msg'] = "You must log in first";
    header("Location: login.php");
}

$currentPrice = 1.50;
$companyProfit = .10;
$locationFactor = 0.04;
$history = 0.00;
$gallonfactor = 0.03;


$sql = "SELECT * FROM users WHERE id='{$_SESSION["id"]}'";
$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $state = $row['areastate'];
    }
}


if (isset($_POST["FuelQuote"])) {
    $id = $_SESSION["id"];
    $gallons = mysqli_real_escape_string($db, $_POST["gallons"]);
    $address = mysqli_real_escape_string($db, $_POST["address"]);
    //$state = mysqli_real_escape_string($db, $_POST["areastate"]);
    $suggestedprice = mysqli_real_escape_string($db, $_POST["price"]);
    $totalprice = mysqli_real_escape_string($db, $_POST["totPrice"]);
    $date = mysqli_real_escape_string($db, $_POST["daydate"]);

    // first check the database to make sure
    // a user does not already exist
    $user_check_query = "SELECT * FROM fuelquote WHERE id='{$_SESSION["id"]}'";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user has a history exists
        $history = 0.01;
    }

    if($gallons > 1000) {
        $gallonfactor = 0.02;
    }

    if($state == "TX") {
        $locationFactor = 0.02;
    }

    // Margin =  Current Price * (Location Factor - Rate History Factor + Gallons Requested Factor + Company Profit Factor)
    $margin = ($locationFactor - $history + $gallonfactor + $companyProfit) * $currentPrice;
    $suggestedprice = $margin + $currentPrice;
    $totalprice = $suggestedprice * $gallons;


    $sql2 = "INSERT INTO fuelquote (id, address, areastate, gallons, suggestedprice, totalprice, daydate) 
  			  VALUES('{$_SESSION["id"]}', '$address', '$state', '$gallons', '$suggestedprice', '$totalprice', '$date')";

    //$sql2 = "UPDATE fuelquote SET address='$address', areastate='$state', gallons='$gallons', suggestedprice='$suggestedprice', totalprice='$totalprice' WHERE id='{$_SESSION["id"]}'";
    $result2 = mysqli_query($db, $sql2);


    if ($result2) {
        echo "<script>alert('Submitted successfully.');</script>";
        header('location: fuelHistory.php');

    } else {
        echo "<script>alert('Can not Submit');</script>";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Title -->
    <title>Fuel Quote Form</title>
    <!-- End Title -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker3.css"
          rel="stylesheet" id="bootstrap-css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>

    <script
            src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
            crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
            integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
            crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src = "script.js"></script>


</head>

<!-- Nav Bar -->
<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarMenu">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMenu">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"></li>
            <a href="index.php" class="btn btn-danger" style="float:right;">Home</a>
            <br>
            <a href="index.php?logout='1'" style="float:right; color: red;" >logout</a> </p>
        </ul>
    </div>
</nav>
<!-- End Nav Bar -->

<head>
    <title>Fuel Quote Form</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>

<div class="header">
    <h1>Fuel Quote Form</h1>
</div>
<div class="profile-input-field">
    <form name="myform" method="post">

        <!-- Fetch User ID During Session -->
        <?php
        $sql = "SELECT * FROM users WHERE id='{$_SESSION["id"]}'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

            }
        }
        ?>
        <!-- End Fetch User ID During Session -->

        <h3>Please Fill-out All Fields</h3>

        <!-- Notification Message -->
        <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php endif ?>

        <!-- Gallons Input -->
        <div class="input-group">
            <label>Gallons</label>
            <label>
                <input class="gallons" type="text" id="gallons" name="gallons" placeholder="Enter Gallons" style="width:20em; text-align: left; padding: 5px 5px" autocomplete="off" onkeyup="success()" required="required" />
            </label>
        </div>
        <! -- End Gallons Input

        <!-- End Notification Message -->

        <!-- User Address Input -->
        <div class="input-group">
            <label>Address</label>
            <label>
                <input type="text" name="address" style="width:20em; text-align: left; padding: 5px 5px" value="<?php
                $sql = "SELECT * FROM users WHERE id='{$_SESSION["id"]}'";
                $result = mysqli_query($db, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "{$row['address']}, {$row['city']} {$row['areastate']}, {$row['zipcode']}";
                    }
                }
                ?>" readonly>
            </label>
        </div>
        <!-- End User Address Input -->


        <!-- User State Input -->
        <div>

            <label>State</label>
            <br>
            <input type="text" id="state" required
                   value="<?php
                   $sql = "SELECT * FROM users WHERE id='{$_SESSION["id"]}'";
                   $result = mysqli_query($db, $sql);
                   if (mysqli_num_rows($result) > 0) {
                       while ($row = mysqli_fetch_assoc($result)) {
                           echo "{$row['areastate']}";
                       }
                   }
                   ?>" readonly
            >
        </div>
        <!-- End User State Input -->

        <br>
        <br>

        <!-- Date Picker -->
        <div class="form-group">
            <label for="date-picker-example">Delivery Date</label>
            <div class='input-group date'>
                <label for="datepicker"></label><input id="datepicker" type="text" autocomplete="on" class="form-control" name="daydate" onchange="success()" value="<?php echo date('m-d-Y'); ?>" required/>
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
        <!-- End Date Picker -->

        <!-- Get Quote Button -->
        <div>
            <br>
            <label id="response" style="width: 200px; height: 200px; resize: none;" readonly="readonly">
                <!-- Suggested Price Box -->
                Suggested Price
                <input type="text" name="sugprice" style="width:20em; text-align: left; padding: 5px 5px"  placeholder="$1.70" readonly>
                <!-- Total Price Box -->
                Total Price
                <input type="text" name="totprice" style="width:20em; text-align: left; padding: 5px 5px"  placeholder="$1700" readonly>
            </label>
            <br>
            <button disabled id="formsubmit" type="button" class="btn">Get Quote</button><br>
        </div>
        <!-- End Get Quote Button -->

        <!-- Submit Button To Store Values into Database-->
        <div class="input-group">
            <button disabled id="submit" type="submit" class="btn" name="FuelQuote" >Submit</button>
        </div>
        <!-- End Submit -->


        <!-- Go Back Button -->
    <div class="back" action="fuelQuoteForm.php">
        <Submit Button>
            <button type="submit" class="btn btn-primary" onclick="history.back()">Go Back</button>
    </div>
        <!-- End Go Back Button -->

</form>
</div>
</body>
</html>