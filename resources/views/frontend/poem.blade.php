@extends('frontend.app')
@section('content')

    <div class="container-fluid  mb-5">
        <div class="row mx-1">
            <div class="col-sm-2 col-md-2 col-lg-2 box ">
            </div>
            <div class="col-sm-8 col-md-8 col-lg-8 ">
                <div class="row mt-3">
                    <div class="col-sm-12 col-md-12 col-lg-12  ">
                        <div class=" poem_title">

                            <h5 class="text-primary m-auto">{{$firstPage->category}}</h5>
                            <h4 class="mt-2 fw-bold">
                            {{$firstPage->title}}
                            </h4>
                            <div class="mb-2">
                            <img class="image_icon" src="{{asset('uploads/userimg/'.$firstPage->user?->image)}}" onerror="this.onerror=null;this.src='{{ asset('assets/images/logo/default.jpeg')}}';" > 
                            <span class="ms-2 image_icon_text ">{{$firstPage->user?->name}}</span> | <span class="image_icon_text"> {{$firstPage->created_at->diffForHumans()}}</span>
                            </div>
                            <img src="{{asset('uploads/firstPage/image/'.$firstPage->image)}}" class="w-100 " alt="">
                            <hr>

                            <h3> <i class="fa-solid fa-circle fs-5"></i> {{$firstPage->heading}}</h3>
                            <hr>
                            <p>{{$firstPage->short_text}}</p>
                            <p>{{$firstPage->text}}</p>
                            
                            <div class=" mb-5">
                                <button type="button" class="btn btn-outline-primary mx-2">কবিতা</button>
                                <button type="button" class="btn btn-outline-primary mx-2">কবিতা</button>
                                <button type="button" class="btn btn-outline-primary mx-2">কবিতা</button>
                               
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-md-6 col-lg-6">
                                    <h4>comment</h4>
                                </div>
                                <div class="col-sm-12 col-md-6 col-lg-6  ">
                                    <ul class="d-flex justify-content-end ">
                                        <li class="px-3"> <a href="{{$link->facebook}}"><i class="fa-brands fa-facebook"></i></a> </li>
                                        <li class="px-3"> <a href="{{$link->twitter}}"><i class="fa-brands fa-twitter"></i></a> </li>
                                        <li class="px-3"> <a href="{{$link->share}}"><i class="fa-solid fa-share-nodes"></i></a> </li>
                                        <li class="px-3"><a href="{{$link->save}}"><i class="fa-solid fa-bookmark"></i></a> </li>
                                       
                                            
                                    </ul>
                                </div>
                            </div>
                            <hr>
                            <div class="row mb-3">
                                <div class="col-2">
                                    <img src="{{asset('assets/frontend/images/Rectangle 14.png')}}" class="ad_img_icon " alt="">
                                </div>
                                <div class="col-10 ">
                                    <label for="exampleFormControlTextarea1" class="form-label"></label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1"
                                        placeholder="Share Your Thoughts" rows="1">
                                    </textarea>

                                    <div class="d-flex justify-content-end"> 
                                        <button type="submit" class="btn btn-primary px-5  mt-2"> Comment</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class=" col-sm-2 col-md-2 col-lg-2 box "></div>
        </div>
    </div>

@endsection