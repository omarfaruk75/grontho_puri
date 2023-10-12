@extends('frontend.app')
@section('content')
    <!--  Start Main Home Body -->
    <div class="container main_body">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-8  ps-5 main_home_image">
                <img src="{{asset('uploads/home_page/header_card/image/'.$headerCard->image)}}" class="img-fluid w-100" alt="">
                <div class="container mt-5 ">
                    <div class="row div_design ">
                   
                        <div class="col-sm-flex col-md-12 col-lg-12 ">
                            <div class="card" style="width: 18rem;">
                                <div class="card-body">
                                    <h5 class="card-title"><img src="{{asset('assets/frontend/images/Rectangle 14.png')}}" class="ad_img_1" alt=""> Smith Holder . 1 
                                        hour</h5>

                                    <h4 class="card-text pt-3 mb-3">{{$headerCard->title}}
                                    </h4>
                                    <p>{{$headerCard->short_details}}<b><a href="#" class="text-decoration-none">See More</a></b></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 ">
                <div class="row 4image_text">
                    @forelse($header as $h)
                    <div class="col-6 col-sm-6 col-md-4 col-lg-4 main_body_image">
                        <div><img src="{{asset('uploads/home_page/header_article/image/'.$h->image)}}" class=" img-fluid w-100  mt-3 mb-4" alt=""></div>
                    </div>
                    <div class="col-6 col-sm-6 col-md-8 col-lg-8">
                        <div class="mt-2 mb-4 text_image_home">
                            <div><img src="{{asset('assets/frontend/images/Rectangle 14.png')}}" class="ad_img_1" alt=""><span
                                    class="fs-5 fw-3 ps-1"> Jhon
                                    Smith
                                </span> . 1 hour</div>
                            <h6 class="mt-1">{{$h->title}}</h6>
                            <span class="fs-5 text-danger">Business </span>. 1
                            hour
                        </div>
                    </div>
                    @empty
                    <div>No Data Found</div>
                    |@endforelse
                </div>
            </div>
        </div>
    </div>

    <!--  End Main Home Body -->
    <!-- Start Advertisement Section -->
    <div class="container  advertimernt_body ">
        <div class="row"> 
            <div class=" col-sm-2 col-md-2 col-lg-2 advertisement"></div>

            <div class="col-sm-8 col-md-8 col-lg-8 ">
            @forelse($homeArticle as $h)
                <div class="row">
                    <div class="col-2 col-sm-2 col-md-1"><img src="{{asset('assets/frontend/images/Rectangle 14.png')}}" class="ad_img_2" alt="">
                    </div>
                    <div class="col-10 col-sm-10 col-md-11"><span class=" fs-4 fw-2 ps-2"> Smith
                            Holder</span>
                        <p class="ps-2">{{$h->category}}. 1 hour</p>
                    </div>
                    <div class="col-12">
                        <p>{{$h->short_details}}<b><a href="#" class="text-decoration-none">See More</a></b> </p>
                    </div>
                    <hr>
                </div>
            @empty
               <div>data not found</div>
            @endforelse  
            </div>
            <div class="col-md-2 col-lg-2 advertisement"></div>
        </div>
    </div>
    <!-- End Advertisement Section -->
    <!-- Start media -->
    <div class="container  my-5">
        <div class="row">
            <div class="d-flex justify-content-center button_body">
                <a href="poem_cat" class="button_design text-muted active me-1 pb-1 ">Poem</a>
                <a href="#" class="button_design text-muted mx-1 pb-1  ">Short Story</a>
                <a href="#" class="button_design text-muted mx-1 pb-1  ">Video</a>
                <a href="#" class="button_design text-muted ms-1 pb-1  ">Gallery</a>
            </div>
        </div>
    </div>
    <!-- End media -->
    <div class="container d-lg-flex justify-content-center mb-5">
        <div class="row g-3">
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <img src="{{asset('assets/frontend/images/Rectangle 41.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Your global source for trusted, enlightening news.</h6>
                        <p>12 hours ago</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <img src="{{asset('assets/frontend/images/Rectangle 42.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Your global source for trusted, enlightening news.</h6>
                        <p>12 hours ago</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <img src="{{asset('assets/frontend/images/Rectangle 43.png')}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Your global source for trusted, enlightening news.</h6>
                        <p>12 hours ago</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection('content')