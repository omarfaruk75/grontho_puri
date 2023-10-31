@extends('layout.app')

@section('pageTitle',trans('Edit conatct of Footer Page'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.contact.update',encryptor('encrypt',$contact->id))}}">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="uptoken" value="{{encryptor('encrypt',$contact->id)}}">
                                <div class="row">

                                    
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="address">{{__('Address')}}</label>
                                            <input type="text" id="address" class="form-control" value="{{ old('address',$contact->address)}}" name="address">
                                            @if($errors->has('address'))
                                                <span class="text-danger"> {{ $errors->first('address') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="mobile">{{__('Contact Number')}}</label>
                                            <input type="text" id="mobile" class="form-control" value="{{ old('mobile',$contact->mobile)}}" name="mobile">
                                            @if($errors->has('mobile'))
                                                <span class="text-danger"> {{ $errors->first('mobile') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <div class="form-group">
                                            <label for="email">{{__('E-mail')}}</label>
                                            <input type="email" id="email" class="form-control" value="{{old('email',$contact->email)}}" name="email">
                                            @if($errors->has('email'))
                                                <span class="text-danger"> {{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    
                                    <div class="col-12 d-flex justify-content-end">
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