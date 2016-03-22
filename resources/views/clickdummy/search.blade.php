@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            @if($result)
                <div class="page-header">Result search</div>
                @foreach($result as $value)
                    <h4><a href="{{url('/click-dummy',$value->url)}}">{{$value->name}}</a></h4>
                @endforeach
                @else
                <div class="page-header">Result not found</div>
            @endif
        </div>
    </div>

@endsection