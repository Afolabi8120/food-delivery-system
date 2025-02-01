<?php
    include('../core/init.php');

    if(isset($_POST['btnRegister']) && !empty($_POST['btnRegister'])){

        // passing data received from user into variable
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password2 = $_POST['cpassword'];

        // Form Validation 
        if(empty($fullname) || empty($email) || empty($password2) || empty($password)){
            $_SESSION['ErrorMessage'] = "All Input Field are Required";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['ErrorMessage'] = "Please use a valid Email Address";
        }elseif(!preg_match("/^[a-z A-Z]*$/", $fullname)){
            $_SESSION['ErrorMessage'] = "Only Alphabet allowed for fullname field";
        }elseif ($password !== $password2) {
            $_SESSION['ErrorMessage'] = "Both Password Do Not Match";
        }elseif ($cus->checkEmail($email) === true){
            $_SESSION['ErrorMessage'] = "Email Address Already In Use";
        }else{

            // preventing sql injection
            $fullname = strtolower($admin->validateInput($fullname));
            $email = strtolower($admin->validateInput($email));
            $password = $admin->validateInput($password);
            $password2 = $admin->validateInput($password2);

            # generating chat code for student
            $userEmail = sha1($email);
            $output = substr(sha1($email), 0, 9);
            $chat_code = strtoupper($output);

            $email = strtolower($email);

            //hashing the password
            $pass = password_hash($password, PASSWORD_DEFAULT);

            if($cus->addCustomer($fullname,$email,$pass,$chat_code) === true){
                $_SESSION['SuccessMessage'] = "Account successfully created, You can proceed to login.";
                header('location: login');
            }else{
                $_SESSION['ErrorMessage'] = "Failed to create account";
            }
            
        }

    }


?>