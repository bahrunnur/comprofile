<?php 

if (isset($_POST)) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $errors = array();
    $formok = true;

    if ($name === "") {
        $formok = false;
        $errors['name'] = "You have not fill your name";
    }

    if ($email === "") {
        $formok = false;
        $errors['email'] = "You have not fill your email";
    } elseif ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formok = false;
        $errors['email'] = "Your email is not valid";
    }

    if ($message === "") {
        $formok = false;
        $errors['message'] = "You have not fill the message";
    }

    if ($formok) {
        $headers = "From: bot@comprofile.com" . "\r\n";
        $headers .= "Content-type: text/html; charset=utf-8" . "\r\n";

        $emailbody = "you got a message from " . $name . " (" . $email . ")";
        $emailbody .= "message: " . $message;

        mail("bahrunnur20@gmail.com", "Pesan dari Comprofile", $emailbody, $headers);
    }

    $formvalue = array(
        'name' => $name,
        'email' => $email,
        'message' => $message
    );

    $returndata = array(
        'errors' => $errors,
        'status' => $formok,
        'formvalue' => $formvalue
    );

    if (empty($_SERVER['HTTP_X_REQUESTED_WITH']) 
        && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest') {

        // ngeset variabel session
        session_start();
        $_SESSION['returned'] = $returndata;

        // kembali ke halaman contact
        header('location: ' . $_SERVER['HTTP_REFERER']);
    }
} else {
    header('location: index.php');    
}
