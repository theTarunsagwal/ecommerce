<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Checkout</title>
	<link rel="icon" type="image/png" href="images/icons/favicon.png" />
	<script src="https://code.jquery.com/jquery-3.7.1.js"
		integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
	<script src="https://cdn.tailwindcss.com"></script>
	<style>
		.order_summary::-webkit-scrollbar {
			visibility: hidden;

		}
	</style>
</head>
<?php
if(isset($_GET['id']) && !empty($_GET['id'])){
    $pr_name = $_GET['id'];
	 $_SESSION['product_id'] = $pr_name;
	$_SESSION['qty_num'] = $_GET['quantity'];
}
?>

<body>
	<div class="fixed w-full z-50">
		<?php include './header.php' ?>
	</div>
	<div class="grid sm:px-10 lg:grid-cols-2 gap-5 lg:px-20 xl:px-32 py-16">
		<div>
			<?php
			$user_id = $_SESSION['id'];
			$query = mysqli_query($con, "SELECT address FROM user_data WHERE id = $user_id");
			$row = mysqli_fetch_array($query);
			$user_address = json_decode($row['address'], true);
			$_SESSION['address_order'] = $row['address'];    
 			?>
			<div class="p-4 pt-8 mt-5 rounded-lg border bg-white">
				<p class="text-xl font-medium">Address</p>
<?php 
// Check if the user_address is set and not empty
if (isset($user_address) && !empty($user_address)) {
	?>

<div class="mt-8 space-y-4 rounded-lg border bg-white px-4 py-6 sm:px-6">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
        // Store selected address in the session
        $selected_address = $_POST['selected_address'];
        $_SESSION['selected_address'] = $selected_address;
    }
    ?>
	<form id="address-form" method="POST">
	<?php
    foreach($user_address as $key => $address) {
        ?>
            <div class="flex flex-col sm:flex-row items-start border-b pb-4 mb-4">
                <div class="flex w-full flex-col px-4 py-2">
                    <label class="inline-flex items-center">
                        <input type="radio" class="selected_address" name="selected_address" value="<?php echo $key; ?>" <?php echo isset($_SESSION['selected_address']) && $_SESSION['selected_address'] == $key ? 'checked' : ''; ?>>
                        <span class="ml-2 font-semibold text-lg">
                            <?php echo $address['fname'] . " " . $address['lname']; ?>
                        </span>
                    </label>
                    <p class="text-gray-600">
                        <?php echo $address['address'] . ", " . $address['address2']; ?>
                    </p>
                    <p class="text-gray-600">
                        <?php echo $address['city'] . ", " . $address['state'] . " " . $address['zip_code']; ?>
                    </p>
                    <p class="text-gray-600">
                        <?php echo $address['country']; ?>
                    </p>
                </div>
            </div>
			<?php
    }
    ?>
	</form>
</div>

	<?php
} else {
	// Display message if no addresses are available
	?>
	<div class="mt-8 space-y-4 rounded-lg border bg-white px-4 py-6 sm:px-6 text-center">
		<p class="text-gray-600">You haven't added an address yet.</p>
		<a href="add_address.php" class="text-blue-500">Add your address</a>
	</div>
	<?php
}
?>


			</div>
			<div class=" px-4 pt-8 border mt-5">
				<p class="text-xl font-medium">Order Summary</p>
				<p class="text-gray-400">Check your items. And select a suitable shipping method.</p>
				<div class="mt-8 order_summary space-y-3  bg-white px-2 py-4 sm:px-6 max-h-[30rem] overflow-y-auto">
					<form action="" method="POST">
					<?php
					 $table_name = 'user_name_'.$_SESSION['id'];
					$query = "SELECT * FROM $table_name  ";
					$total_price= 0;
					if(isset($pr_name)){
			           $buy_product = $pr_name;
						$buy_now = mysqli_query($con_pro,"select * from product where id = '$buy_product'");
						while ($row = mysqli_fetch_assoc($buy_now)){
							
						    $total_price += $row['price'] * $_GET['quantity'];
							?>
							<input type="text" name="qty_cart" value="<?php echo  $_GET['quantity'];  ?>">
							<input type="text" name="cart_id" value="<?php echo   $_GET['id']; ?>">
							<div class="flex flex-col rounded-lg bg-white sm:flex-row border ">
								<img class="m-2 h-24 w-28 rounded-md border object-cover object-center"
									src="./upload/<?php echo $row['img'] ?>" alt="" />
								<div class="flex w-full flex-col px-4 py-4">
									<span class="font-semibold">
										<?php echo $row['name'] ?>
									</span>
									<span class="float-right text-gray-400"> Quantity :</span>
									<?php echo $_GET['quantity']; ?></span>
									<p class="text-lg font-bold">$
										<?php echo $row['price'] ?>.00
									</p>
								</div>
							</div>
							<?php } 
						
					}else{
					$result = mysqli_query($con_userside, $query);
					$product_id_cart = []; 
					$product_qty_cart = []; 
					while($item = mysqli_fetch_array($result)) {
						$total_price += $item['price'] * $item['qty'];
						$product_id_cart[] = $item['pr_id'];
						$product_qty_cart[] =  $item['qty'];
						?>
					<div class="flex flex-col rounded-lg bg-white sm:flex-row border ">
						<img class="m-2 h-24 w-28 rounded-md border object-cover object-center"
							src="./upload/<?php echo $item['image'] ?>" alt="" />
						<div class="flex w-full flex-col px-4 py-4">
							<span class="font-semibold">
								<?php echo $item['name'] ?>
							</span>
							<span class="float-right text-gray-400"> Quantity :</span>
							<?php echo $item['qty'] ?></span>
							<p class="text-lg font-bold">$
								<?php echo $item['price'] ?>.00
							</p>
						</div>
					</div>
					<input type="hidden" name="qty_cart" value='<?php echo json_encode($product_qty_cart); ?>'>
					<input type="hidden" name="productid_cart" value='<?php echo json_encode($product_id_cart); ?>'>
					<?php } 
					 $_SESSION['productid_cart_id'] = $product_id_cart;
					 $_SESSION['productid_cart_qty'] = $product_qty_cart;
					?>
					<?php
					
					} ?>
					</form>
				</div>
			</div>
		</div>
		<div class=" bg-gray-50 px-4 pt-1 mt-5 lg:mt-5 rounded-lg border h-fit ">
			<p class="mt-8 text-lg font-bolder">Payment Details </p>
			<div class="mt-10 ">
				<div class="mt-6 border-t  border-b py-2">
					<div class="flex items-center justify-between">
						<p class="text-sm font-medium text-gray-900">Subtotal</p>
						<p class="font-semibold text-gray-900">
							<?php echo $total_price ?>.00
						</p>
					</div>
					<div class="flex mt-1 items-center justify-between">
						<p class="text-sm font-medium text-gray-900">Shipping</p>
						<?php $shiping  = 8 + $total_price;
						$_SESSION['shiping'] = $shiping; 
						?>
						<p class="font-semibold text-gray-900">$8.00</p>
					</div>
				</div>
				<div class="mt-2 flex items-center justify-between">
					<p class="text-sm font-medium text-gray-900">Total</p>
					<p class="text-2xl font-semibold text-gray-900">$
						<?php echo $shiping ?>.00
					</p>
				</div>
				<button id="button"
					class="mt-4 mb-8 w-full rounded-md bg-gray-900 px-6 py-3 font-medium text-white">Place
					Order</button>
			</div>
		</div>
	</div>

	<?php
	// session_start();
	// include('config.php');
	require_once '../razorpay/Razorpay.php';

	use Razorpay\Api\Api;

	$user_id = $_SESSION['id'];

	$totalPriceWithTax = $_SESSION['shiping'];

	
	$keyId = 'rzp_test_kBREEooxYkKLPo'; 
	$keySecret = 'P5NsdNUNPas0c0C74oCjkk1Y';  

	$api = new Api($keyId, $keySecret);

	$order = $api->order->create(array(
		'amount' => $totalPriceWithTax * 100,
		'currency' => 'INR',
		'receipt' => 'order_rcptid_' . $user_id,
		'payment_capture' => 1,
		
	));


	$orderId = $order['id'];
	?>
	<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
	<script>
	$('.selected_address').on('click', function(){
    let form = $(this).closest('form');
    
    // Send form data via AJAX
    $.ajax({
        url: form.attr('action'),
        type: form.attr('method'),
        data: form.serialize(),  // Serialize form data
        success: function(data) {
            // alert('Address updated successfully!');
        },
        error: function (xhr, status, error) {
            console.error("Error in AJAX request: ", error);
        }
    });
});
document.getElementById('button').onclick = function (e) {
    // Get the selected address from the radio button
    var selectedAddress = document.querySelector('input[name="selected_address"]:checked');

    if (!selectedAddress) {
        alert("Please select an address before placing the order.");
        return;
    }

    var addressId = selectedAddress.value; // Get the selected address ID

    var options = {
        "key": "<?php echo $keyId; ?>", // Your Razorpay Key ID
        "amount": "<?php echo $totalPriceWithTax * 100; ?>", // Amount in paise (from PHP server-side)
        "currency": "INR",
        "name": "megumi shoplif",
        "description": "Purchase Description",
        "image": "https://yourwebsite.com/logo.png", // Replace with your logo
        "order_id": "<?php echo $orderId; ?>", // Razorpay Order ID from server-side
        "handler": function (response) {
            console.log(response);  // Log Razorpay response to verify data
			window.location.href = "OrderDetails.php";
            $.ajax({
                url: "order.php",
                type: "POST",
                data: {
                    payment_id: response.razorpay_payment_id,
                    order_id: response.razorpay_order_id,
                    address_id: addressId, // Include the selected address ID
                    signature: response.razorpay_signature
                },
                success: function (data) {
                    alert('Payment verified successfully! ' + data);
                    // You can redirect the user to a success page
                },
                error: function (xhr, status, error) {
                    console.error("Error in AJAX request: ", error);
                }
            });
        },
        "theme": {
            "color": "#3399cc"
        }
    };
    var rzp = new Razorpay(options);
    rzp.open();
    e.preventDefault();
};
</script>

</body>
</html>