<?php
    require('../core/init.php');

    // update user details
    if(isset($_POST['btnEditAccount']) && !empty($_POST['btnEditAccount'])){

        // passing data received from user into variable
        $user_id = $_SESSION['dispatch'];
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];

        # getting the user's information
        $getUser = $admin->fetchSingle('tbldispatch','id',$user_id);

        // Form Validation 
        if(empty($fullname) || empty($email) || empty($phone) || empty($address)){
            $_SESSION['ErrorMessage'] = "All Input Field are Required";
        }elseif(strlen($phone) < 11 || strlen($phone) > 11) {
            $_SESSION['ErrorMessage'] = "Please Use a Valid Phone No";
        }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['ErrorMessage'] = "Please use a valid Email Address";
        }elseif(!preg_match("/^[a-z A-Z]*$/", $fullname)){
            $_SESSION['ErrorMessage'] = "Only Alphabet allowed for the fullname field";
        }elseif(!preg_match("/^[\d]*$/", $phone)){
            $_SESSION['ErrorMessage'] = "Please Use a Valid Phone No";
        }else{

            // preventing sql injection
            $user_id = $admin->validateInput($user_id);
            $fullname = strtolower($admin->validateInput($fullname));
            $email = $admin->validateInput($email);
            $phone = $admin->validateInput($phone);
            $address = $admin->validateInput($address);

            if($dispatch->editDispatch2($user_id,$fullname,$email,$phone,$address) === true){
                $_SESSION['SuccessMessage'] = "Profile details changed Successfully";
            }else{
                $_SESSION['ErrorMessage'] = "Unable to update profile details";
            }
            
        }

    }else if(isset($_POST['btnChangePassword']) && !empty($_POST['btnChangePassword'])){ # change dispatch password

        // passing data received from user into variable
        $old_password = $_POST['old_password'];
        $new_password = $_POST['password'];
        $c_password = $_POST['cpassword'];

        $user_id = $_SESSION['dispatch'];

        # getting the dispatch's information
        $getUser = $admin->fetchSingle('tbldispatch','id',$user_id);

        // Form Validation 
        if(empty($old_password) || empty($new_password) || empty($c_password)){
            $_SESSION['ErrorMessage'] = "All input field are required";
        }elseif(strlen($password) < 5){
            $_SESSION['ErrorMessage'] = "Your password must be more than 5 characters";
        }elseif($new_password !== $c_password) {
            $_SESSION['ErrorMessage'] = "Both new password do not match";
        }else{

            // preventing sql injection
            $old_password = $admin->validateInput($old_password);
            $new_password = $admin->validateInput($new_password);
            $c_password = $admin->validateInput($c_password);

            $newpassword = password_hash($new_password, PASSWORD_DEFAULT);

            if(password_verify($old_password, $getUser->password)){ # checking if password match
                // Hashing the password provided by the user word
                $newpassword = password_hash($new_password, PASSWORD_DEFAULT);
                
                // update customer's password
                if($dispatch->changeUserPassword($getUser->id,$newpassword) === true){
                    $_SESSION['SuccessMessage'] = "Password changed successfully";
                }else{
                    $_SESSION['ErrorMessage'] = "Unable to change your password";
                }

            }else{
                $_SESSION['ErrorMessage'] = "Old password provided is incorrect";
            }
            
        }

    }else if(isset($_POST['btnChangePicture']) && !empty($_POST['btnChangePicture'])){

        $user_id = $_SESSION['dispatch'];

        # getting the dispatch's information
        $getUser = $admin->fetchSingle('tbldispatch','id',$user_id);

        $customer_image = $getUser->picture;

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
            if($dispatch->changeDispatchPicture($getUser->id, $image_name) === true){
                if($getUser->picture == ""){
                    move_uploaded_file($_FILES['user-img']['tmp_name'],  $target);
                    $_SESSION['SuccessMessage'] = "Profile photo changed successfully";
                }else{
                    unlink('../assets/img/dispatch_image/'.$getUser->picture);
                    move_uploaded_file($_FILES['user-img']['tmp_name'],  $target);
                    $_SESSION['SuccessMessage'] = "Profile photo changed successfully";
                }
                        
            }else{
                $_SESSION['ErrorMessage'] = "Failed to change profile photo";
            }
                    
        }
                
    }

?>