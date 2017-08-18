@extends('layouts.app')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>显示文章</title>
    <script src="js/jquery.min.js"></script>
</head>
<script>

    $(function () {
        $('.del').click(function () {
            $.ajax({
                type : 'DELETE',
                url  : '/article/'+$(this).attr('art_id'),
                data : {},
                dataType : 'json',
                headers: {
                    'X-CSRF-TOKEN': '{{csrf_token()}}'
                },
                success : function (ret) {
                    if(ret.status==1){
                        location.reload();  //成功,刷新页面
                    }else{
                        alert('删除失败'+ret.msg);
                    }
                }
            })
        })
    });
</script>
<body>
    <a href="{{url('article/create')}}">添加文章</a><hr>
    <ul>
        @foreach($data as $v)
            <li art_id="{{$v->id}}">
                <a href="{{url('article',['id'=>$v->id])}}"><h3>{{$v->title}}</h3></a>
                <i>作者&nbsp;&nbsp; :&nbsp;&nbsp; {{$v->user->name}}</i>&nbsp;&nbsp;&nbsp;&nbsp;
                <span><a href="{{url('article/'.$v->id).'/edit'}}">修改</a></span>&nbsp;&nbsp;&nbsp;&nbsp;
                <span>
                    <button class="del" art_id="{{$v->id}}">删除</button>
                </span>
                {{--另一种删除--}}
                {{--{!! Form::model(null,['url'=>url('article/'.$v->id),'method'=>'DELETE']) !!}--}}
                {{--{!! Form::hidden('user_id', 1, ['autocomplete'=>'off']) !!}--}}
                {{--{!! Form::submit('删除',['class' => 'btn btn-primary']) !!}--}}
                {{--{!! Form::close() !!}--}}
            </li>
        @endforeach
    </ul>
</body>
</html>
@endsection