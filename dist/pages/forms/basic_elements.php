<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Purple Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../../assets/vendors/font-awesome/css/font-awesome.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />
</head>

<body>
  <?php
  session_start();
  if(isset($_SESSION['adminname'])){
    $con = mysqli_connect("localhost","root","","ecommerce")
  ?>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
        <a class="navbar-brand brand-logo" href="index.html"><img src="assets/images/logo.svg" alt="logo" /></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="assets/images/logo-mini.svg"
            alt="logo" /></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-stretch">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <div class="search-field d-none d-md-block">
          <form class="d-flex align-items-center h-100" action="#">
            <div class="input-group">
              <div class="input-group-prepend bg-transparent">
                <i class="input-group-text border-0 mdi mdi-magnify"></i>
              </div>
              <input type="text" class="form-control bg-transparent border-0" placeholder="Search projects">
            </div>
          </form>
        </div>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-bs-toggle="dropdown"
              aria-expanded="false">
              <div class="nav-profile-img">
                <img src="assets/images/faces/face1.jpg" alt="image">
                <span class="availability-status online"></span>
              </div>
              <div class="nav-profile-text">
                <p class="mb-1 text-black">David Greymaax</p>
              </div>
            </a>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-cached me-2 text-success"></i> Activity Log </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">
                <i class="mdi mdi-logout me-2 text-primary"></i> Signout </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
          data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:../../partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="assets/images/faces/face1.jpg" alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column">
                <span class="font-weight-bold mb-2"><?php echo $_SESSION['adminname'] ?></span>
                <span class="text-secondary text-small">Project Manager</span>
              </div>
              <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../../index.php">
              <span class="menu-title">Dashboard</span>
              <i class="mdi mdi-home menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#forms" aria-expanded="false" aria-controls="forms">
              <span class="menu-title">Upload</span>
              <i class="mdi mdi-format-list-bulleted menu-icon"></i>
            </a>
            <div class="collapse" id="forms">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="#">Upload product</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
              <span class="menu-title">Charts</span>
              <i class="mdi mdi-chart-bar menu-icon"></i>
            </a>
            <div class="collapse" id="charts">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../charts/chartjs.php">ChartJs</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
              <span class="menu-title">Prodoct table</span>
              <i class="mdi mdi-table-large menu-icon"></i>
            </a>
            <div class="collapse" id="tables">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="../tables/basic-table.php">Product table</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="page-header">
            <h3 class="page-title"> Form elements </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Forms</a></li>
                <li class="breadcrumb-item active" aria-current="page">Form elements</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product upload </h4>

                  <?php
                  if(isset($_POST['sub'])){
                  $pname=$_POST['pname'];
                  $price=$_POST['price'];
                  $about=$_POST['about'];
                  $pname=$_POST['pname'];
                  $brand = $_POST['brand'];
                  $product=$_POST['product'];

                  if(isset($_FILES['img'])){
                    $filename = $_FILES['img']['name'];
                    $tmpfile = $_FILES['img']['tmp_name'];
                    move_uploaded_file($tmpfile, '../../../pages/upload/'.$filename);
                  }
                  switch($product){
                    case 'Dining Room':
                      $query_work="select * from dining_room";
                      $query = "INSERT INTO `dining_room`(`dining_name`, `dining_price`, `dining_image`, `dining_about`, `brand_names`) VALUES ('$pname',$price,'$filename','$about','$brand')";
                      break;
                      case 'Decor Art':
                      $query_work="select * from decor_art";
                        $query = "INSERT INTO `decor_art`(`decor_name`, `decor_price`, `decor_img`, `decor_about`, `brand_name`) VALUES ('$pname',$price,'$filename','$about','$brand')";
                      break;
                      case 'Wood':
                      $query_work="select * from wood";

                        $query = "INSERT INTO `wood`(`image_name`, `price`, `image`, `about`, `brand_names_w`) VALUES ('$pname',$price,'$filename','$about','$brand')";
                      break;
                      case 'New Product':
                      $query_work="select * from new_product";

                        $query = "INSERT INTO `new_product`(`name`, `price`, `img`, `about`, `brand_name_n`) VALUES ('$pname',$price,'$filename','$about','$brand')";
                      break;
                      case '---select option---':
                        echo "Please select a product category";
                      break;
                    
                  }?>
                    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
                  <script>
                      $(document).ready(function(){
                        swal('hello');
                      });
                    </script>
                  <?php
                }
                  ?>

                  <form class="form-sample" method="POST" enctype="multipart/form-data">
                    <p class="card-description"> Product info </p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="pname" />
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Price</label>
                          <div class="col-sm-9">
                            <input type="number" class="form-control" name="price" />
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Item section</label>
                          <div class="col-sm-9">
                            <select class="form-select" name="brand">
                              <option>---select option---</option>
                              <option value="1">Nike</option>
                              <option value="2">Adidas</option>
                              <option value="3">Gucci</option>
                              <option value="4">H&M</option>
                              <option value="5">Louis Vuitton</option>
                              <option value="6">Zara</option>
                              <option value="7">Uniqlo</option>
                              <option value="8">Levi's</option>
                              <option value="9">chanel</option>
                              <option value="10">ralph lauren</option>
                            </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Product</label>
                          <div class="col-sm-9">
                            <select class="form-select" name="product">
                              <option>---select option---</option>
                              <option>Dining Room</option>
                              <option>Decor Art</option>
                              <option>Wood</option>
                              <option>New Product</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">File upload</label>
                          <div class="col-md-6">
                            <input type="file" name="img" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Upload Image">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary py-3"
                                  type="button">Upload</button>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="exampleTextarea1">Detaile</label>
                          <div class="col-sm-9">
                            <textarea class="form-control" id="exampleTextarea1" name="about" rows="4"></textarea>
                          </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" id="btn" class="btn btn-gradient-primary me-2" name="sub">Submit</button>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-12 grid-margin">
               <div class="card">
                 <div class="card-body">
                  <h4 class="card-title">Product related image  upload </h4>
                  <form class="form-sample" method="POST" enctype="multipart/form-data">
                    <p class="card-description"> Product info </p>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Relative  image</label>
                          <div class="col-md-6">
                            <input type="file" name="img" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Upload Image">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary py-3"
                                  type="button">Upload</button>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Relative  image</label>
                          <div class="col-md-6">
                            <input type="file" name="img" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Upload Image">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary py-3"
                                  type="button">Upload</button>
                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Relative  image</label>
                          <div class="col-md-6">
                            <input type="file" name="img" class="file-upload-default">
                            <div class="input-group col-xs-12">
                              <input type="text" class="form-control file-upload-info" disabled
                                placeholder="Upload Image">
                              <span class="input-group-append">
                                <button class="file-upload-browse btn btn-gradient-primary py-3"
                                  type="button">Upload</button>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php
                         $query_s=mysqli_query($con,$query_work);
                         while ($row=mysqli_fetch_array($query_s)){
                         }
                         
                      ?>
                      <div class="row">
                        <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Item section</label>
                          <div class="col-sm-9">
                            <select class="form-select" name="brand">
                              <option>---select option---</option>
                              <option value="1">Nike</option>
                              <option value="2">Adidas</option>
                              <option value="3">Gucci</option>
                              <option value="4">H&M</option>
                              <option value="5">Louis Vuitton</option>
                              <option value="6">Zara</option>
                              <option value="7">Uniqlo</option>
                              <option value="8">Levi's</option>
                              <option value="9">chanel</option>
                              <option value="10">ralph lauren</option>
                            </select>
                          </div>
                        </div>
                        </div>
                        <div class="col-md-4">
                        <div class="form-group row">
                          <label class="col-sm-4 col-form-label">Item section</label>
                          <div class="col-sm-9">
                            <select class="form-select" name="product">
                              <option>---select option---</option>
                            <?php
                         $query_s=mysqli_query($con,$query_work);
                         while ($row=mysqli_fetch_array($query_s)){                         
                      ?>
                              <option><?php echo $row['dining_name'] ?></option>
                              <?php
                         }
                         ?>
                         </select>
                          </div>
                        </div>
                        </div>
                      </div>
                    </div>
                    <button type="submit" id="btn" class="btn btn-gradient-primary me-2" name="sub">Submit</button>
                  </form>
                 </div>
                </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2023 <a
                href="https://www.bootstrapdash.com/" target="_blank">BootstrapDash</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i
                class="mdi mdi-heart text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></scrip>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="../../assets/vendors/select2/select2.min.js"></script>
  <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <script src="../../assets/js/jquery.cookie.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="../../assets/js/file-upload.js"></script>
  <script src="../../assets/js/typeahead.js"></script>
  <script src="../../assets/js/select2.js"></script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
  <!-- End custom js for this page -->
   <?php
  }else{
    header('Location:../pages/loging.php'); 
  }
   ?>
</body>

</html>