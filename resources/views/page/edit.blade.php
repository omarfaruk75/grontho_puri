@extends('layout.app')

@section('pageTitle',trans('Edit Page'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.page.update',encryptor('encrypt',$page->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$page->id)}}">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="page_title">{{__('Page_title')}}</label>
                                            <textarea type="text" id="page_title" class="form-control" value="{{ old('page_title',$page->page_title)}}" name="page_title">{{$page->page_title}}</textarea> 
                                            @if($errors->has('page_title'))
                                                <span class="text-danger"> {{ $errors->first('page_title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="details">{{__('details')}}</label>
                                            <textarea type="text" id="details" class="form-control" value="{{ old('details',$page->details)}}" name="details">{{$page->details}}</textarea> 
                                            @if($errors->has('details'))
                                                <span class="text-danger"> {{ $errors->first('details') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="publshed">{{__('Published')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="publshed">
                                            <option selected>Select Option</option>
                                            <option value="1" {{ $page->publshed=='1'?'selected':''}}>Yes</option>
                                            <option value="0" {{ $page->publshed=='0'?'selected':''}}>No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="page_slug">{{__('page_slug')}}</label>
                                            <textarea type="text" id="page_slug" class="form-control" value="{{ old('page_slug',$page->page_slug)}}" name="page_slug">{{$page->page_slug}}</textarea> 
                                            @if($errors->has('page_slug'))
                                                <span class="text-danger"> {{ $errors->first('page_slug') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                <div class="row">
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
