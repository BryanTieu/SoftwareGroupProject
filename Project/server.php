<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array();
$id = "";
$full_name = "";
$address = "";
$address2 = "";
$city = "";
$state = "";
$zipcode = "";


// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'user-verification');

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($username)) { array_push($errors, "Username is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password_1)) { array_push($errors, "Password is required"); }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords do not match");
    }

    // first check the database to make sure
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
    $result = mysqli_query($db, $user_check_query);
    $user = mysqli_fetch_assoc($result);

    if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username already exists");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email already exists");
        }
    }

    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database

        $query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
        mysqli_query($db, $query);
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You may now login";
        header('location: login.php');
    }
}

// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);

    if (empty($username)) {
        array_push($errors, "Username is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {
        $password = md5($password);
        $query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $results = mysqli_query($db, $query);
        if (mysqli_num_rows($results) == 1) {
            $row = mysqli_fetch_assoc($results);
            $_SESSION['username'] = $username;
            $_SESSION["id"] = $row['id'];

            $_SESSION['success'] = "You are now logged in please update your profile if needed";

            header('location: profile.php');
        }else {
            array_push($errors, "Wrong username/password combination");
        }
    }
}

// Log Out
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    unset($_SESSION['id']);
    header("location: login.php");
}

// this code does not work for some reason had to do it the ugly way will fix in the future ***
// User Profile
//if(isset($_POST['update'])) {
    //$id = $_SESSION['id'];
    //$checkIdquery=mysqli_query($db,"SELECT * FROM users where id='$id' LIMIT 1")or die(mysqli_error($db));

    // receive all input values from the form
    //$full_name = mysqli_real_escape_string($db, $_POST['full_name']);
    //$gender = mysqli_real_escape_string($db, $_POST['gender']);
    //$age = mysqli_real_escape_string($db, $_POST['age']);
    //$address = mysqli_real_escape_string($db, $_POST['address']);
    //$email = mysqli_real_escape_string($db, $_POST['email']);

    //$full_name = $_POST['full_name'];
    //$gender = $_POST['gender'];
    //$age = $_POST['age'];
    //$address = $_POST['address'];
    //$email = $_POST['email'];

    // FOR SOME REASON THIS DOES NOT UPDATE THE VALUES IN THE TABLE I THINK
    // IT HAS TO DO WITH THE EMPTY TABLES AND THE UPDATE FUNCTION AS IT WONT
    // UPDATE A EMPTY TABLE. THERE IS A BUG THAT WHEN SUBMITTING TO UPDATE
    // THE "WELCOME USERNAME" WILL DISAPPEAR ON THE INDEX.PHP PAGE.
    //$query = "UPDATE users SET full_name='$full_name', gender='$gender', age='$age', address='$address', email='$email'
                      //WHERE id = '$id'";
    //mysqli_query($db, $query) or die(mysqli_error($db));

    //$_SESSION['username'] = $username;
    //$_SESSION['success'] = "You have updated your profile";
    //header('location: index.php');
//}


?>