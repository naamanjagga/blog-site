<?php include 'backend.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Document</title>
</head>

<body>
    <div class="container-fluid bg-light">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <h3 class="navbar-brand mx-5" style="font-size:xx-large;">Blog Dil Se</h3>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="nav-link px-3" aria-current="page" href="blog_home.php">Home</a>
                            <a class="nav-link active px-3" aria-current="page" href="blog.php">Feed</a>
                            <a class="nav-link px-3" href="myblog.php">My Blogs</a>
                            <a class="nav-link px-3" href="writeblog.php">Write Blog</a>
                        </div>
                    </div>
                    <form class="d-flex">
                        <button class="btn btn-lg bg-primary text-white rounded-pill mx-5 " type="submit">LogOut</button>
                    </form>
                </div>
            </nav>
        </div>
    </div>
    <div class="container-fluid pt-2 pb -2 border border-top-0 bg-dark">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <input type="text" class="bg-dark text-light border-light" style="border-radius: 10px; padding:5px 10px;" placeholder="Search" aria-label="Username" aria-describedby="basic-addon1">

                <!-- Col-mdlapsible wrapper -->
                <div class="navbab" id="navbarRightAlignExample">
                    <!-- Left links -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Navbar dropdown -->
                        <li class="nav-item dropdown px-3">
                            <i class="fa fa-twitter text-muted fa-2x" aria-hidden="true"></i>
                        </li>
                        <li class="nav-item dropdown px-3">
                            <i class="fa fa-instagram text-muted fa-2x" aria-hidden="true"></i>
                        </li>
                        <li class="nav-item dropdown px-3">
                            <i class="fa fa-youtube text-muted fa-2x" aria-hidden="true"></i>
                        </li>
                        <li class="nav-item dropdown px-3">
                            <i class="fa fa-whatsapp text-muted fa-2x" aria-hidden="true"></i>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    </div>
          
    <div class="container mt-5 pt-5">
        <form action="backend.php" method="POST">
        <div class="form-group">
                <label for="exampleFormControlInput1">Id</label>
                <input type="text" disabled value=" <?php echo $_SESSION['blog_id']?>" name="edit_id" class="form-control">
            </div>
        <div class="form-group">
                <label for="exampleFormControlInput1">Image</label>
                <input type="file" name="edit_image" class="form-control">
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Heading</label>
                <input type="text" name="edit_heading" value=" <?php echo $_SESSION['blog_heading']?>" class="form-control">
            </div>
           
            <div class="form-group">
                <label for="exampleFormControlInput1">Content</label>
              
                <textarea type="number" name="edit_content" value=" <?php echo $_SESSION['blog_content']?>" class="form-control"  ><?php echo $_SESSION['blog_content']?></textarea>
            </div><br>
            <div>
                <button name="edit_userblog" type="submit" class="btn btn-primary">
                    Edit Blog
                </button>
            </div>
        </form>
    </div>
    <footer class="text-center mt-5 text-lg-start bg-light text-muted">
        <!-- Section: Social media -->
        <section class="bg-primary">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-6">
                    <div class="ratio ratio-16x9">
                        <iframe class="shadow-1-strong rounded" src="https://www.youtube.com/embed/vlDzYIIOYmM" title="YouTube video" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </section>
        <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
            <!-- Left -->
            <div class="me-5 d-none d-lg-block">
                <span>Get connected with us on social networks:</span>
            </div>
            <!-- Left -->

            <!-- Right -->
            <div>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-google"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-linkedin"></i>
                </a>
                <a href="" class="me-4 text-reset">
                    <i class="fab fa-github"></i>
                </a>
            </div>
            <!-- Right -->
        </section>
        <!-- Section: Social media -->

        <!-- Section: Links  -->
        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            <i class="fas fa-gem me-3"></i>BLOG DIL SE
                        </h6>
                        <p>
                            Here you can use rows and columns to organize your footer content. Lorem ipsum
                            dolor sit amet, consectetur adipisicing elit.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Products
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Angular</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">React</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Vue</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Laravel</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Useful links
                        </h6>
                        <p>
                            <a href="#!" class="text-reset">Pricing</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Settings</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Orders</a>
                        </p>
                        <p>
                            <a href="#!" class="text-reset">Help</a>
                        </p>
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold mb-4">
                            Contact
                        </h6>
                        <p><i class="fas fa-home me-3"></i> New York, NY 10012, US</p>
                        <p>
                            <i class="fas fa-envelope me-3"></i>
                            info@example.com
                        </p>
                        <p><i class="fas fa-phone me-3"></i> + 01 234 567 88</p>
                        <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!-- Grid row -->
            </div>
        </section>
        <!-- Section: Links  -->

        <!-- Copyright -->
        <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2021 Copyright:
            <a class="text-reset fw-bold" href="https://mdbootstrap.com/">NAMAN JAGGA</a>
        </div>
        <!-- Copyright -->
    </footer>

</body>

</html>