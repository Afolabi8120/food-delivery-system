<?php
    include('../core/init.php');

    if(isset($_POST['btnUpdateOrderStatus']) && !empty($_POST['btnUpdateOrderStatus'])){
        
        $invoiceno = $_POST['invoiceno'];
        $status = $_POST['status'];

        if(empty($invoiceno) || $status == "" || $status == "none"){
            $_SESSION['messageTitle'] = "Empty Field";
            $_SESSION['messageText'] = "All fields are required";
            $_SESSION['messageIcon'] = "error";
        }else{

            if($order->changeDeliveryStatus($invoiceno,$status) === true){
                $order->insertToTrack($invoiceno,$status);
                $_SESSION['messageTitle'] = "Success";
                $_SESSION['messageText'] = "Order status sucessfully updated";
                $_SESSION['messageIcon'] = "success";
            }else{
                $_SESSION['messageTitle'] = "Alert";
                $_SESSION['messageText'] = "Failed to change order status";
                $_SESSION['messageIcon'] = "error";
            }
            

        }

    }

    if(isset($_POST['btnAssignDeliveryMan']) && !empty($_POST['btnAssignDeliveryMan'])){
        
        $invoiceno = $_POST['invoiceno'];
        $delivery_man = $_POST['delivery_man'];

        $getDispatchData = $admin->fetchSingle('tbldispatch','id',$delivery_man);

        if(empty($invoiceno) || $delivery_man == "" || $delivery_man == "none"){
            $_SESSION['messageTitle'] = "Empty Field";
            $_SESSION['messageText'] = "All fields are required";
            $_SESSION['messageIcon'] = "error";
        }elseif($admin->check('tblassign_delivery','invoiceno',$invoiceno) === true){
            $_SESSION['messageTitle'] = "Alert";
            $_SESSION['messageText'] = "Order already assigned to a delivery man";
            $_SESSION['messageIcon'] = "error";
        }else{

            if($dispatch->assignDispatch($delivery_man,$invoiceno) === true){
                $_SESSION['messageTitle'] = "Success";
                $_SESSION['messageText'] = "Order has sucessfully been assigned to " . ucwords($getDispatchData->fullname);
                $_SESSION['messageIcon'] = "success";
            }else{
                $_SESSION['messageTitle'] = "Alert";
                $_SESSION['messageText'] = "Failed to assign order to " . ucwords($getDispatchData->fullname);
                $_SESSION['messageIcon'] = "error";
            }
            

        }

    }

    if(isset($_POST['btnConfirm']) && !empty($_POST['btnConfirm'])){
        
        $invoiceno = $_POST['invoiceno'];
        $status = '2';
        $dispatch_id = $_SESSION['dispatch'];

        if(empty($invoiceno) || empty($dispatch_id)){
            $_SESSION['ErrorMessage'] = "All fields are required";
        }else{

            if($order->changeDeliveryStatus($invoiceno,$status) === true){
                $order->insertToTrack($invoiceno,$status);
                $dispatch->updateDispatchDeliveryStatus($dispatch_id,$invoiceno,$status);
                $_SESSION['SuccessMessage'] = "Order status sucessfully updated";
            }else{
                $_SESSION['ErrorMessage'] = "Failed to change order status";
            }

        }

    }

    if(isset($_POST['btnReject']) && !empty($_POST['btnReject'])){
        
        $invoiceno = $_POST['invoiceno'];
        $status = '4';
        $dispatch_id = $_SESSION['dispatch'];

        if(empty($invoiceno) || empty($dispatch_id)){
            $_SESSION['ErrorMessage'] = "All fields are required";
        }else{

            if($order->changeDeliveryStatus($invoiceno,$status) === true){
                $order->insertToTrack($invoiceno,$status);
                $dispatch->updateDispatchDeliveryStatus($dispatch_id,$invoiceno,$status);
                $_SESSION['SuccessMessage'] = "Order status sucessfully updated";
            }else{
                $_SESSION['ErrorMessage'] = "Failed to change order status";
            }

        }

    }

    if(isset($_POST['btnPick']) && !empty($_POST['btnPick'])){
        
        $invoiceno = $_POST['invoiceno'];
        $status = '3';
        $dispatch_id = $_SESSION['dispatch'];

        if(empty($invoiceno) || empty($dispatch_id)){
            $_SESSION['ErrorMessage'] = "All fields are required";
        }else{

            if($order->changeDeliveryStatus($invoiceno,$status) === true){
                $order->insertToTrack($invoiceno,$status);
                $dispatch->updateDispatchDeliveryStatus($dispatch_id,$invoiceno,$status);
                $_SESSION['SuccessMessage'] = "Order status sucessfully updated";
            }else{
                $_SESSION['ErrorMessage'] = "Failed to change order status";
            }

        }

    }

    if(isset($_POST['btnDelivered']) && !empty($_POST['btnDelivered'])){
        
        $invoiceno = $_POST['invoiceno'];
        $status = '1';
        $dispatch_id = $_SESSION['dispatch'];

        if(empty($invoiceno) || empty($dispatch_id)){
            $_SESSION['ErrorMessage'] = "All fields are required";
        }else{

            if($order->changeDeliveryStatus($invoiceno,$status) === true){
                $order->insertToTrack($invoiceno,$status);
                $dispatch->updateDispatchDeliveryStatus($dispatch_id,$invoiceno,$status);
                $_SESSION['SuccessMessage'] = "Order status sucessfully updated";
            }else{
                $_SESSION['ErrorMessage'] = "Failed to change order status";
            }

        }

    }


?>