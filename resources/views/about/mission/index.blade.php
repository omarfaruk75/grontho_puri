@extends('layout.app')
@section('pageTitle',trans('Mission List'))
@section('pageSubTitle',trans('List'))

@section('content')

<!-- Bordered table start -->
<section class="section">
    <div class="row" id="table-bordered">
        <div class="col-12">
            <div class="card">
                @if(Session::has('response'))
                    {!!Session::get('response')['message']!!}
                @endif
                <div>
                    <a class="btn btn-sm btn-primary float-end" href="{{route(currentUser().'.mission.create')}}"><i class="bi bi-plus"></i></a>
                </div>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Title')}}</th>
                                <th scope="col">{{__('Title_BN')}}</th>
                                <th scope="col">{{__('Short Text')}}</th>
                                <th scope="col">{{__('Short Text_BN')}}</th>
                                <th scope="col">{{__('Image')}}</th>
                                <th scope="col">{{__('Image-2')}}</th>
                                <th scope="col">{{__('Image-3')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($mission as $m)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                
                                <td>{{$m->title}}</td>
                                <td>{{$m->title_bn}}</td>
                                <td>{{$m->short_texts}}</td>
                                <td>{{$m->short_texts_bn}}</td>
                                <td><img width="50px" src="{{asset('uploads/about_page/mission_image/image-1/images/'.$m->image)}}" alt="image"></td>
                                <td><img width="50px" src="{{asset('uploads/about_page/mission_image/image-2/images/'.$m->image_2)}}" alt="image-2"></td>
                                <td><img width="50px" src="{{asset('uploads/about_page/mission_image/image-3/images/'.$m->image_3)}}" alt="image-3"></td>
                                <td>@if($m->status == 1) {{__('Active') }} @else {{__('Inactive') }} @endif</td>
                              
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.mission.edit',encryptor('encrypt',$m->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$m->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$m->id}}" action="{{route(currentUser().'.mission.destroy',encryptor('encrypt',$m->id))}}" method="post">
                                        @csrf
                                        @method('delete')
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <th colspan="8" class="text-center">No Found</th>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection