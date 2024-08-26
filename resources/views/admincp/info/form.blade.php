@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Quản Lý Thông Tin Website</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
              
                        {!! Form::open(['route'=>['info.update',$info->id],'method'=>'PUT','enctype'=>'multipart/form-data']) !!}
              
                        <div class="form-group">
                            {!! Form::label('title', 'Tiêu đề Website', []) !!}
                            {!! Form::text('title', isset($info) ? $info->title : '', ['class'=>'form-control','placeholder'=>'...']) !!}
                        </div>
                   
                        <div class="form-group">
                            {!! Form::label('description', 'Mô tả ', []) !!}
                            {!! Form::textarea('description', isset($info) ? $info->description : '', ['style'=>'resize:none', 'class'=>'form-control','placeholder'=>'...','id'=>'description']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Image', 'Hình ảnh', []) !!}
                            {!! Form::file('image', ['class'=>'form-control-file']) !!}
                            @if(isset($info))
                              <img width="150" src="{{asset('uploads/logo/'.$info->logo)}}">
                            @endif
                        </div>
                     
                       
                            {!! Form::submit('Cập Nhật TT Website', ['class'=>'btn btn-success']) !!}
                    
                    {!! Form::close() !!}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
