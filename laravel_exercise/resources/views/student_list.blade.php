@extends('app')
@section('section_two')

<ul>
    @foreach($data as $d)
        @include('partial', array($d))
    @endforeach
</ul>
    


@endsection

@section('advertisement')
    
This is from blade
@parent
@endsection