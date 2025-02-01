<?php
    include('../core/init.php');

    if(isset($_POST['btnAddUser']) && !empty($_POST['btnAddUser'])){ # create new user account

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone =$_POST['phone'];
        $password =$_POST['password'];
        $cpassword =$_POST['cpassword'];
        $address = $_POST['address'];

        // Form Validation 
        if(empty($address) || empty($fullname) || empty($email) || empty($phone) || empty($password) || empty($cpassword)){
            $_SESSION['messageTitle'] = "Empty Field";
            $_SESSION['messageText'] = "All input fields are required";
            $_SESSION['messageIcon'] = "error";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['messageTitle'] = "Alert";
            $_SESSION['messageText'] = "Please use a valid email address";
            $_SESSION['messageIcon'] = "error";
        }elseif ($dispatch->checkEmail($email) === true){
            $_SESSION['messageTitle'] = "Alert";
            $_SESSION['messageText'] = "Email already taken";
            $_SESSION['messageIcon'] = "error";
        }elseif ($dispatch->checkPhone($phone) === true){
            $_SESSION['messageTitle'] = "Alert";
            $_SESSION['messageText'] = "Phone No. already in use";
            $_SESSION['messageIcon'] = "error";
        }elseif ($password !== $cpassword){
            $_SESSION['messageTitle'] = "Alert";
            $_SESSION['messageText'] = "Both password do not match";
            $_SESSION['messageIcon'] = "error";
        }elseif(strlen($password) < 5){
            $_SESSION['messageTitle'] = "Empty Field";
            $_SESSION['messageText'] = "Password length must be up to or more than 5 characters";
            $_SESSION['messageIcon'] = "error";
        }else{

            $fullname = strtolower($admin->validateInput($fullname));
            $email = strtolower($admin->validateInput($email));
            $phone = $admin->validateInput($phone);
            $password = $admin->validateInput($password);
            $cpassword = $admin->validateInput($cpassword);
            $address = $admin->validateInput($address);

            $image_name = $_FILES['user-img']['name'];

            //specifying the supported file extension
            $validextensions = ['jpg', 'png', 'jpeg'];
            $ext = explode('.', basename($_FILES['user-img']['name']));

            //explode file name from dot(.)
            $file_extension = end($ext);

            $getImageID = uniqid().time(); #generate a unique id
            $hashImageID = sha1($getImageID); #encrypt the unique id
            $useImageID = strtoupper("IMG-".date('Y-m-d_i').substr($hashImageID, 2, 6)); #split the unique id

            $image_name = $useImageID.".".$file_extension;
            $target = '../assets/img/dispatch_image/' . $image_name;

            if($_FILES['user-img']['size'] > 2097152){
                $_SESSION['ErrorMessage'] = "The allowed file size is 2MB.";
                return;
            }elseif(!in_array($file_extension, $validextensions)){ 
                $_SESSION['ErrorMessage'] = "Please select a valid picture format";
                return;
            }else{

                #hashing the password
                $pass = password_hash($password, PASSWORD_DEFAULT);

                if($dispatch->addDispatch($fullname,$email,$phone,$pass,$image_name,$address) === true){
                    move_uploaded_file($_FILES['user-img']['tmp_name'],  $target);
                    $_SESSION['messageTitle'] = "Success";
                    $_SESSION['messageText'] = "Delivery man account created successfully";
                    $_SESSION['messageIcon'] = "success";
                }else{
                    $_SESSION['messageTitle'] = "Alert";
                    $_SESSION['messageText'] = "Failed to create delivery man's account";
                    $_SESSION['messageIcon'] = "error";
                }

            }
        }

    }else if(isset($_POST['btnEditUser']) && !empty($_POST['btnEditUser'])){ # update delivery man account

        $user_id = $_POST['user_id'];
        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $phone =$_POST['phone'];
        $address = $_POST['address'];

        // Form Validation 
        if(empty($user_id) || empty($fullname) || empty($email) || empty($phone) || empty($address)){
            $_SESSION['messageTitle'] = "Empty Field";
            $_SESSION['messageText'] = "All input fields are required";
            $_SESSION['messageIcon'] = "error";
        }elseif(!preg_match("/^[a-z A-Z]*$/", $fullname)){
            $_SESSION['messageTitle'] = "Alert";
            $_SESSION['messageText'] = "Only alphabet allowed for the fullname field";
            $_SESSION['messageIcon'] = "error";
        }else{

            $fullname = strtolower($admin->validateInput($fullname));
            $email = strtolower($admin->validateInput($email));
            $phone = $admin->validateInput($phone);
            $user_id = $admin->validateInput($user_id);
            $address = $admin->validateInput($address);

            # getting the customer's information
            $getDispatch = $admin->fetchSingle('tbldispatch','id',$user_id);

            $dispatch_image = $getDispatch->picture;

            $image_name = $_FILES['user-img']['name'];

            //specifying the supported file extension
            $validextensions = ['jpg', 'png', 'jpeg'];
            $ext = explode('.', basename($_FILES['user-img']['name']));

            //explode file name from dot(.)
            $file_extension = end($ext);

            $getImageID = uniqid().time(); #generate a unique id
            $hashImageID = sha1($getImageID); #encrypt the unique id
            $useImageID = strtoupper("IMG-".date('Y-m-d_i').substr($hashImageID, 2, 6)); #split the unique id

            $image_name = $useImageID.".".$file_extension;
            $target = '../assets/img/dispatch_image/' . $image_name;

            if($_FILES['user-img']['size'] > 2097152){
                $_SESSION['ErrorMessage'] = "The allowed file size is 2MB.";
                return;
            }elseif(!in_array($file_extension, $validextensions)){ 
                $_SESSION['ErrorMessage'] = "Please select a valid picture format";
                return;
            }
                #var_dump($_FILES['user-img']['name']);exit();
                if($_FILES['user-img']['name'] == ""){ 

                    if($dispatch->editDispatch($user_id,$fullname,$email,$phone,$dispatch_image,$address) === true){
                        move_uploaded_file($_FILES['user-img']['tmp_name'],  $target);
                        $_SESSION['messageTitle'] = "Success";
                        $_SESSION['messageText'] = "Delivery man account updated successfully";
                        $_SESSION['messageIcon'] = "success";
                    }else{
                        $_SESSION['messageTitle'] = "Alert";
                        $_SESSION['messageText'] = "Failed to update delivery man's account";
                        $_SESSION['messageIcon'] = "error";
                    }

                }else{

                    if($dispatch->editDispatch($user_id,$fullname,$email,$phone,$image_name,$address) === true){
                        unlink('../assets/img/dispatch_image/'.$getDispatch->picture);
                        move_uploaded_file($_FILES['user-img']['tmp_name'],  $target);
                        $_SESSION['messageTitle'] = "Success";
                        $_SESSION['messageText'] = "Delivery man account updated successfully";
                        $_SESSION['messageIcon'] = "success";
                    }else{
                        $_SESSION['messageTitle'] = "Alert";
                        $_SESSION['messageText'] = "Failed to update delivery man's account";
                        $_SESSION['messageIcon'] = "error";
                    }
                }

        }

    }

?>