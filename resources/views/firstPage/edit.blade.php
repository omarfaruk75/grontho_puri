@extends('layout.app')

@section('pageTitle',trans('Edit this page'))
@section('pageSubTitle',trans('Update'))

@section('content')
  <!-- // Basic multiple Column Form section start -->
    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    @if(Session::has('response'))
                        {!!Session::get('response')['message']!!}
                    @endif
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.firstPage.update',encryptor('encrypt',$firstPage->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$firstPage->id)}}">
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input type="text" id="category" class="form-control" value="{{ old('category',$firstPage->category)}}" name="category">
                                            @if($errors->has('category'))
                                                <span class="text-danger"> {{ $errors->first('category') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" id="title" class="form-control" value="{{ old('title',$firstPage->title)}}" name="title">
                                            @if($errors->has('title'))
                                                <span class="text-danger"> {{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="logo_img">Logo Image</label>
                                            <input type="file" id="logo_img" class="form-control"
                                                placeholder="logo_img" name="logo_img">
                                                @if($errors->has('logo_img'))
                                                    <span class="text-danger"> {{ $errors->first('logo_img') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="name">Writr Name</label>
                                            <input type="text" id="name" class="form-control" value="{{ old('name',$firstPage->name)}}" name="name">
                                            @if($errors->has('name'))
                                                <span class="text-danger"> {{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image">Article/Poem Image</label>
                                            <input type="file" id="image" class="form-control"
                                                placeholder="Image" name="image">
                                                @if($errors->has('image'))
                                                    <span class="text-danger"> {{ $errors->first('image') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="short_text">Detail Text</label>
                                            <textarea type="short_text" id="short_text" class="form-control" value="{{ old('short_text',$firstPage->short_text)}}" name="short_text" cols="30" rows="15"></textarea>
                                            
                                            @if($errors->has('short_text'))
                                                <span class="text-danger"> {{ $errors->first('short_text') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="text">Detail Text</label>
                                            <textarea type="text" id="text" class="form-control" value="{{ old('text',$firstPage->text)}}" name="text" cols="30" rows="15"></textarea>
                                            
                                            @if($errors->has('text'))
                                                <span class="text-danger"> {{ $errors->first('text') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <span>logo Image</span><img width="30px" src="{{asset('uploads/firstPage/logo_img/'.$firstPage->logo_img)}}" alt="logo_img" class="mx-4">
                                        <span>Article/Poem Image</span><img width="60px" height="50px" src="{{asset('uploads/firstPage/image/'.$firstPage->image)}}" alt="image" class="mx-4">
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
