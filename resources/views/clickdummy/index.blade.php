@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row">
            <form class="form-horizontal" method="POST" action="{{url('/click-dummy/search')}}">
                <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}">
                    <input type="text" class="form-control" name="search" placeholder="Search CD..." value="">
                    @if ($errors->has('search'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('search') }}</strong>
                                    </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
            @if(Session::has('flash_message'))
                <div class="alert alert-success">{{ Session::get('flash_message') }}</div>
            @endif
            @if(Session::has('flash_message_del'))
                <div class="alert alert-success">{{ Session::get('flash_message_del') }}</div>
            @endif
            <div class="panel-heading"> Click-Dummy - {{ Auth::user()->name }}</div>
            @foreach($dummys as $dummy)
                <h4><a href="{{url('/click-dummy',$dummy->url)}}">{{$dummy->name}}</a></h4>
                <form class="form-horizontal" role="form" method="POST"
                      action="{{ url('/click-dummy/delete/'.$dummy->url)}}" onsubmit="return ConfirmDelete();">
                    {!! csrf_field() !!}
                    <button type="submit"><i class="glyphicon glyphicon-trash"></i></button>
                </form>
            @endforeach

        </div>
    </div>

@endsection
