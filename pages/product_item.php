<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .carousel-indicators img{
            width: 70px;
            display:block;
        }

        .carousel-indicators button{
            width: max-content !important;
        }

        .carousel-indicators{
            position: unset;
        }

        .carousel-indicators button.active img{
            border:2px solid #f9f8fe;
        }
    </style>
</head>
<body>
    <div id="carouselDemo" class="carousel slide w-25" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="5000">
                <img src="product/product-01.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="product/product-02.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="5000">
                <img src="product/product-03.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselDemo" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselDemo" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
        </button>
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1">
                <img src="product/product-01.jpg" >
            </button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="1" aria-label="Slide 2">
                <img src="product/product-02.jpg" >
            </button>
            <button type="button" data-bs-target="#carouselDemo" data-bs-slide-to="2" aria-label="Slide 3">
            <img src="product/product-03.jpg" >

            </button>
        </div>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
