<?php
	require('../core/init.php');

	if(isset($_POST['btnAddToCart'])){
        
        $quantity = $_POST['demo3']; # quantity
        $product_id = $_POST['product_id']; # product id
        $user_id = $_SESSION['customer']; # customer id

        if($quantity < 1){
        	$_SESSION['ErrorMessage'] = "Please select at least one quantity";
        	return;
        }

        # getting the product details using its id
        $productDetails = $admin->fetchSingle('tblproduct','product_id',$product_id);

        if($productDetails->quantity <= 0){
            $_SESSION['ErrorMessage'] = ucwords($productDetails->product_name) . " is out of stock";
            return;
        }

        # pushing the product details into an array
        $itemArray = array($productDetails->product_id => array('product_name'=>$productDetails->product_name, 'product_id'=>$productDetails->product_id, 'quantity'=>$quantity, 'price'=>$productDetails->new_price));

        if(!empty($_SESSION["cart_item"])) 
        {
            if(in_array($productDetails->product_id,array_keys($_SESSION["cart_item"]))) 
            {
                foreach($_SESSION["cart_item"] as $k => $v) 
                {
                    if($productDetails->product_id == $k) 
                    {
                        if(empty($_SESSION["cart_item"][$k]["quantity"])) 
                        {
                            $_SESSION["cart_item"][$k]["quantity"] = 0;
                        }
                        $_SESSION["cart_item"][$k]["quantity"] += $quantity;
                        $_SESSION['SuccessMessage'] = $quantity . " " . ucwords($productDetails->product_name). " added to cart";
                    }
                }
            }
            else 
            {
                #$product->removeFromStock($productDetails->product_id,$quantity);
                $_SESSION["cart_item"] = $_SESSION["cart_item"] + $itemArray;
                $_SESSION['SuccessMessage'] = $quantity . " " . ucwords($productDetails->product_name). " added to cart";
            }
        } 
        else 
        {
            $_SESSION["cart_item"] = $itemArray;
            $_SESSION['SuccessMessage'] = $quantity . " " . ucwords($productDetails->product_name). " added to cart";
        }
    }

?>