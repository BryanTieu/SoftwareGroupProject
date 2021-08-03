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

if (isset($_POST["update"])) {
    $full_name = mysqli_real_escape_string($db, $_POST["full_name"]);
    //$gender = mysqli_real_escape_string($db, $_POST["gender"]);
    //$age = mysqli_real_escape_string($db, $_POST["age"]);
    $address = mysqli_real_escape_string($db, $_POST["address"]);
    $address2 = mysqli_real_escape_string($db, $_POST["address2"]);
    $city = mysqli_real_escape_string($db, $_POST["city"]);
    $state = mysqli_real_escape_string($db, $_POST["areastate"]);
    $zipcode = mysqli_real_escape_string($db, $_POST["zipcode"]);
    $email = mysqli_real_escape_string($db, $_POST["email"]);


    $sql = "UPDATE users SET full_name='$full_name', address='$address', address2='$address2', areastate='$state', city='$city', email='$email', zipcode='$zipcode' WHERE id='{$_SESSION["id"]}'";
    $result = mysqli_query($db, $sql);


    if ($result) {
        $_SESSION['success'] = "You have now updated your profile";
        echo "<script>alert('Profile Updated successfully.');</script>";
        header('location: index.php');

    } else {
        echo "<script>alert('Profile can not Updated.');</script>";
        echo "Please Check all fields";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Profile</title>
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
    <title>User Profile Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}
?>

<div class="header">
    <h1>User Profile</h1>
</div>
<div class="profile-input-field">
    <form method="post" action="profile.php" >

        <?php
        $sql = "SELECT * FROM users WHERE id='{$_SESSION["id"]}'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {

            }
        }
        ?>

        <h3>Please Fill-out All Fields</h3>

        <!-- notification message -->
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

        <div class="input-group">
            <label>Fullname</label>
            <label>
                <input type="text" name="full_name" placeholder="Enter FullName" style="width:20em; text-align: left; padding: 5px 5px" required value=" <?php echo $full_name; ?>" />
            </label>
        </div>

        <div class="input-group">
            <label>Email Address</label>
            <label>
                <input type="email" name="email" style="width:20em; text-align: left; padding: 5px 5px;" placeholder="Enter Email" required value="<?php echo $email; ?>">
            </label>
        </div>

        <div class="input-group">
            <label>Address</label>
            <label>
                <input type="text" name="address" style="width:20em; text-align: left; padding: 5px 5px" placeholder="Enter Address" required value="<?php echo $address; ?>">
            </label>
        </div>

        <div class="input-group">
            <label>Address 2/P.O Box</label>
            <label>
                <input type="text" name="address2" style="width:20em; text-align: left; padding: 5px 5px" placeholder="Not Required" value="<?php echo $address2; ?>">
            </label>
        </div>

        <div class="input-group">
            <label class="control-label">City</label>
            <label>
                <input type="text" name="city" style="width:20em; text-align: left; padding: 5px 5px" placeholder="Enter City" required value="<?php echo $city; ?>">
            </label>
        </div>

        <div class="form-group">
            <!-- State Button -->
            <label for="areastate" class="control-label">State</label>
            <select class="form-control" id="areastate" type="text" name="areastate" required>
                <option value="<?php echo $state="AL"; ?>">AL</option>
                <option value="<?php echo $state="Ak"; ?>">AK</option>
                <option value="<?php echo $state="AZ"; ?>">AZ</option>
                <option value="<?php echo $state="AR"; ?>">AR</option>
                <option value="<?php echo $state="CA"; ?>">CA</option>
                <option value="<?php echo $state="CO"; ?>">CO</option>
                <option value="<?php echo $state="CT"; ?>">CT</option>
                <option value="<?php echo $state="DE"; ?>">DE</option>
                <option value="<?php echo $state="DC"; ?>">DC</option>
                <option value="<?php echo $state="FL"; ?>">FL</option>
                <option value="<?php echo $state="GA"; ?>">GA</option>
                <option value="<?php echo $state="HI"; ?>">HI</option>
                <option value="<?php echo $state="ID"; ?>">ID</option>
                <option value="<?php echo $state="IL"; ?>">IL</option>
                <option value="<?php echo $state="IN"; ?>">IN</option>
                <option value="<?php echo $state="IA"; ?>">IA</option>
                <option value="<?php echo $state="KS"; ?>">KS</option>
                <option value="<?php echo $state="KY"; ?>">KY</option>
                <option value="<?php echo $state="LA"; ?>">LA</option>
                <option value="<?php echo $state="ME"; ?>">ME</option>
                <option value="<?php echo $state="MD"; ?>">MD</option>
                <option value="<?php echo $state="MA"; ?>">MA</option>
                <option value="<?php echo $state="MI"; ?>">MI</option>
                <option value="<?php echo $state="MN"; ?>">MN</option>
                <option value="<?php echo $state="MS"; ?>">MS</option>
                <option value="<?php echo $state="MO"; ?>">MO</option>
                <option value="<?php echo $state="MT"; ?>">MT</option>
                <option value="<?php echo $state="NE"; ?>">NE</option>
                <option value="<?php echo $state="NV"; ?>">NV</option>
                <option value="<?php echo $state="NH"; ?>">NH</option>
                <option value="<?php echo $state="NJ"; ?>">NJ</option>
                <option value="<?php echo $state="NM"; ?>">NM</option>
                <option value="<?php echo $state="NY"; ?>">NY</option>
                <option value="<?php echo $state="NC"; ?>">NC</option>
                <option value="<?php echo $state="ND"; ?>">ND</option>
                <option value="<?php echo $state="OH"; ?>">OH</option>
                <option value="<?php echo $state="OK"; ?>">OK</option>
                <option value="<?php echo $state="OR"; ?>">OR</option>
                <option value="<?php echo $state="PA"; ?>">PA</option>
                <option value="<?php echo $state="RI"; ?>">RI</option>
                <option value="<?php echo $state="SC"; ?>">SC</option>
                <option value="<?php echo $state="SD"; ?>">SD</option>
                <option value="<?php echo $state="TN"; ?>">TN</option>
                <option value="<?php echo $state="TX"; ?>">TX</option>
                <option value="<?php echo $state="UT"; ?>">UT</option>
                <option value="<?php echo $state="VT"; ?>">VT</option>
                <option value="<?php echo $state="VA"; ?>">VA</option>
                <option value="<?php echo $state="WA"; ?>">WA</option>
                <option value="<?php echo $state="WV"; ?>">WV</option>
                <option value="<?php echo $state="WI"; ?>">WI</option>
                <option value="<?php echo $state="WY"; ?>">WY</option>
            </select>
        </div>

        <div class="form-group">
            <!-- Zip Code-->
            <label for="zipcode" class="control-labelZ">Zip Code</label>
            <input class="form-control" id="zipcode" maxlength="9" minlength="5" name="zipcode"
                   pattern="\d*" placeholder="77048" required="true" size=10
                   title="5 to 9 characters (Numerical characters only)" type="text"/>

            <!--  <input type="number" pattern=".{5,9}" required title="5 to 9 characters" class="form-control" id="zip_id"
                name="zip" placeholder="#####" required="required" /> -->
        </div>

        <!-- Submit Button -->
        <div class="input-group">
            <button type="submit" class="btn" name="update">Update</button>
        </div>
        <!-- End Submit Button -->

        <div class="back" action="fuelQuoteForm.php">
            <Submit Button>
                <button type="submit" class="btn btn-primary" onclick="history.back()">Go Back</button>
        </div>
    </form>

</div>
</html>
