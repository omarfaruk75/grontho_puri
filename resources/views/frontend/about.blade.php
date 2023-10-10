@extends('frontend.app')
@section('content')   
    <!--Start Main Image 01-->
    <div class="container-fluid ">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 p-0 m-0 about_us">
                <h4 class="ps-5">About Us</h4>
                <img src="{{asset('assets/frontend/images/Rectangle 11.png')}}" class="img-fluid w-100 " alt="">
            </div>
            <div class="col-12"></div>
        </div>
    </div>
    <div class="container ">
        <div class="row ">
            <div class=" col-sm-12  col-lg-12 responsive_view w-25">
                <div class="post px-0">
                    <h4>Post</h4>
                    <h1>26</h1>
                </div>
                <div class="  view px-2 mx-1">
                    <h4>View</h4>
                    <h1>26</h1>
                </div>
                <div class="share">
                    <h4>Share</h4>
                    <h1>26</h1>
                </div>
            </div>
        </div>
    </div>

    <!-- End Main Image -->

    <!-- Start Text Content -->

    <div class="container">
        <div class="row main_content">
            <div class="col-sm-12 col-lg-6 ">
                <h3>Your global source fortrusted,<br>enlightening news. </h3>
            </div>
            <div class="col-sm-12 col-lg-6 text-muted">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate quos, exercitationem
                    repellendus
                    ducimus dignissimos
                    libero vitae? Possimus numquam minus ipsam aspernatur cupiditate? </p>
            </div>
        </div>
    </div>
    <!-- End Text Content -->

    <!-- Start Collage Image -->
    <div class="container-fluid mb-5  ">
        <div class="row  ">
            <div class="col-sm-6 col-md-6  image-collage-1  ">
                <img src="{{asset('assets/frontend/images/Rectangle 13.png')}}" class="img-fluid w-100  " alt="">
                <div class=" image-content-1 text-white">
                    <a href="#" class="border border-white text-white ">Business</a>
                    <h3 class="my-1">Lorem ipsum lorem ipsum lorum</h3>
                    <span> Golam Sorwar </span>|<span> Feb 17 </span>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 ">
                <div class="pb-1 image-collage-2 ">
                    <img src="{{asset('assets/frontend/images/Rectangle 14.png')}}" class=" img-fluid w-100   image-collage-2_1 " alt="">
                    <div class="image-content-2 text-black">
                        <a href="#" class="border border-dark">Art</a>
                        <h5 class="my-0">Lorem ipsum lorem ipsum </h5>
                        <span> Golam Sorwar </span>|<span> Feb 17 </span>
                    </div>
                </div>
                <div class="row me-0  image_3-4">
                    <div class="col-sm-12 col-md-6 col-lg-6 pe-0 image-collage-3">
                        <img src="{{asset('assets/frontend/images/Rectangle 15.png')}}" class="img-fluid w-100 " alt="">
                        <div class="image-content-3  text-white">
                            <a href="#" class="border border-white">Art</a>
                            <h6>Lorem ipsum lorem ipsum</h6>
                            <span> Golam Sorwar </span>|<span> Feb 17 </span>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6 col-lg-6 pe-0 image-collage-4 ">
                        <img src="{{asset('assets/frontend/images/Rectangle 16.png')}}" class="img-fluid w-100 " alt="">
                        <div class="image-content-4  text-black">
                            <a href="#" class="border border-dark">Art</a>
                            <h6>Lorem ipsum lorem ipsum</h6>
                            <span> Golam Sorwar </span>|<span> Feb 17 </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Collage Image -->

    <!-- Start Text & Collage Image -->
    <div class="container-fluid  mb-5">
        <div class="row mx-1 mission">
            <div class="col-sm-4 col-md-1 col-lg-1 box "></div>
            <div class="col-sm-7 col-md-10 col-lg-10 mt-5">
                <h3>Our Mission</h3>
                <div class="row">
                    <div class="col-sm-6 col-md-6 col-lg-6  mission_content m-0 p-0">
                        <p class="text-muted ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt
                            sint debitis excepturi
                            mollitia non enim vero maiores magnam, rem ad.</p>

                        <input type="button" class="bg-dark text-white  p-1 " value="View More">
                    </div>

                    <div class="col-sm-6 col-md-3 col-lg-3 mt-3 ">
                        <img src="{{asset('assets/frontend/images/Rectangle 18.png')}}" class="img-fluid w-100 mt-1" alt="">
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 mt-3  ">
                        <img src="{{asset('assets/frontend/images/Rectangle 19.png')}}" class="img-fluid w-100 m-1 mb-3" alt="">
                        <img src="{{asset('assets/frontend/images/Rectangle 20.png')}}" class="img-fluid w-100 m-1" alt="">
                    </div>
                </div>
            </div>
            <div class=" col-sm-1 col-md-1 col-lg-1 box "></div>
        </div>
    </div>
    @endsection('content')