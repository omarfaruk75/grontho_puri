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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.headerArticle.update',encryptor('encrypt',$home->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$home->id)}}">
                                <div class="row">

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="image">Image</label>
                                            <input type="file" id="image" class="form-control"
                                                placeholder="Image" name="image">
                                                @if($errors->has('image'))
                                                    <span class="text-danger"> {{ $errors->first('image') }}</span>
                                                @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="logo_img">Logo Image</label>
                                            <input type="file" id="logo_img" class="form-control"
                                                placeholder="logo_img" name="logo_img">
                                                @if($errors->has('logo_img'))
                                                    <span class="text-danger"> {{ $errors->first('logo_img') }}</span>
                                                @endif
                                        </div>
                                    </div>

                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="user_id">Name</label>
                                            <input type="text" id="user_id" class="form-control" value="{{ old('user_id',$home->user_id)}}" name="user_id">
                                            @if($errors->has('user_id'))
                                                <span class="text-danger"> {{ $errors->first('user_id') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">Title</label>
                                            <input type="text" id="title" class="form-control" value="{{ old('title',$home->title)}}" name="title">
                                            @if($errors->has('title'))
                                                <span class="text-danger"> {{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <input type="text" id="category" class="form-control" value="{{ old('category',$home->category)}}" name="category">
                                            @if($errors->has('category'))
                                                <span class="text-danger"> {{ $errors->first('category') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-12 d-flex justify-content-end">
                                        <img width="80px" height="50px" src="{{asset('uploads/home_page/header_article/image/'.$home->image)}}" alt="image" class="mx-4">
                                        <img width="50px" height="50px" src="{{asset('uploads/home_page/header_article/logo_img/'.$home->logo_img)}}" alt="logo_img" class="mx-4">
                                        <button type="submit" class="btn btn-primary me-1 mb-1 mx-2">Save</button>
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