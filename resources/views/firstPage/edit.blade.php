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
                                        <label for="category">{{__('Category')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="category">
                                            <option selected>Select Category</option>
                                            <option value="Poem" {{ $firstPage->category=='Poem'?'selected':''}}>Poem</option>
                                            <option value="Book Review" {{ $firstPage->category=='Book Review'?'selected':''}}>Book Review</option>
                                            <option value="Film" {{ $firstPage->category=='Film'?'selected':''}}>Film</option>
                                            <option value="Art" {{ $firstPage->category=='Art'?'selected':''}}>Art</option>
                                        </select>
                                    </div>
                                   <div class="col-md-6 col-12">
                                        <label for="category_bn">{{__('Category_BN')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="category_bn">
                                            <option selected>শ্রেনী নির্ধারণ করুন</option>
                                            <option value="কবিতা" {{ $firstPage->category=='কবিতা'?'selected':''}}>কবিতা</option>
                                            <option value="বই পুনঃমূল্যায়ন " {{$firstPage->category=='বই পুনঃমূল্যায়ন '?'selected':''}}>বই পুনঃমূল্যায়ন </option>
                                            <option value="ছবি" {{ $firstPage->category=='ছবি'?'selected':''}}>ছবি</option>
                                            <option value="শিল্প" {{ $firstPage->category=='শিল্প'?'selected':''}}>শিল্প</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">{{__('Title')}}</label>
                                            <input type="text" id="title" class="form-control" value="{{ old('title',$firstPage->title)}}" name="title">
                                            @if($errors->has('title'))
                                                <span class="text-danger"> {{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title_bn">{{__('Title_BN')}}</label>
                                            <input type="text" id="title_bn" class="form-control" value="{{ old('title_bn',$firstPage->title_bn)}}" name="title_bn">
                                            @if($errors->has('title_bn'))
                                                <span class="text-danger"> {{ $errors->first('title_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image">{{__('Image')}}</label>
                                            <input type="file" id="image" class="form-control"
                                                placeholder="Image" name="image">
                                                @if($errors->has('image'))
                                                    <span class="text-danger"> {{ $errors->first('image') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="heading">{{__('Headline')}}</label>
                                            <input type="text" id="heading" class="form-control" value="{{ old('heading',$firstPage->heading)}}" name="heading">
                                            @if($errors->has('heading'))
                                                <span class="text-danger"> {{ $errors->first('heading') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="heading_bn">{{__('Headline_BN')}}</label>
                                            <input type="text" id="heading_bn" class="form-control" value="{{ old('heading_bn',$firstPage->heading_bn)}}" name="heading_bn">
                                            @if($errors->has('heading_bn'))
                                                <span class="text-danger"> {{ $errors->first('heading_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="short_text">{{__('Short Text')}}</label>
                                            <textarea type="short_text" id="short_text" class="form-control" value="{{ old('short_text',$firstPage->short_text)}}" name="short_text" cols="30" rows="5">{{$firstPage->short_text}}</textarea>
                                            @if($errors->has('short_text'))
                                                <span class="text-danger"> {{ $errors->first('short_text') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="short_text_bn">{{__('Short Text_BN')}}</label>
                                            <textarea type="short_text_bn" id="short_text_bn" class="form-control" value="{{ old('short_text_bn',$firstPage->short_text_bn)}}" name="short_text_bn" cols="30" rows="5">{{$firstPage->short_text_bn}}</textarea>
                                            @if($errors->has('short_text_bn'))
                                                <span class="text-danger"> {{ $errors->first('short_text_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="text">{{__('Text')}}</label>
                                            <textarea type="text" id="text" class="form-control" value="{{ old('text',$firstPage->text)}}" name="text" cols="30" rows="15">{{$firstPage->text}}</textarea> 
                                            @if($errors->has('text'))
                                                <span class="text-danger"> {{ $errors->first('text') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="text_bn">{{__('Text_BN')}}</label>
                                            <textarea type="text" id="text_bn" class="form-control" value="{{ old('text_bn',$firstPage->text_bn)}}" name="text" cols="30" rows="15">{{$firstPage->text_bn}}</textarea> 
                                            @if($errors->has('text_bn'))
                                                <span class="text-danger"> {{ $errors->first('text_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                
                                <div class="row">
                                    <div class="col-12">
                                        <span>Article/Poem Image</span><img width="60px" height="50px" src="{{asset('uploads/firstPage/image/'.$firstPage->image)}}" alt="image" class="mx-4">
                                    </div>
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">{{__('Save')}}</button>
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
