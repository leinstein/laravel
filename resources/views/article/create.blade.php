{{--{!! Form::model(null,['url'=>url('article'),'method'=>'post']) !!}--}}
{{--{!! Form::text('title', null, ['class' => 'form-control','autocomplete'=>'off']) !!}--}}
{{--{!! Form::text('content', null, ['class' => 'form-control','autocomplete'=>'off']) !!}--}}
{{--{!! Form::hidden('user_id', 1, ['autocomplete'=>'off']) !!}--}}
{{--{!! Form::submit('提交',['class' => 'btn btn-primary']) !!}--}}
{{--{!! Form::close() !!}--}}
@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <form action="{{url('article')}}" method="post">
        {{csrf_field()}}
        标题 : <input type="text" name="title" style="width: 335px;"><br><br>
        文章 : <textarea name="content" cols="50"  rows="15" style="vertical-align: middle;"></textarea><br><br>
        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="submit" value="提交">
    </form>
     {{--错误信息--}}
    @if($errors->any())
        <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
</body>
</html>
@endsection