@extends('layout.app')

@section('pageTitle',trans('Edit Article'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.headerCard.update',encryptor('encrypt',$home->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$home->id)}}">
                                <div class="row">

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
                                            <label for="title">{{__('Title')}}</label>
                                            <input type="text" id="title" class="form-control" value="{{ old('title',$home->title)}}" name="title">
                                            @if($errors->has('title'))
                                                <span class="text-danger"> {{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title_bn">{{__('Title_BN')}}</label>
                                            <input type="text" id="title_bn" class="form-control" value="{{ old('title_bn',$home->title_bn)}}" name="title_bn">
                                            @if($errors->has('title_bn'))
                                                <span class="text-danger"> {{ $errors->first('title_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="short_details">{{__('Short Text')}}</label>
                                            <textarea type="text" id="short_details" class="form-control" value="{{ old('short_details')}}" name="short_details" cols="30" rows="5">{{$home->short_details}}</textarea>
                              
                                            @if($errors->has('short_details'))
                                                <span class="text-danger"> {{ $errors->first('short_details') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="short_details_bn">{{__('Short Text_BN')}}</label>
                                            <textarea type="text" id="short_details_bn" class="form-control" value="{{ old('short_details_bn')}}" name="short_details_bn" cols="30" rows="5">{{$home->short_details_bn}}</textarea>
                              
                                            @if($errors->has('short_details_bn'))
                                                <span class="text-danger"> {{ $errors->first('short_details_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <img width="80px" height="50px" src="{{asset('uploads/home_page/header_card/image/'.$home->image)}}" alt="image" class="mx-4">

                                        <button type="submit" class="btn btn-primary me-1 mb-1 mx-2">{{__('Save')}}</button>
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