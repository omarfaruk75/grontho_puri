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
                                        <label for="category">Category</label>
                                        <select class="form-select" aria-label="Default select example" name="category">
                                            <option selected>Select Category</option>
                                            <option value="Poem" {{ $firstPage->category=='Poem'?'selected':''}}>Poem</option>
                                            <option value="Book Review" {{ $firstPage->category=='Book Review'?'selected':''}}>Book Review</option>
                                            <option value="Film" {{ $firstPage->category=='Film'?'selected':''}}>Film</option>
                                            <option value="Art" {{ $firstPage->category=='Art'?'selected':''}}>Art</option>
                                        </select>
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
                                            <label for="heading">Headline</label>
                                            <input type="text" id="name" class="form-control" value="{{ old('heading',$firstPage->heading)}}" name="heading">
                                            @if($errors->has('heading'))
                                                <span class="text-danger"> {{ $errors->first('heading') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="short_text">Short Text</label>
                                            <textarea type="short_text" id="short_text" class="form-control" value="{{ old('short_text',$firstPage->short_text)}}" name="short_text" cols="30" rows="5">{{$firstPage->short_text}}</textarea>
                                            @if($errors->has('short_text'))
                                                <span class="text-danger"> {{ $errors->first('short_text') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="text">Details Text</label>
                                            <textarea type="text" id="text" class="form-control" value="{{ old('text',$firstPage->text)}}" name="text" cols="30" rows="15">{{$firstPage->text}}</textarea>
                                            
                                            @if($errors->has('text'))
                                                <span class="text-danger"> {{ $errors->first('text') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                
                                <div class="row">
                                    <div class="col-12">
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
