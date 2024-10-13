<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$host = "localhost";
$username = "root";
$password = "";
$dbname = "product_data";

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$product_id_cart = $_SESSION['productid_cart_id'];
$product_qty_cart = $_SESSION['productid_cart_qty'];
	$user_id = $_SESSION['id'];
    $payment_id = isset($_POST['payment_id']) ? $_POST['payment_id'] : '';
    $order_id = isset($_POST['order_id']) ? $_POST['order_id'] : '';
    if (isset($_SESSION['product_id'])) {
        $product_id = [$_SESSION['product_id']];
        $qty = isset($_SESSION['qty_num']) ? [$_SESSION['qty_num']] : [];
        echo json_encode($product_id);
        echo "Session Product ID exists";
    } else {
        $product_id = $product_id_cart;
        $qty = $product_qty_cart;
        echo json_encode($product_id_cart);
        echo "Using cart data instead";
    }
    $product_id_json = json_encode($product_id);
    $product_qty_json = json_encode($qty);
    if (!empty($payment_id) && !empty($order_id)) {
        $sql = "INSERT INTO order_product (payment_id, order_id,user_id,product_id,qty) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssiss", $payment_id, $order_id,$user_id, $product_id_json, $product_qty_json);
            if ($stmt->execute()) {
                unset($_SESSION['product_id']);
                unset($_SESSION['qty_num']);
                unset($_SESSION['product_cart_id']);
                unset($_SESSION['product_cart_qty']);
                echo "Payment recorded successfully!";
				header("location:OrderDetails.php");
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    } else {
        echo "Payment ID or Order ID missing!";
    }


$conn->close();
?> 