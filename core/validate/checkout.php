<?php
    include('../core/init.php');

    if(isset($_POST['btnCheckout']) && !empty($_POST['btnCheckout'])){ # checkout

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        // Form Validation 
        if(empty($name) || empty($email) || empty($phone) || empty($address)){
            $_SESSION['ErrorMessage'] = "All input fields are required";
        }elseif(!preg_match("/^[a-z A-Z]*$/", $name)){
            $_SESSION['ErrorMessage'] = "Please use a valid name";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['ErrorMessage'] = "Please use a valid email address";
        }elseif(!preg_match("/^[0-9]*$/", $phone)){
            $_SESSION['ErrorMessage'] = "Please use a valid phone number";
        }elseif(strlen($phone) > 11 || strlen($phone) < 11){
            $_SESSION['ErrorMessage'] = "Please use a valid phone number";
        }else{

            $name = strtolower($admin->validateInput($_POST['name']));
            $email = strtolower($admin->validateInput($_POST['email']));
            $phone = $admin->validateInput($_POST['phone']);
            $address = $admin->validateInput($_POST['address']);

            $_SESSION['order_name'] = $name;
            $_SESSION['order_email'] = $email;
            $_SESSION['order_phone'] = $phone;
            $_SESSION['order_address'] = $address;

            header('location: payment');

        }

    }

?>