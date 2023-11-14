@extends('app')

@section('section_one')

    This is student page only 
    {{$student}}
    <br>
    @foreach($data as $d)
        {{$d}}
    @endforeach

@endsection

@section('section_two')
 <h1>This is from section 2</h1>
@endsection
