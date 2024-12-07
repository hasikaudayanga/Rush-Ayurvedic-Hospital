<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>

    <script type="text/javascript" src="assets/jsgrid-1.5.3/jsgrid.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
  <script src="assets/script/jsgrid-example.js"></script>
  <script src="assets/bootstrap-5.1.3/js/bootstrap.min.js"></script>

  

    <title>Rush Ayurvedic Hospital</title>
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar" data-bs-offset="70">


    <!-- TOP NAV -->
    <div class="top-nav" id="home">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-auto">
                    <p> <i class='bx bxs-envelope'></i> rushayurvedichospital@gmail.com</p>
                    <p> <i class='bx bxs-phone-call'></i> (+94) 110114455</p>
                </div>
                <!--<div class="col-auto social-icons">
                    <a href="#"><i class='bx bxl-facebook'></i></a>
                    <a href="#"><i class='bx bxl-twitter'></i></a>
                    <a href="#"><i class='bx bxl-instagram'></i></a>
                    <a href="#"><i class='bx bxl-pinterest'></i></a>
                </div>-->
            </div>
        </div>
    </div>

    <!-- BOTTOM NAV -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
        <img src="assets/images/billlogo.png" alt="" style="width: 60px;height: 60px;">
        <div class="container">
            
            <a class="navbar-brand" href="#">Rush Ayurvedic Hospital</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Our Consultations</a>
                    </li>
                </ul>
                <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-brand ms-lg-3">Sign In</a>
            </div>
        </div>
    </nav>

    <!-- SLIDER -->
    <div class="owl-carousel owl-theme hero-slider">
        <div class="slide slide1">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h1 class="display-3 my-4">Embrace Wellness with Traditional Ayurvedic Treatments </h1>
                        <h6 class="text-white text-uppercase" style="margin-bottom: 50px;">Enjoy personalized service tailored to your needs,  <br />ensuring a hassle-free experience.
                        </h6>
                        <a href="#" class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign In</a>
                        <a href="customerRegister.php"  class="btn btn-outline-light ms-3" id="registerButton">Register</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide slide2">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h1 class="display-3 my-4">Experience the Balance of Body, Mind, and Soul with Ayurveda </h1>
                        <h6 class="text-white text-uppercase" style="margin-bottom: 50px;">Dedicated to Your Wellness with Customized <br />Ayurvedic Solutions for Life’s Harmony.
                        </h6>
                        <a href="#" class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#exampleModal">Sign In</a>
                        <a href="customerRegister.php" class="btn btn-outline-light ms-3" id="registerButton">Register</a>
                    </div>
                </div>
            </div>
        </div>
        <!--<div class="slide slide3">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h1 class="display-3 my-4"> Embrace Wellness with Traditional Ayurvedic Treatments</h1>
                        <h6 class="text-white text-uppercase" style="margin-bottom: 50px;">Enjoy personalized service tailored to your needs,  <br />ensuring a hassle-free experience.
                        </h6>
                        <a href="#" class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#exampleModal">Book Now</a>
                        <a href="customerRegister.html" class="btn btn-outline-light ms-3" id="registerButton">Register</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="slide slide4">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center text-white">
                        <h1 class="display-3 my-4">Embrace Wellness with Traditional Ayurvedic Treatments </h1>
                        <h6 class="text-white text-uppercase" style="margin-bottom: 50px;">Enjoy personalized service tailored to your needs,  <br />ensuring a hassle-free experience.
                        </h6>
                        <a href="#" class="btn btn-brand" data-bs-toggle="modal" data-bs-target="#exampleModal">Book Now</a>
                        <a href="customerRegister.html" class="btn btn-outline-light ms-3" id="registerButton">Register</a>
                    </div>
                </div>
            </div>
        </div>-->
    </div>

    <!-- ABOUT -->
    <section id="about" class="about-section" >
        <div class="container">
            <div class="row justify-content-center">
                <h1 style="text-align: center;">About Us</h1>
                <div class="col-lg-5 py-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="info-box">
                                <div class="ms-4">
                                    <h2>Our Story</h2>
                                    <p>Rush Ayurveda Hospital (Pvt) Ltd was established to bring the healing practices of Ayurveda and Hela Wedakama to the world. With over 40 years of experience, our team of doctors is committed to providing care that nurtures the mind, body, and soul.</p>
                                    <p>We combine traditional Ayurvedic knowledge with modern research conducted in our own laboratory, and our facility produces the medicines we use, ensuring high standards in all our treatments.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 mt-4">
                            <div class="info-box">
                                <div class="ms-4">
                                    <h2>Mission</h2>
                                    <p>To promote wellness and holistic healing by combining the ancient wisdom of Ayurveda and Hela Wedakama with modern medical research, providing high-quality treatments and personalized care that enhance the overall health and well-being of our patients.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- MILESTONE -->
    <section id="milestone">
        <div class="container">
            <div class="row text-center justify-content-center gy-4">
                <div class="col-lg-2 col-sm-6">
                    <h1 class="display-4">50K+</h1>
                    <p class="mb-0">Total Appointments</p>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <h1 class="display-4">45k+</h1>
                    <p class="mb-0">Treated Patients</p>
                </div>
                <div class="col-lg-2 col-sm-6">
                    <h1 class="display-4">40Y</h1>
                    <p class="mb-0">Experience</p>
                </div>
                
            </div>
        </div>
    </section>

    <section id="services" class="contact-us">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Contact Us</h1>
                        <p class="mx-auto">Our team provides expert assistance with health inquiries, appointment scheduling, and treatment support promptly and efficiently.</p>
                    </div>
                </div>
            </div>
            <div class="row g-4" style="display: flex; gap: 16px;">
                <div class="col-lg-4 col-md-6" style="flex: 1; background: linear-gradient(to bottom right, #ffffff, #f0f0f0); padding: 20px; border-radius: 15px; box-shadow: 0 8px 16px rgba(0,0,0,0.2); transition: transform 0.3s ease;">
                    <div class="service" style="text-align: center; border: 2px solid #e0e0e0; padding: 15px; border-radius: 10px;">
                        <h5 style="font-size: 24px; color: #333333; margin-bottom: 15px; font-family: 'Arial', sans-serif; text-shadow: 1px 1px 2px rgba(0,0,0,0.1);">You Can Contact Us Via</h5>
                        <p style="font-size: 18px; color: #555; line-height: 1.8; font-family: 'Arial', sans-serif;">
                            Phone: +94 11 23 43 444<br>
                            Email: <a href="mailto:info@example.com" style="color: #007bff; text-decoration: underline; font-weight: bold;">rusharyurvedichospital@gmail.com</a><br>
                            Address: No 96, Nagahawaththa Road, Maharagama
                        </p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6" style="flex: 2; background-color: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0,0,0,0.1);">
                    <div class="service">
                        

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31690.68898275531!2d79.90425884533505!3d6.85025147115005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2507105492fab%3A0x5adc83492aee3910!2sMaharagama!5e0!3m2!1sen!2slk!4v1731857399084!5m2!1sen!2slk" width="100%" height="450" style="border:0;border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>



                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light" id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="intro">
                        <h1>Our Consultations</h1>
                        <p class="mx-auto">Discover authentic Ayurvedic treatments at Rush Ayurveda Hospital in Sri Lanka. Our tailored programs, guided by experienced Ayurvedic physicians, offer a holistic approach to health and wellness, using traditional Sri Lankan medicines and personalized care to support your healing journey.</p>
                    </div>
                </div>
            </div>
        </div>
        <div id="projects-slider" class="owl-theme owl-carousel">
            <div class="project">
                <div class="overlay"></div>
                <img src="img/card1.png" alt="">
                <div class="content">
                    <h2>Wellness</h2>
                    <h6>Personalized guidance from our Ayurvedic experts to enhance your overall health and balance through natural methods and lifestyle changes.</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/card2.png" alt="">
                <div class="content">
                    <h2>Yoga</h2>
                    <h6>Tailored yoga sessions that promote physical, mental, and spiritual well-being, helping you achieve harmony and inner peace.</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/card3.png" alt="">
                <div class="content">
                    <h2>Acupuncture</h2>
                    <h6>A therapeutic approach using fine needles to stimulate specific points, balancing energy flow and relieving pain or stress.</h6>
                </div>
            </div>
            <div class="project">
                <div class="overlay"></div>
                <img src="img/card4.jpg" alt="">
                <div class="content">
                    <h2>Panchakarma</h2>
                    <h6>Comprehensive detoxification treatments to cleanse the body of toxins, rejuvenate the system, and restore balance using ancient Ayurvedic practices.</h6>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-top text-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <h4 class="navbar-brand">Rush Ayurvedic Hospital</h4>
                        <p>© 2024 Rush Ayurvedic Hospital. All Rights Reserved. <br> Promoting wellness and holistic healing through the wisdom of Ayurveda.</p>
                        <p>No 96, Nagahawaththa Road, Maharagama | Phone:  (+94) 110114455 | Email:  rushayurvedichospital@gmail.com</p>
                        <!--<div class="col-auto social-icons">
                            <a href="#"><i class='bx bxl-facebook'></i></a>
                            <a href="#"><i class='bx bxl-twitter'></i></a>
                            <a href="#"><i class='bx bxl-instagram'></i></a>
                            <a href="#"><i class='bx bxl-pinterest'></i></a>
                        </div>-->
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom text-center">
            <p class="mb-0">rushayurvedichospital@2024</p>
        </div>
    </footer>



    <!-- Modal For Customer LogIn-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="modal-body p-0">
                    <div class="container-fluid">
                        <div class="row gy-4">
                            <div class="col-lg-4 col-sm-12 bg-cover"
                                style="background-image: url(img/login.jpg); min-height:300px;">
                                <div>
                                    
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <form class="p-lg-5 col-12 row g-3" method="POST" action="data/login.php">
                                    <div>
                                        <h1>Access To Your Account</h1>
                                        <p>Welcome to our secure login portal. Easily access and manage your account information with 
                                        peace of mind and robust security measures</p>
                                    </div>
                                    <div class="col-12">
                                        <label for="customerEmail" class="form-label">User Name</label>
                                        <input type="text" name="user_name" class="form-control" placeholder="Enter User Name" id="customerEmail"
                                            aria-describedby="emailHelp">
                                    </div>
                                    <div class="col-12">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" placeholder="Enter Password" id="password"
                                            aria-describedby="emailHelp">
                                    </div>
       

                                    <div class="col-6">
                                        <button type="submit" class="btn btn-brand" name="submit">Log In</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="button" class="btn btn-primary" ><a href="customerRegister.php" style="text-decoration:none;">Create New</a></button>
                                    </div>
                                </form>
                                                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/getandShowServices.js"></script>
    <script src="js/loginAndRegister.js"></script> 
 
</body>

</html>