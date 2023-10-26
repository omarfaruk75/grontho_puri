@extends('layout.app')
@section('pageTitle',trans('Collage Image List'))
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
                    <a class="btn btn-sm btn-primary float-end" href="{{route(currentUser().'.collageSecond.create')}}"><i class="bi bi-plus"></i></a>
                </div>
                <!-- table bordered -->
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th scope="col">{{__('#SL')}}</th>
                                <th scope="col">{{__('Image')}}</th>
                                <th scope="col">{{__('Category')}}</th>
                                <th scope="col">{{__('Category_BN')}}</th>
                                <th scope="col">{{__('Title')}}</th>
                                <th scope="col">{{__('Title_BN')}}</th>
                                <th scope="col">{{__('Status')}}</th>
                                <th class="white-space-nowrap">{{__('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($second as $s)
                            <tr>
                                <th scope="row">{{ ++$loop->index }}</th>
                                <td><img width="50px" src="{{asset('uploads/about_page/collage2nd_image/images/'.$s->image)}}" alt="image"></td>
                                <td>{{$s->category}}</td>
                                <td>{{$s->category_bn}}</td>
                                <td>{{$s->title}}</td>
                                <td>{{$s->title_bn}}</td>
                             
                                <td>@if($s->status == 1) {{__('Active') }} @else {{__('Inactive') }} @endif</td>
                              
                                <td class="white-space-nowrap">
                                    <a href="{{route(currentUser().'.collageSecond.edit',encryptor('encrypt',$s->id))}}">
                                        <i class="bi bi-pencil-square"></i>
                                    </a>
                                    <a href="javascript:void()" onclick="$('#form{{$s->id}}').submit()">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                    <form id="form{{$s->id}}" action="{{route(currentUser().'.collageSecond.destroy',encryptor('encrypt',$s->id))}}" method="post">
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