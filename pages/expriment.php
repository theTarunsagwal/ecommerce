<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f9f9f9;
        }

        .product-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .product-slider {
            display: flex;
            align-items: center;
            gap: 20px;
            max-width: 600px;
            width: 100%;
            position: relative;
        }

        .main-image {
            width: 100%;
            overflow: hidden;
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 400px;
        }

        .main-image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .thumbnails {
            display: flex;
            gap: 10px;
            flex-direction: column;
            max-width: 100px;
        }

        .thumbnails img {
            width: 80px;
            height: auto;
            cursor: pointer;
            object-fit: contain;
            border: 2px solid transparent;
            transition: border 0.3s ease;
        }

        .thumbnails img.active {
            border-color: #ca0a0a; /* Border color for the active thumbnail */
        }

        .navigation {
            display: none; /* Hide navigation buttons */
        }

        .item-info {
            flex: 1;
            max-width: 500px;
        }

        .item-info h1 {
            font-size: 1.5rem;
            margin-bottom: 10px;
        }

        .item-info p {
            font-size: 1rem;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        .item-info h3 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 15px;
        }

        .add-to-cart {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .count-btn {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .count-btn button {
            padding: 5px 10px;
            border: 1px solid #ccc;
            background: none;
            cursor: pointer;
        }

        .count-btn input {
            width: 40px;
            text-align: center;
            border: 1px solid #ccc;
            padding: 5px;
        }

        .buy-btn {
            padding: 10px 20px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .buy-btn:hover {
            background-color: #ca0a0a;
        }

        .availability-stock a {
            display: block;
            font-size: 0.9rem;
            margin-bottom: 10px;
            color: #555;
        }

        @media (max-width: 768px) {
            .product-container {
                flex-direction: column;
                align-items: center;
            }

            .main-image {
                height: 300px;
            }

            .thumbnails img {
                width: 60px;
            }
        }

        @media (max-width: 480px) {
            .thumbnails img {
                width: 50px;
            }

            .item-info {
                max-width: 100%;
                padding: 0 10px;
            }
        }
    </style>
</head>
<body>

<div class="product-container">
    <div class="product-slider">
        <div class="thumbnails">
            <img src="upload/apple 1.jpg" alt="Thumbnail 1" onmouseover="changeImage(this)">
            <img src="upload/apple 2.jpg" alt="Thumbnail 2" onmouseover="changeImage(this)">
            <img src="upload/apple 3.jpg" alt="Thumbnail 3" onmouseover="changeImage(this)">
            <img src="upload/apple 4.jpg" alt="Thumbnail 4" onmouseover="changeImage(this)">
        </div>
        <div class="main-image">
            <img id="currentImage" src="upload/apple 4.jpg" alt="Main Image">
        </div>
        <div class="navigation">
            <button id="prevBtn">❮</button>
            <button id="nextBtn">❯</button>
        </div>
    </div>
    <div class="item-info">
        <h1>Track Shot Adidas</h1>
        <p>Most of us are familiar with the iconic design of the egg-shaped chair floating in the air. The Hanging Egg Chair is a critically acclaimed design that has enjoyed praise worldwide ever since the distinctive.</p>
        <h3>$305.00</h3>
        <div class="add-to-cart">
            <div class="count-btn">
                <button type="button" class="minus">-</button>
                <input type="text" name="quantity" class="form-control text-center" value="1" readonly>
                <button type="button" class="plus">+</button>
            </div>
            <button class="buy-btn" name="btn">Add to Cart</button>
            <button class="buy-btn">Buy it Now</button>
        </div>
        <div class="availability-stock">
            <a href="">Availability: <span class="text-success fw-bolder">In Stock</span></a>
            <a href="">SKU: <span>N/A</span></a>
            <a href="">Vendor: <span>Nothing Says Sporty Versatility</span></a>
            <a href="">Categories: <span>Bar Furniture</span></a>
        </div>
    </div>
</div>

<script>
    function changeImage(element) {
        const newSrc = element.src;
        const currentImage = document.getElementById('currentImage');
        
        // Update the main image source
        currentImage.src = newSrc;

        // Remove 'active' class from all thumbnails
        document.querySelectorAll('.thumbnails img').forEach(img => img.classList.remove('active'));

        // Add 'active' class to the hovered thumbnail
        element.classList.add('active');
    }

    // Initialize the thumbnails
    const initialSrc = document.getElementById('currentImage').src;
    document.querySelectorAll('.thumbnails img').forEach(img => {
        if (img.src === initialSrc) {
            img.classList.add('active');
        }
    });
</script>

</body>
</html>
