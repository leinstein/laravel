@extends('layouts.app')
@section('content')
{!! Form::model($info,['url'=>url('article',$info->id),'method'=>'put']) !!}
{!! Form::text('title', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
{!! Form::textArea('content', null, ['class' => 'form-control','autocomplete'=>'off']) !!}
{!! Form::hidden('user_id', 1, ['autocomplete'=>'off']) !!}
{!! Form::submit('提交',['class' => 'btn btn-primary']) !!}
{!! Form::close() !!}

@if($errors->any())
    <ul class="alert alert-danger">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        </ul>
@endif
@endsection
