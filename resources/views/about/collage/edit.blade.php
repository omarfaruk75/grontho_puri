@extends('layout.app')

@section('pageTitle',trans('Edit Collage Image'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.collage.update',encryptor('encrypt',$collage->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$collage->id)}}">
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
                                        <label for="category">Category</label>
                                        <select class="form-select" aria-label="Default select example" name="category">
                                            <option selected>Select Category</option>
                                            <option value="Poem" {{ $collage->category=='Poem'?'selected':''}}>Poem</option>
                                            <option value="Book Review" {{ $collage->category=='Book Review'?'selected':''}}>Book Review</option>
                                            <option value="Film" {{ $collage->category=='Film'?'selected':''}}>Film</option>
                                            <option value="Art" {{ $collage->category=='Art'?'selected':''}}>Art</option>
                                        </select>
                                    </div>
                                
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="title">Title Name</label>
                                            <input type="text" id="title" class="form-control" value="{{ old('title',$collage->title)}}" name="title">
                                            @if($errors->has('title'))
                                                <span class="text-danger"> {{ $errors->first('title') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                  
                                    <div class="col-12 d-flex justify-content-end">
                                        <img width="80px" height="50px" src="{{asset('uploads/about_page/collage_image/images/'.$collage->image)}}" alt="image" class="mx-4">
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