@extends('layout.app')

@section('pageTitle',trans('Create Mission for About page'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.mission.store')}}">
                                @csrf
                                <div class="row">
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">{{__('Title')}}</label>
                                            <input type="text" id="title" class="form-control" value="{{ old('title')}}" name="title">
                                            @if($errors->has('title'))
                                                <span class="text-danger"> {{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">{{__('Title_BN')}}</label>
                                            <input type="text" id="title" class="form-control" value="{{ old('title')}}" name="title">
                                            @if($errors->has('title'))
                                                <span class="text-danger"> {{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="short_texts">{{__('Short Text')}}</label>
                                            <input type="text" id="short_texts" class="form-control" value="{{ old('short_texts')}}" name="short_texts">
                                            @if($errors->has('short_texts'))
                                                <span class="text-danger"> {{ $errors->first('short_texts') }}</span>
                                            @endif
                                        </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="short_texts_bn">{{__('Short Text_BN')}}</label>
                                            <input type="text" id="short_texts_bn" class="form-control" value="{{ old('short_texts_bn')}}" name="short_texts_bn">
                                            @if($errors->has('short_texts_bn'))
                                                <span class="text-danger"> {{ $errors->first('short_texts_bn') }}</span>
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
                                            <label for="image_2">{{__('Image-2')}}</label>
                                            <input type="file" id="image_2" class="form-control"
                                                placeholder="Image-2" name="image_2">
                                                @if($errors->has('image_2'))
                                                    <span class="text-danger"> {{ $errors->first('image_2') }}</span>
                                                @endif
                                        </div>
                                     </div>
                                     <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image_3">{{__('Image-3')}}</label>
                                            <input type="file" id="image_3" class="form-control"
                                                placeholder="Image-3" name="image_3">
                                                @if($errors->has('image_3'))
                                                    <span class="text-danger"> {{ $errors->first('image_3') }}</span>
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

@push('scripts')
<script>
    function showBranch(e){
        $('#branch_id .branchs').hide();
        $('#branch_id .branchs'+e.value).show();
    }
    function hideCompany(e){
        if(e=="1" || e=="2"){
            $('.company_row').hide();
        }else{
            $('.company_row').show();
        }
    }
    if($('#role_id').val()=="1" || $('#role_id').val()=="2"){
        $('.company_row').hide();
    }else{
        $('.company_row').show();
    }
</script>
@endpush