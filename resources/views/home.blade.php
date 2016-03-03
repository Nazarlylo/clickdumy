@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                @if($cds)
              @foreach($cds as $cd)
                        <h4><a href="{{url('/click-dummy',$cd->id)}}">{{$cd->name}}</a> </h4>
                @endforeach
                @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
