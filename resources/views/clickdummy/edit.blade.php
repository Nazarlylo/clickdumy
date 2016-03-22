@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Click-Dummy</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST"
                              action="{{ url('/click-dummy/update/'.$clickdumy->url) }}" enctype="multipart/form-data">
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
                                @foreach($images as $img)
                                    <div class="block_img">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">title</label>
                                            <div class="col-md-6">
                                                <input type="text" name="title[]" value="{{$img->title}}">
                                                <input type="hidden" name="id_img[]" value="{{Crypt::encrypt($img->id)}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">aprove</label>
                                            <div class="col-md-6">
                                                <input type="checkbox" name="approve[]" value="1" @if($img->approve)  checked @endif/>
                                            </div>
                                        </div>
                                    <div class="img-thumbnail"><img src="/images/{{$img->images}}">
                                        <input type="hidden" class="item_id" value="{{Crypt::encrypt($img->clickdum_id)}}"/>
                                        <button type="button" title="Удалить" datasrc="{{$img->images}}" data-value="{{ $img->numb_img }}" class="btn btn-danger del_image btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                                        @if($img->approve == 1)
                                            <div class="approv_imag"><i class="glyphicon glyphicon-ok"></i></div>
                                        @else
                                            <div class="approv_imag"><i class="glyphicon glyphicon-remove"></i></div>
                                        @endif
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <div class="header">Add  new image</div>
                            <div  class="block_img">
                            <div class="form-group">
                                <label class="col-md-4 control-label">title</label>
                                <div class="col-md-6">
                                    <input type="text" name="title[]">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">images</label>
                                <div class="col-md-6">
                                    <input type="file" name="images[]"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-4 control-label">aprove</label>
                                <div class="col-md-6">
                                    <input type="checkbox" name="approve[]" value="1"/>
                                </div>
                            </div>
                            </div>
                            <hr>
                            <h3>Дополнительные изображения</h3>
                            <button class="btn btn-primary add_images" type="button"><i class="glyphicon glyphicon-plus"></i></button>
                            <br>
                            {{--<div class="form-group">--}}
                                {{--<label class="col-md-4 control-label">Protection</label>--}}
                                {{--<div class="col-md-6">--}}
                                    {{--<input type="checkbox" name="protection" value="1"--}}
                                           {{--@if($clickdumy->protection) checked @endif>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Sort image</label>
                                <div class="col-md-6">
                                    <select name="sort_i">
                                        @foreach($simages as $simage )
                                            <option @if($simage->id ==$clickdumy->sort_image) selected @endif value="{{$simage->id}}">{{$simage->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                </div>
                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Update
                                    </button>
                                </div>
                            </div>
                            {{--<input type="hidden" name="_token" value="{!!csrf_token()!!}">--}}
                        </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
