<?php
session_start();

if (isset($_SESSION['name'])) {
include 'connect.php';
    // $con_wish = mysqli_connect("localhost", "root", "", "wishlist_user");
    $wish_face = "wish_name_" . $_SESSION['id'];

    // Fetch wishlist data
    if (isset($_POST['action']) && $_POST['action'] == 'get_wishlist') {
        $qry_select = mysqli_query($con_wish, "SELECT * FROM $wish_face");

        if (mysqli_num_rows($qry_select) > 0) {
            while ($row_add = mysqli_fetch_array($qry_select)) {
                echo '<li class="mt-3" style="cursor:pointer;">
                        <a href="addtocart.php?id=' . $row_add['id'] . '">
                            <div class="product-details d-flex gap-3 align-items-center">
                                <div class="img">
                                    <img src="upload/' . $row_add['product_img'] . '" alt="Product">
                                </div>
                                <div class="wish-product">
                                    <h3 style="font-size: 1rem; margin:0%;">' . $row_add['name'] . '</h3>
                                    <span class="fw-semibold" style="font-size:.6rem;">price:-</span>
                                    <span class="text-success fw-light" style="font-size:1.1rem;">$' . $row_add['price'] . '</span>
                                    <button value="' . $row_add['id'] . '" class="remove-btn" style="border: none; background: transparent;">
                                        <i class="bx bx-x-circle"></i>
                                    </button>
                                </div>
                            </div>
                        </a>
                      </li>';
            }
        } else {
            echo "<div>
                    <img class='img_fav' src='./img_ecommerce/fav.jpg'>
                    <p>Please add items to the wishlist</p>
                  </div>";
        }
        exit;
    }

    // Remove from wishlist
    if (isset($_POST['action']) && $_POST['action'] == 'remove') {
        $remove = $_POST['remove'];
        $qry_remove = mysqli_query($con_wish, "DELETE FROM $wish_face WHERE id = $remove");

        if ($qry_remove) {
            echo "Item removed from wishlist";
        } else {
            echo "Failed to remove item";
        }
        exit;
    }
}
?>
