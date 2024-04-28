<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Neptune - Responsive Admin Dashboard Template</title>

     <!-- Styles -->
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap"
    rel="stylesheet">
  <link
    href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp"
    rel="stylesheet">
  <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/pace/pace.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins/highlight/styles/github-gist.css') }}" rel="stylesheet">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


  <!-- Theme Styles -->
  <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/main_tamu.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">

  <link rel="icon" type="image/jpg" sizes="32x32" href="{{ asset('assets/images/logo.jpg') }}" />
  <link rel="icon" type="image/jpg" sizes="16x16" href="{{ asset('assets/images/logo.jpg') }}" />
</head>

<body>
    <div class="app menu-off-canvas align-content-stretch d-flex flex-wrap">
        <div class="app-container">

                                <div class="example-container">
                                    <div class="example-content">
                                        <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                            <div class="carousel-indicators">
                                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-label="Slide 1" aria-current="true"></button>
                                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2" class=""></button>
                                                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3" class=""></button>
                                            </div>
                                            <div class="carousel-inner">
                                                <div class="carousel-item active" data-bs-interval="10000">
                                                    <svg class="placeholder-img placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: First slide" preserveaspectratio="xMidYMid slice" focusable="false">
                                                        <title>Placeholder</title>
                                                        <rect width="100%" height="100%" fill="#f5f5f5"></rect><text x="50%" y="50%" fill="#aaa" dy=".3em">First slide</text>
                                                    </svg>
                                        
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5>First slide label</h5>
                                                        <p>Some representative placeholder content for the first slide.</p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item" data-bs-interval="2000">
                                                    <svg class="placeholder-img placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Second slide" preserveaspectratio="xMidYMid slice" focusable="false">
                                                        <title>Placeholder</title>
                                                        <rect width="100%" height="100%" fill="#eee"></rect><text x="50%" y="50%" fill="#bbb" dy=".3em">Second slide</text>
                                                    </svg>
                                        
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5>Second slide label</h5>
                                                        <p>Some representative placeholder content for the second slide.</p>
                                                    </div>
                                                </div>
                                                <div class="carousel-item">
                                                    <svg class="placeholder-img placeholder-img-lg d-block w-100" width="800" height="400" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Third slide" preserveaspectratio="xMidYMid slice" focusable="false">
                                                        <title>Placeholder</title>
                                                        <rect width="100%" height="100%" fill="#e5e5e5"></rect><text x="50%" y="50%" fill="#999" dy=".3em">Third slide</text>
                                                    </svg>
                                        
                                                    <div class="carousel-caption d-none d-md-block">
                                                        <h5>Third slide label</h5>
                                                        <p>Some representative placeholder content for the third slide.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>
                  
            
        </div>
    </div>

    <!-- Javascripts -->
    
    <script src="{{ asset('assets/plugins/jquery/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfectscroll/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/highlight/highlight.pack.js') }}"></script>

    <script src="{{ asset('assets/js/main.min.js') }}"></script>
    <script src="{{ asset('assets/js/main_tammu.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/pages/dashboard.js') }}"></script>
</body>

</html>