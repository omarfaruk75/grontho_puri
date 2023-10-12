<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grantho-Puri | @yield('siteTitle', 'Dashboard')</title>
    <!-- Style Css Link -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">


    <!-- Bootstrap CDN Link -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
@stack('styles') 
</head>

<body>
    <!--Start Logo-Part -->
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-md-6 col-lg-8 logo_style ">
                <img src="{{asset('assets/frontend/images/logo.jpeg')}}" class="p-2 bg-light" alt="logo">
                <div class="website_name p-2">
                    <h3 mb-0 mt-1>Grantho-Puri</h3>
                    <p> Grantho-Puri </p>
                </div>
            </div>
            <div class="col-sm-4  col-md-6 col-lg-4 header_view p-1 mt-4">
                <span>0.00 k </span><i class=" fa fa-eye" aria-hidden="true"> </i>
            </div>
        </div>
    </div>
    <!-- End Logo-Part -->
    <!--Start Menu-Part -->
    <nav
        class="navbar navbar-expand-md  justify-content-center col-sm-12 col-md-12 col-lg-12 shadow-sm  bg-white rounded navbar-light bg-light">
        <div class="container">
            <button class="navbar-toggler text-white" type="button" data-bs-toggle="collapse" data-bs-target="#btn">

                <span class="navbar-toggler-icon"></span>
            </button>
            <div class=" collapse navbar-collapse " id="btn">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item px-3"><a href="index" class="nav-link text-dark">Home</a></li>
                    <li class="nav-item px-3"><a href="#" class="nav-link text-dark">Book Review</a></li>
                    <li class="nav-item px-3"><a href="#" class="nav-link text-dark">Film</a></li>
                    <li class="nav-item px-3"><a href="#" class="nav-link text-dark">Art</a></li>
                    <li class="nav-item px-3"><a href="about" class="nav-link text-dark">About Us</a></li>

                </ul>
            </div>

        </div>
    </nav>
    <!--End Menu-Part -->

@yield('content')

    <div class="footer">
        <div class="container">
            <div class="row text-light">

                <div class="col-2 col-sm-2 col-md-2 col-lg-2 footer-icon ">
                    <span><i class=" fa-solid fa-location-dot mb-3 mt-3"></i> </span>
                    <br>
                    <span><i class=" fa-solid fa-phone pt-3 mt-3 "></i> </span>
                    <br>
                    <span><i class="fa-solid fa-envelope pt-3 mt-3"></i></span>
                </div>
                <div class="col-10 col-sm-10 col-md-4 co-lg-4  mt-4 mb-4 address-text">
                    <h4 class="m-auto mb-4 ">Webpage Name Here</h4>
                    <p><span> ট্র্যাভেলেক্স, 109,স্যানমার
                            স্প্রীং
                            গার্ডেন(১ম
                            তলা),
                            ৬৪, জামাল খান রোড,চট্টগ্রাম</span></p>


                    <p><span class="p-2">০৩১-২৮৫২৮৬৬,০১৭১৬১৫৯৫৯৬,
                            ০১৯৭৬১৫৯৫৯৬,০১৯৭৬১৫৯৫৯৮,
                            ০১৯৭৬১৫৯৫৯৯
                        </span></p>
                    <p>
                        <span class="p-2">bohemian_2425@yahoo.com</span>
                    </p>

                </div>

                <div class="col-sm-4 col-md-2 col-lg-2  mt-4 mb-5 information">
                    <h4>তথ্য</h4>
                    <p class="mt-4">পরিচিতি</p>
                    <p>Policy</p>
                    <p>Term and Condition</p>
                </div>
                <div class="col-sm-6 col-md-3 col-lg-3  mt-5  search_btn">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control ms-3" placeholder="Enter Your Email" aria-label=""
                            aria-describedby="basic-addon2">
                        <div class="input-group-append ">
                            <button class="btn btn-outline-info button_design text-white"
                                type="button">Subscribe</button>
                        </div>
                    </div>
                    <div class="google_app_icon">
                        <a title=" কবিতা"
                            href="https://play.google.com/store/apps/details?id=bd.com.sohelmahroof.choto_golpo"
                            target="_blank"> <img src="{{asset('assets/frontend/images/google-play-3d-rendering-icon_578229-292.avif')}}"
                                class="w-25" alt="">  কবিতা
                        </a></span>

                        <a title=" ছড়া"
                            href="https://play.google.com/store/apps/details?id=bd.com.sohelmahroof.choto_golpo"
                            target="_blank"> <img src="{{asset('assets/frontend/images/google-play-3d-rendering-icon_578229-292.avif')}}"
                                class="w-25" alt="">
                              ছড়া </a>

                    </div>
                </div>
                <div class="col-sm-2 col-md-1 col-lg-1 "></div>
            </div>
        </div>
    </div>
</body>
@stack('scripts')
<!-- Bootstrap Cdn js link -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>


</html>