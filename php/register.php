<?php

// checking the request receive is a POST, if not we redirect it back to the login page.
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../signin.php");
    exit();
}

// Checking if the POST request has the name, email, password and confirm-password inputs.
if (!isset($_POST['firstname'], $_POST['lastname'], $_POST['users'], $_POST['email'], $_POST['password'])) {
    header("Location: ../signin.php");
    exit();
}

// include the database file so we can make a connection to the database.
require_once 'database.php';
session_start();

// sanitize all inputs
$fname = $connection->real_escape_string($_POST['firstname']);
$lname = $connection->real_escape_string($_POST['lastname']);
$usertype = $connection->real_escape_string($_POST['users']);
$email = $connection->real_escape_string($_POST['email']);
$password = $connection->real_escape_string($_POST['password']);

// checking if an user with the email input already exists
$result = $connection->query("SELECT * FROM users WHERE email='$email'");
if ($result->num_rows > 0) {
    $_SESSION['error'] = 'User already exists.';
    header("Location: ../signin.php");
    exit();
}

// hashing the input password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// insert the user data into the users table
$connection->query("INSERT INTO users (`fname`, `lname`, `email`, `password`, `user_code`) VALUES ('$fname','$lname','$email','$hashedPassword','$usertype')");



// checking if the input email exists in the users table
$result = $connection->query("SELECT * FROM users WHERE email='$email'");
if ($result->num_rows <= 0) {
    $_SESSION['error'] = 'User not found.';
    header("Location: ../signin.php");
    exit();
}

// if the email exists we pull that row from the database
if ($row = $result->fetch_assoc()) {

    // checking the password input matches the hashed password for the user in the database
    if (!password_verify($password, $row['password'])) {
        $_SESSION['error'] = 'Invalid credentials.';
        header("Location: ../signin.php");
        exit();
    }

    // set the id session variable so we track whether the user is logged in or not
    $_SESSION['id'] = $row['id'];
    $_SESSION['fname'] = $row['fname'];
    $_SESSION['lname'] = $row['lname'];
    $_SESSION['code'] = $row['user_code'];
    $_SESSION['email'] = $row['email'];

    // redirect the user to the home page of the website
    header("Location: ../signin.php");
    exit();
}


// redirect the user to the login page
header("Location: ../signin.php");
exit();
