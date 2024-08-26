@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="table-responsive">
            <div class="card">
                <div class="card-header">Quản Lý Danh Mục</div>

            </div>
            <table  class="table" id="tablephim">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên Phim</th>
                  <th scope="col">Tập Phim</th>
                  <th scope="col">Link Phim</th>
                  {{-- <th scope="col">Trạng thái</th> --}}
                  <th scope="col">Quản lý</th>
                </tr>
              </thead>
              <tbody class="">
                @foreach($list_episode as $key => $episode)
                <tr >
                  <th scope="row">{{$key}}</th>
                  <td>{{$episode->movie->title}}</td>
                  <td>{{$episode->episode}}</td>
                  <td>{!!$episode->linkphim!!}</td>
                  {{-- <td>
                    @if($episode->status)
                        Hiển thị
                    @else
                        Không hiển thị
                    @endif
                  </td> --}}
                  <td>
                      {!! Form::open(['method'=>'DELETE','route'=>['episode.destroy',$episode->id],'onsubmit'=>'return confirm("Bạn có chắc muốn xóa?")']) !!}
                        {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                      {!! Form::close() !!}
                      <a href="{{route('episode.edit',$episode->id)}}" class="btn btn-warning">Sửa</a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
    </div>
</div>
@endsection
