@extends('layout.app')

@section('pageTitle',trans('Edit Link'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.link.update',encryptor('encrypt',$link->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$link->id)}}">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="facebook">Facebook</label>
                                            <input type="text" id="facebook" class="form-control" value="{{ old('facebook',$link->facebook)}}" name="facebook">
                                            @if($errors->has('facebook'))
                                                <span class="text-danger"> {{ $errors->first('facebook') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="twitter">Twitter</label>
                                            <input type="text" id="twitter" class="form-control" value="{{ old('twitter',$link->twitter)}}" name="twitter">
                                            @if($errors->has('twitter'))
                                                <span class="text-danger"> {{ $errors->first('twitter') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="share">Share</label>
                                            <input type="text" id="share" class="form-control" value="{{ old('share',$link->share)}}" name="share">
                                            @if($errors->has('share'))
                                                <span class="text-danger"> {{ $errors->first('share') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="save">Save</label>
                                            <input type="text" id="save" class="form-control" value="{{ old('save',$link->save)}}" name="save">
                                            @if($errors->has('save'))
                                                <span class="text-danger"> {{ $errors->first('save') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
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
