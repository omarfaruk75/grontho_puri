@extends('layout.app')

@section('pageTitle',trans('Edit Text'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.text.update',encryptor('encrypt',$text->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$text->id)}}">
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="category">{{__('Category')}}</label>
                                            <input type="text" id="category" class="form-control" value="{{ old('category',$text->category)}}" name="category">
                                            @if($errors->has('category'))
                                                <span class="text-danger"> {{ $errors->first('category') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="category_bn">{{__('Category_BN')}}</label>
                                            <input type="text" id="category_bn" class="form-control" value="{{ old('category_bn',$text->category_bn)}}" name="category_bn">
                                            @if($errors->has('category_bn'))
                                                <span class="text-danger"> {{ $errors->first('category_bn') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="short_texts">{{__('Short Text')}}</label>
                                             <textarea type="text" id="short_texts" class="form-control" value="{{ old('short_texts')}}" name="short_texts" cols="30" rows="5">{{$text->short_texts}}</textarea>
                                            @if($errors->has('short_texts'))
                                                <span class="text-danger"> {{ $errors->first('short_texts') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="short_texts_bn">{{__('Short Text_BN')}}</label>
                                             <textarea type="text" id="short_texts_bn" class="form-control" value="{{ old('short_texts_bn')}}" name="short_texts_bn" cols="30" rows="5">{{$text->short_texts_bn}}</textarea>
                                            @if($errors->has('short_texts_bn'))
                                                <span class="text-danger"> {{ $errors->first('short_texts_bn') }}</span>
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