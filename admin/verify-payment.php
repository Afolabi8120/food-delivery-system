<?php 
  require('../core/init.php');

  if(isset($_SESSION['admin']) AND !empty($_SESSION['admin'])){
    $user_id = $_SESSION['admin'];
    $getAdmin = $admin->fetchSingle('tbluser','user_id',$user_id);
  }else{
    header('location: logout');
  }

	$curl = curl_init();

	if(!isset($_GET['reference']) || $_GET['reference'] == '' ) {
	  header('location: orders');
	}

    $curl = curl_init();

    $ref = $_GET['reference'];
    $ref = rawurlencode($ref);

    if($ref == null || $ref == '') {
        header("Location:javascript://history.go(-1)");
    }
  
    curl_setopt_array($curl, array(

      CURLOPT_URL => "https://api.paystack.co/transaction/verify/" . $ref,

      CURLOPT_RETURNTRANSFER => true,

      CURLOPT_ENCODING => "",

      CURLOPT_MAXREDIRS => 10,

      CURLOPT_TIMEOUT => 30,

      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,

      CURLOPT_CUSTOMREQUEST => "GET",

      CURLOPT_HTTPHEADER => [
        "Accept: application/json",
        "Authorization: Bearer sk_test_a9d5ab58291d0fa68468f23d91093af73cd5f905",
        "Cache-Control: no-cache"
      ]

    ));
    
    //Execute cURL
    $response = curl_exec($curl);

    $err = curl_error($curl);
    #curl_close($curl);
    
    if ($err) {
      die("cURL Error #: ") . $err;
    } 

    //var_dump($response);
    $tranx = json_decode($response);

    if(!$tranx->status){
      die("API return some errors: " . $tranx->message);
    }

    if('success' == $tranx->data->status){

      $_SESSION['messageTitle'] = "Success";
      $_SESSION['messageText'] = "Payment successfully verified";
      $_SESSION['messageIcon'] = "success";

      echo '<script>window.location.href="orders"</script>';
      
    }else{
      
      $_SESSION['messageTitle'] = "Verification Failed";
      $_SESSION['messageText'] = "Failed to verify payment";
      $_SESSION['messageIcon'] = "error";

      echo '<script>window.location.href="orders"</script>';

    }

?>
