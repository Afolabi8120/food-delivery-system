<?php     
     include('../core/init.php');
     $customer_id = $_GET['id'];
     if(isset($customer_id)) {
          $dispatch->change_status($customer_id,'1');
          $_SESSION['messageTitle'] = "Success";
          $_SESSION['messageText'] = "Account successfully activated";
          $_SESSION['messageIcon'] = "success";
          echo '<script>window.location.href="delivery-man"</script>';
     }else{
          header('location: delivery-man');
     }
?>
