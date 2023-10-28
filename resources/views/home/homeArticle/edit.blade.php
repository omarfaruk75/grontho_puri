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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.homeArticle.update',encryptor('encrypt',$home->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$home->id)}}">
                                <div class="row">

                                   <div class="col-md-6 col-12">
                                        <label for="is_popular">{{__('Is Popular')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="is_popular">
                                            <option selected>Select Popular</option>
                                            <option value="1" {{ $home->category=='1'?'selected':''}}>Yes</option>
                                            <option value="0"  {{ $home->category=='0'?'selected':''}}>No</option>
                                        </select>
                                    </div>
                                   <div class="col-md-6 col-12">
                                        <label for="is_popular_bn">Is Popular_BN</label>
                                        <select class="form-select" aria-label="Default select example" name="is_popular_bn">
                                            <option selected>জনপ্রিয় নির্বাচন কর</option>
                                            <option value="1" {{ $home->category=='1'?'selected':''}}>হ্যাঁ</option>
                                            <option value="0"  {{ $home->category=='0'?'selected':''}}>না</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="category">{{__('Category')}}</label>
                                            <input type="text" id="category" class="form-control" value="{{ old('category',$home->category)}}" name="category">
                                            @if($errors->has('category'))
                                                <span class="text-danger"> {{ $errors->first('category') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="category_bn">{{__('Category_BN')}}</label>
                                            <input type="text" id="category_bn" class="form-control" value="{{ old('category_bn',$home->category_bn)}}" name="category_bn">
                                            @if($errors->has('category_bn'))
                                                <span class="text-danger"> {{ $errors->first('category_bn') }}</span>
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