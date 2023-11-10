@extends('layout.app')

@section('pageTitle',trans('Create About Page'))
@section('pageSubTitle',trans('Create'))

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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.about_setting.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="about_image">{{__('Header_image')}}</label>
                                            <input type="file" id="about_image" class="form-control"
                                            placeholder="about_image" name="about_image">
                                            @if($errors->has('about_image'))
                                                <span class="text-danger"> {{ $errors->first('about_image')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="about_title">{{__('About_title')}}</label>
                                            <textarea type="text" id="about_title" class="form-control" name="about_title" rows="2">{{ old('about_title')}}</textarea>
                                            @if($errors->has('about_title'))
                                                <span class="text-danger"> {{ $errors->first('about_title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="about_description">{{__('About_description')}}</label>
                                            <textarea type="text" id="about_description" class="form-control" name="about_description"  rows="3">{{ old('about_description')}}</textarea>
                                            @if($errors->has('about_description'))
                                                <span class="text-danger"> {{ $errors->first('about_description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mission_title">{{__('Mission_title')}}</label>
                                            <textarea type="text" id="mission_title" class="form-control" name="mission_title"  rows="2">{{ old('mission_title')}}</textarea>
                                            @if($errors->has('mission_title'))
                                                <span class="text-danger"> {{ $errors->first('mission_title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mission_description">{{__('Mission_description')}}</label>
                                            <textarea type="text" id="mission_description" class="form-control" name="mission_description"  rows="3">{{ old('mission_description')}}</textarea>
                                            @if($errors->has('mission_description'))
                                                <span class="text-danger"> {{ $errors->first('mission_description') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mission_image_1">{{__('Mission_image_1')}}</label>
                                            <input type="file" id="mission_image_1" class="form-control"
                                            placeholder="mission_image_1" name="mission_image_1">
                                            @if($errors->has('mission_image_1'))
                                                <span class="text-danger"> {{ $errors->first('mission_image_1')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mission_image_2">{{__('Mission_image_2')}}</label>
                                            <input type="file" id="mission_image_2" class="form-control"
                                            placeholder="mission_image_2" name="mission_image_2">
                                            @if($errors->has('mission_image_2'))
                                                <span class="text-danger"> {{ $errors->first('mission_image_2')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mission_image_3">{{__('Mission_image_3')}}</label>
                                            <input type="file" id="mission_image_3" class="form-control"
                                            placeholder="mission_image_3" name="mission_image_3">
                                            @if($errors->has('mission_image_3'))
                                                <span class="text-danger"> {{ $errors->first('mission_image_3')}}</span>
                                            @endif
                                        </div>
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
