@extends('layout.app')

@section('pageTitle',trans('Create Category'))
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
                            <form class="form" method="post" enctype="multipart/form-data" action="{{route(currentUser().'.page.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6 col-12">
                                        <label for="page_title">{{__('Page_title')}}</label>
                                        <textarea type="text" id="page_title" class="form-control" value="{{ old('page_title')}}" name="page_title" rows="2"></textarea> 
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="details">{{__('Details')}}</label>
                                        <textarea type="text" id="details" class="form-control" value="{{ old('details')}}" name="details" rows="3"></textarea> 
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="publshed">{{__('Publshed')}}</label>
                                        <select class="form-select" aria-label="Default select example" name="publshed">
                                            <option selected>Select Option</option>
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-12">
                                        <label for="page_slug">{{__('page_slug')}}</label>
                                        <textarea type="text" id="page_slug" class="form-control" value="{{ old('page_slug')}}" name="page_slug" rows="2"></textarea> 
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
