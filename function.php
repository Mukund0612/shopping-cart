<?php
    
    function generateOrderNo($conn) {
        $orderNumberLength = 7;
        $string = "0123456789";
        $is_unique = false;
        while (!$is_unique) {
            $order_no = 'ORD';
            $n = 0;
            while ($n < strlen($string)) {
                $char = substr($string, mt_rand(0, strlen($string)-1), 1);
                $order_no .= $char;
                $n++;
            }
            $query = "SELECT * FROM `order` WHERE `order_id`='".$order_no."'";
            $result = mysqli_query($conn, $query) or die(mysqli_error($conn));
            if (mysqli_num_rows($result) == 0) {
                $is_unique = true;
            } else {
                $is_unique = false;
            }
        }
        return $order_no;
    }