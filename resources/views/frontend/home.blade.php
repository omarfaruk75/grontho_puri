@extends('frontend.app')
@section('content')
    <!--  Start Main Home Body -->
    <div class="container main_body my-3">
        <div class="row">
            <div class="col-sm-6 col-md-4 col-lg-8  ps-5 main_home_image">
                <img src="{{asset('uploads/home_page/header_card/image/'.$headerCard?->image)}}" class="img-fluid w-100" alt="">
                <div class="container mt-5 ">
                    <div class="row div_design">            
                        <div class="col-sm-flex col-md-12 col-lg-12 ">
                            <div class="card shadow" style="width: 18rem;">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <img class="ad_img_1 mt-1" src="{{asset('uploads/userimg/'.$headerCard?->user?->image)}}" onerror="this.onerror=null;this.src='{{ asset('assets/images/logo/default.jpeg')}}';" > 
                                        </div>
                                        <div class="col-sm-10 ps-3">
                                            <h5 class="card-title mb-0 mt-0 fw-bold"> {{$headerCard?->user?->name}} </h5>
                                            <p class="mt-0 text_p">{{$headerCard?->created_at->diffForHumans()}}</p>
                                        </div>
                                     </div>
                                
                                    <h4 class="card-text mt-0  mb-3 my-2 text-para-1"><?= $headerCard?->{'title_'.session()->get('locale')}?>
                                    </h4>
                                    <p class="text-para-2">{{$headerCard?->short_details}}<b><a href="#" class="text-decoration-none ms-1"> See More</a></b></p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 ">
                <div class="row">
                    @forelse($header as $h)
                        <div class="col-6 col-sm-6 col-md-4 col-lg-4 ">
                            <div><img src="{{asset('uploads/home_page/header_article/image/'.$h->image)}}" class=" img-fluid w-100  mt-3 mb-4" alt=""></div>
                        </div>
                        <div class="col-6 col-sm-6 col-md-8 col-lg-8 mt-3">
                            <div class="d-flex">
                                <img class="ad_img_2" src="{{asset('uploads/userimg/'.$h->user?->image)}}" onerror="this.onerror=null;this.src='{{ asset('assets/images/logo/default.jpeg')}}';">
                                <h5 class="fs-6 fw-3 ps-2 ad-img-2_text">{{$h->user?->name}} </h5> 
                            </div>
                                <h6 class="mt-1 text-para-2">{{$h->title}}</h6>
                                  <span class="ad-img-2_text-cat ">{{$h->category}} ,</span> <span class=" ms-3 ad-img-2_text-time ">{{$h->created_at->diffForHumans()}}</span>
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
                    <div class="col-2 col-sm-2 col-md-1"><img class="ad_img_3" src="{{asset('uploads/userimg/'.$h->user?->image)}}" onerror="this.onerror=null;this.src='{{ asset('assets/images/logo/default.jpeg')}}';">
                    </div>
                    <div class="col-10 col-sm-10 col-md-11"><h5 class=" ms-4 mb-0 mt-0 fw-bold"> {{$h->user?->name}}</h5>
                        <p class="ms-4">{{$h->category}}, <span class="ms-1 text_p">{{$h->created_at->diffForHumans()}}</span></p>
                    </div>
                    <div class="col-12">
                        <p class="ad_img_3_text">{{$h->short_details}}<b><a href="#" class="text-decoration-none">See More</a></b> </p>
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
                <a href="{{route('poem_cat')}}" class="button_design text-muted active me-1 pb-1 ">Poem</a>
                <a href="{{route('poem_cat')}}" class="button_design text-muted mx-1 pb-1  ">Book Review</a>
                <a href="{{route('poem_cat')}}" class="button_design text-muted mx-1 pb-1  ">Film</a>
                <a href="{{route('poem_cat')}}" class="button_design text-muted ms-1 pb-1  ">Art</a>
            </div>
        </div>
    </div>
    <!-- End media -->
    <div class="container d-lg-flex justify-content-center mb-5">  
        <div class="row g-3">
        @forelse($homeCard as $hc)
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <img src="{{asset('uploads/home_page/home_card/image/'.$hc->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">{{$hc->title}}</h6>
                        <p>{{$hc->created_at->diffForHumans()}}</p>
                    </div>
                </div>
            </div>
        @empty
        <div>data not found</div>
        @endforelse
        </div>
    </div>
@endsection