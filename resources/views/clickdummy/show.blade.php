@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel-heading">Click-Dummy {{$clickdumy->name}}</div>
                @if(isset($images))
                    @foreach($images as $img)
                            <div class="img-thumbnail">
                            <img src="/images/{{$img->images}}"title="{{$img->title}}">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

@endsection