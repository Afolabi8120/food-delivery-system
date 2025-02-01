<?php
    include('../core/init.php');

    if(isset($_POST['btnLogin']) && !empty($_POST['btnLogin'])){
        // passing data received from user into variable
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Form Validation 
        if(empty($email) || empty($password)){
            $_SESSION['messageTitle'] = "Empty Fields";
            $_SESSION['messageText'] = "All Input Field are Required";
            $_SESSION['messageIcon'] = "warning";
        }else{

            // preventing sql injection
            $email = strtolower($admin->validateInput($email));
            $password = $admin->validateInput($password);

            // check if username exist
            if($admin->check('tbldispatch','email',$email) === true){

                // getting the user info using email
                $getUserInfo = $admin->fetchSingle('tbldispatch','email',$email); 

                if(password_verify($password, $getUserInfo->password)){
                    if($getUserInfo->status == '1'){
                        $_SESSION['dispatch'] = $getUserInfo->id;
                        header("refresh:2;url=dashboard"); 
                        $_SESSION['SuccessMessage'] = "Login Successful";
                    }else if($getUserInfo->status == '0'){
                        $_SESSION['ErrorMessage'] = "Your account has been deactivated, Please contact the owner of this platform";
                    }
                }elseif(!password_verify($password, $getUserInfo->password)){
                    $_SESSION['ErrorMessage'] = "Email/Password is not valid";
                }
            }else{
                $_SESSION['ErrorMessage'] = "Invalid details provided";
            }
        }
    }


    
?>