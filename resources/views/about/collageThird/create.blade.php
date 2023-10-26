@extends('layout.app')

@section('pageTitle',trans('Create Collage Image for About page'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.collageThird.store')}}">
                                @csrf
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
                                        <label for="category">{{__('Category')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="category">
                                            <option selected>Select Category</option>
                                            <option value="Poem">Poem</option>
                                            <option value="Book Review">Book Review</option>
                                            <option value="Film">Film</option>
                                            <option value="Film">Film</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="category_bn">{{__('Category_BN')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="category_bn">
                                            <option selected>শ্রেনী নির্ধারণ করুন</option>
                                            <option value="কবিতা">কবিতা</option>
                                            <option value="বই পুনঃমূল্যায়ন">বই পুনঃমূল্যায়ন </option>
                                            <option value="ছবি">ছবি</option>
                                            <option value="শিল্প">শিল্প</option>
                                        </select>
                                    </div>
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
                                            <label for="title_bn">{{__('Title_BN')}}</label>
                                            <input type="text" id="title_bn" class="form-control" value="{{ old('title_bn')}}" name="title_bn">
                                            @if($errors->has('title_bn'))
                                                <span class="text-danger"> {{ $errors->first('title_bn') }}</span>
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