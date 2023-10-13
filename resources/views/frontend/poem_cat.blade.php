@extends('frontend.app')
@section('content')   
    <!--End Menu-Part -->
    <div class="container">
        <div class="row">
            <div class="col-2 col-sm-2.col-md-2 box"></div>
            <div class="col-8 col-sm-8.col-md-8">
                <h3 class="text-danger mt-5 mb-3">Poem</h3>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                        <img src="{{asset('assets/frontend/images/Rectangle 13.png')}}" class="img-fluid w-100 mb-3" alt="">
                        <img src="{{asset('assets/frontend/images/Rectangle 13.png')}}" class="img-fluid w-100" alt="">
                    </div>
                    <div class="col-12 col-sm-12 col-md-6">
                        <img src="{{asset('assets/frontend/images/Rectangle 14.png')}}" class="ad_img_2" alt=""><span
                            class="ms-2 fs-3 mb-0 fw-2 ">Smith
                            Holder</span>
                        <p class="ms-5 ps-1 "> Poem . 1 hour</p>

                        <p class="mb-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat minus eum
                            facere minima vel
                            commodi consequuntur, aliquam magni quia provident...... <b><a href="{{route('poem')}}" class="text-decoration-none">Read More</a></b> </p>
                        <img src="{{asset('assets/frontend/images/Rectangle 14.png')}}" class="ad_img_2" alt=""><span
                            class="ms-2 fs-3 mb-0 fw-2 ">Smith
                            Holder</span>
                        <p class="ms-5 ps-1 "> Poem . 1 hour</p>

                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Placeat minus eum
                            facere minima vel
                            commodi consequuntur, aliquam magni quia provident...... <b><a href="{{route('poem')}}" class="text-decoration-none" >Read More</a></b> </p>
                    </div>
                </div>

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
