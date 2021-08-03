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
    <title>Fuel Quote History</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

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
        <ul class="navbar-nav">
            <!--  <li class="nav-item">
              <a href="#" class="nav-link">Fuel Quote History</a>

            </li> -->
            <!--   <li class="nav-item">
                                <a href="profile.html" class="nav-link">Client Profile Management</a>
                            </li> -->

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item"></li>
            <a href="index.php"><button type="submit" class="btn btn-danger"> Home</button> </a> <a href="index.php?logout='1'" style="float:right; color: red;" >logout</a> </p>
            </li>
        </ul>
    </div>
</nav>
<!--End Navbar-->

<div class="header">
    <h1>Fuel Quote History</h1>
</div>

<!--    Make a button -->
<!-- <button type="submit" class="btn btn-primary"  onclick='hist(); return false'>Update</button>  -->

<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID#</th>
                <th scope="col">Delivery Address</th>
                <th scope="col">State</th>
                <th scope="col">Gallons</th>
                <th scope="col">Suggested Price</th>
                <th scope="col">Total Amount Due</th>
                <th scope="col">Date</th>
            </tr>
            </thead>
            <tbody>
            <tr>

                <th scope="row">
                    <?php
                    $sql = "SELECT * FROM fuelquote WHERE id='{$_SESSION["id"]}'";
                    $result = mysqli_query($db, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>" . implode("</td><td>",$row) . "</td></tr>";
                        }
                    }
                    ?>
                </th>

            </tbody>
        </table>
    </div>
</div>

<div class="back" action="fuelQuoteForm.php">
    <Submit Button>
        <a href="index.php" class="btn btn-danger" style="float:left;">Home</a>
</div>


</body>
</html>