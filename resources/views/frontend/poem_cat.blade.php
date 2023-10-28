@extends('frontend.app')
@section('content')   
    <!--End Menu-Part -->
    <div class="container">
        <div class="row">
            <div class="col-2 col-sm-2.col-md-2 box"></div>
            <div class="col-8 col-sm-8.col-md-8">
                <h3 class="text-danger mt-5 mb-3">Poem</h3>
                @forelse ($firstPage as $fs)
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                            <img src="{{asset('uploads/firstPage/image/'.$fs->image)}}" class="img-fluid w-100 mb-3" alt="">
                        </div>
                        <div class="col-12 col-sm-12 col-md-6">
                            <div class="row">
                                <div class=" col-2 col-sm-2">
                                    <img class="ad_img_1" src="{{asset('uploads/userimg/'.$fs->user?->image)}}" onerror="this.onerror=null;this.src='{{ asset('assets/images/logo/default.jpeg')}}';"  >
                                </div>
                                <div class="col-10 col-sm-10 "> 
                                    <h6 class="mb-0 ms-1 fw-bold">{{$fs->user?->name}}</h6>
                                    <p class="mt-0 ms-1 ad-img-2_text-cat">{{$fs->category}}, <span class="ms-2">{{$fs->created_at->diffForHumans()}}</span></p>
                                </div>
                            </div>
                            <div class="col-12">
                                    <p class="mb-5 ad_img_3_text">{{$fs->short_text}}....<b><a href="{{route('single_page',$fs->id)}}" class="text-decoration-none ms-2">Read More</a></b> </p>
                            </div>
                        </div>
                    </div>
                @empty
                    <div>NO Data Found</div>
                @endforelse
                <div>{{$firstPage->links()}}</div>
            </div>
            <div class="col-2 col-sm-2.col-md-2 box"></div>
        </div>

    </div>
    <!-- End media -->
    <div class="container d-lg-flex justify-content-center mt-5">
        <div class="row g-3">
        @forelse($homeCard as $hc)
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <img src="{{asset('uploads/home_page/home_card/image/'.$hc->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">{{$hc->title}}</h6>
                        <p>12 hours ago</p>
                    </div>
                </div>
            </div>
        @empty
        <div>data not found</div>
        @endforelse
        </div>
    </div>
@endsection
