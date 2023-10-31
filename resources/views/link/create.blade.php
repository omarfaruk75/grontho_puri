@extends('layout.app')

@section('pageTitle',trans('Create Link'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.link.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="facebook">{{__('Facebook')}}</label>
                                            <input type="text" id="facebook" class="form-control" value="{{ old('facebook')}}" name="facebook">
                                            @if($errors->has('facebook'))
                                                <span class="text-danger"> {{ $errors->first('facebook') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="twitter">{{__('Twitter')}}</label>
                                            <input type="text" id="twitter" class="form-control" value="{{ old('twitter')}}" name="twitter">
                                            @if($errors->has('twitter'))
                                                <span class="text-danger"> {{ $errors->first('twitter') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="share">{{__('Share')}}</label>
                                            <input type="text" id="share" class="form-control" value="{{ old('share')}}" name="share">
                                            @if($errors->has('share'))
                                                <span class="text-danger"> {{ $errors->first('share') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="save">{{__('Save')}}</label>
                                            <input type="text" id="save" class="form-control" value="{{ old('save')}}" name="save">
                                            @if($errors->has('save'))
                                                <span class="text-danger"> {{ $errors->first('save') }}</span>
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
