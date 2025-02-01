<?php 
  require('../core/init.php');

  if(isset($_SESSION['customer']) AND !empty($_SESSION['customer'])){
    $user_id = $_SESSION['customer'];
    $getCustomer = $admin->fetchSingle('tblcustomers','id',$user_id);
  }else{
    header('location: logout');
  }

	$curl = curl_init();

	if(!isset($_GET['reference']) || $_GET['reference'] == '' ) {
	  header('location: payment');
	}

    $email = $getCustomer->email;

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

      $invoiceno = $ref; # reference number
      $_SESSION['invoiceno'] = $invoiceno; # store to invoice number into a session
      $item_total = 0; # set total item cost to 0

      foreach ($_SESSION["cart_item"] as $item){

        $item_total += ($item["price"]*$item["quantity"]);
        $_SESSION['total_price'] = $item_total;

        $product->removeFromStock($item["product_id"],$item["quantity"]); # remove the quantity from the current stock
        
        $order->addToCart($invoiceno,$getCustomer->id,$item["product_id"],$item["product_name"],$item["quantity"],$item["price"]); # add items to cart

      }

      $total = $_SESSION['total_price'];
      $order_name = $_SESSION['order_name'];
      $order_email = $_SESSION['order_email'];
      $order_phone = $_SESSION['order_phone'];
      $order_address = $_SESSION['order_address'];

      $_SESSION['total_p'] = $_SESSION['total_price']; # total_p is used in payment-success.php to show the amount paid

      $order->addPayment($invoiceno,$order_name,$order_email,$order_phone,$order_address,$total,"card","1");
      $order->insertToTrack($invoiceno,'0');
      unset($_SESSION["cart_item"]); # unset all items in cart
      unset($_SESSION["order_name"]); # unset order name
      unset($_SESSION["order_email"]); # unset order email
      unset($_SESSION["order_phone"]); # unset order phone
      unset($_SESSION["order_address"]); ## unset order address
      unset($_SESSION["total_price"]); # unset total price

      header('location: payment-success');
      
    }else{
      


    }

?>
