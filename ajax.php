<?php
include 'config.php';
include 'function.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_REQUEST['flag'])) {
        $flag = $_REQUEST['flag'];
    }
}
$order_id = "";
if (!isset($_SESSION['order_id']) && empty($_SESSION['order_id'])) {
    $order_id = generateOrderNo($conn);
    $_SESSION['order_id'] = $order_id;
} else {
    $order_id = $_SESSION['order_id'];
}

switch ($flag)
{
    case 'add_to_cart':
        if (isset($_SESSION['cart']) && count($_SESSION['cart']['item_id']) > 0) {
            if (isset($_REQUEST['pro_id']) && in_array($_REQUEST['pro_id'],$_SESSION['cart']['item_id'])) {
                $key = array_search($_REQUEST['pro_id'], $_SESSION['cart']['item_id']);
                $qty = $_SESSION['cart']['item_qty'][$key] = $_SESSION['cart']['item_qty'][$key]+1;
                
                $updateQuery = "UPDATE `tamp_order_item` set `product_qty`='".$qty."' WHERE `order_id`='".$order_id."' AND `product_id`='".$_REQUEST['pro_id']."'";
                $result = mysqli_query($conn, $updateQuery);
                if ($result == 1) {
                   print_r(count($_SESSION['cart']['item_id']));  
                } 
                break;
            }
        }

        $query = "SELECT * FROM `product` WHERE `id`='".$_REQUEST['pro_id']."'";
        $result = mysqli_query($conn, $query);
        $get_row = mysqli_fetch_assoc($result);

        if (mysqli_num_rows($result) == 1 && $get_row['selling_price'] == $_REQUEST['pro_price'] ) {
            $_SESSION['cart']['item_name'][]  = $get_row['product_name'];
            $_SESSION['cart']['item_price'][] = $get_row['selling_price'];
            $_SESSION['cart']['item_qty'][]   = 1;
            $_SESSION['cart']['item_id'][]    = $get_row['id'];
            $_SESSION['cart']['item_image'][]    = $get_row['product_image'];

            $sql = "INSERT INTO `tamp_order_item` SET `order_id`='".$order_id."', `product_id`='".$get_row['id']."', `product_name`='".$get_row['product_name']."', `selling_price`='".$get_row['selling_price']."', `product_qty`='1'";
            $result = mysqli_query($conn, $sql);
            if ($result == 1) {
                print_r(count($_SESSION['cart']['item_id']));
            }
        }
        break;

    case 'update_cart' :
        $key = array_search($_REQUEST['pro_id'], $_SESSION['cart']['item_id']);
        $qty = $_SESSION['cart']['item_qty'][$key];
        if (in_array($_REQUEST['pro_id'],$_SESSION['cart']['item_id'])) {
            if ($qty < $_POST['pro_qty']) {
                $key = array_search($_REQUEST['pro_id'], $_SESSION['cart']['item_id']);
                $qty = $_SESSION['cart']['item_qty'][$key] = $_SESSION['cart']['item_qty'][$key]+1;
    
                $sql = "UPDATE `tamp_order_item` set `product_qty`='".$qty."' WHERE id='".$_REQUEST['pro_id']."';";
                $result = mysqli_query($conn, $sql);
                if ($result == 1) {
                    echo "increase";
                }
            } else {
                $key = array_search($_REQUEST['pro_id'], $_SESSION['cart']['item_id']);
                $qty = $_SESSION['cart']['item_qty'][$key] = $_SESSION['cart']['item_qty'][$key]-1;
    
                $sql = "UPDATE `tamp_order_item` set `product_qty`='".$qty."';";
                $result = mysqli_query($conn, $sql);
                if ($result == 1) {
                    echo "decrease";
                }
            }
        }
        break;

    case 'delete_cart_item' :
        if (in_array($_REQUEST['pro_id'], $_SESSION['cart']['item_id'])) {
            $sql = "DELETE FROM `tamp_order_item` WHERE `id`='".$_REQUEST['pro_id']."'";

            $result = mysqli_query($conn, $sql);

            if ($result == 1) {
                $key = array_search($_REQUEST['pro_id'], $_SESSION['cart']['item_id']);

                // Unset item from sassion
                unset($_SESSION['cart']['item_id'][$key]);
                unset($_SESSION['cart']['item_name'][$key]);
                unset($_SESSION['cart']['item_price'][$key]);
                unset($_SESSION['cart']['item_qty'][$key]);
                unset($_SESSION['cart']['item_image'][$key]);

                $_SESSION['cart']['item_id'] = array_values(array_filter($_SESSION['cart']['item_id']));
                $_SESSION['cart']['item_name'] = array_values(array_filter($_SESSION['cart']['item_name']));
                $_SESSION['cart']['item_price'] = array_values(array_filter($_SESSION['cart']['item_price']));
                $_SESSION['cart']['item_qty'] = array_values(array_filter($_SESSION['cart']['item_qty']));
                $_SESSION['cart']['item_image'] = array_values(array_filter($_SESSION['cart']['item_image']));
            
                echo "success";
            }
            break;
        }
}