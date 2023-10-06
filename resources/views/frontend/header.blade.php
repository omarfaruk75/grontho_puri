@extends('frontend.app')
@section('content')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website name here</title>
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
                    <h3 mb-0 mt-1>Website Name Here</h3>
                    <p> website name here </p>
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
    @endsection('content')
   
