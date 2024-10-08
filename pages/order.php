<?php 
// Start the session and output any errors
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
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
echo json_encode($product_id_cart);
echo json_encode($product_qty_cart);
    var_dump($_POST);  // Check if the data is received
    $product_idd = $_SESSION['product_id'];
	$user_id = $_SESSION['id'];
	$product_id = isset($product_idd) ? $product_idd : json_encode($product_id_cart);
	$qty = isset($_SESSION['qty_num']) ? $_SESSION['qty_num'] : json_encode($product_qty_cart) ;
    $payment_id = isset($_POST['payment_id']) ? $_POST['payment_id'] : '';
    $order_id = isset($_POST['order_id']) ? $_POST['order_id'] : '';

    if (!empty($payment_id) && !empty($order_id)) {
        // Insert data into the database
        $sql = "INSERT INTO order_product (payment_id, order_id,user_id,product_id,qty) VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ssiss", $payment_id, $order_id,$user_id,$product_id,$qty);
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