<?php 
    require('../core/init.php');

    if(isset($_SESSION['customer']) AND !empty($_SESSION['customer'])){
        $user_id = $_SESSION['customer'];
        $getCustomer = $admin->fetchSingle('tblcustomers','id',$user_id);
    }else{
        header('location: logout');
    }

    if(isset($_POST['r_product_id'])){
        # product id
        $productId = $_POST['r_product_id'];

        $productDetails = $admin->fetchSingle('tblproduct','product_id',$product_id);

        if(!empty($_SESSION["cart_item"]))
        {
            foreach($_SESSION["cart_item"] as $k => $v) 
            {
                if($productId == $v['product_id']){
                    unset($_SESSION["cart_item"][$k]);
                    $item_total -= ($item["price"][$v] * $item["quantity"][$v]);
                    $_SESSION['total_price'] = $item_total;
                    $_SESSION['SuccessMessage'] = "Item removed from cart";
                }
            }
        }
    }
    
?>

