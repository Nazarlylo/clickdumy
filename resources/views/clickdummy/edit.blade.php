@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Click-Dummy</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/click-dummy/update/'.$clickdumy->id) }}" enctype="multipart/form-data">
                            {!! csrf_field() !!}
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="name" value="{{$clickdumy->name}}">
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @if($images)
                                <div class="block_image">
                                @foreach($images as $img)
                                    <div class="images {{$img->id}}"><img src="/images/{{$img->images}}"><span
                                                class="delete_img"><img src="/images/close.png"> </span></div>
                                @endforeach
                                </div>
                            @endif
                            <div class="group_image">
                            <div class="form-group">
                                <label class="col-md-4 control-label">title image1</label>
                                <div class="col-md-6">
                                    <input type="text" name="title0">
                                    <input type="hidden" name="img_index0" value="1">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Images1</label>
                                <div class="col-md-6">
                                    <input type="file" name="images[]">
                                </div>
                            </div>
                            </div>
                            <div class="group_image">
                            <div class="form-group">
                                <label class="col-md-4 control-label">title image2</label>
                                <div class="col-md-6">
                                    <input type="text" name="title1">
                                    <input type="hidden" name="img_index1" value="2">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label">Images2</label>
                                <div class="col-md-6">
                                    <input type="file" name="images[]">
                                </div>
                            </div>
                            </div>
                            <div class="group_image">
                            <div class="form-group">
                                <label class="col-md-4 control-label">title image3</label>
                                <div class="col-md-6">
                                    <input type="text" name="title2">
                                    <input type="hidden" name="img_index2" value="3">
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-4 control-label">Images3</label>
                                <div class="col-md-6">
                                    <input type="file" name="images[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">title image4</label>
                                <div class="col-md-6">
                                    <input type="text" name="title3">
                                    <input type="hidden" name="img_index3" value="4">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label ">Images4</label>
                                <div class="col-md-6">
                                    <input type="file" name="images[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">Protection</label>
                                <div class="col-md-6">
                                    <input type="checkbox" name="protection" value="1"
                                           @if($clickdumy->protection) checked @endif>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Update
                                    </button>
                                </div>
                            </div>

                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
