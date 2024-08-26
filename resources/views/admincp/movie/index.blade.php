@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
      <style>
        .cate_chosse{
          width: 120px;
          height: 29px;
          text-align: center;
          margin-top: 0px;
          padding-top:2px;
        }
        .country_chosse{
          width: 120px;
          height: 29px;
          text-align: center;
          margin-top: 0px;
          padding-top:2px;
        }
      </style>
        <div class="col-md-12">
            <a href="{{route('movie.create')}}" class="btn btn-primary">Thêm Phim</a>
            <div class="table-responsive">
            <table class="table " id="tablephim">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Tên phim</th>
                  <th scope="col">Tập phim</th>
                  <th scope="col">Thêm phim</th>
                  <th scope="col">Hình ảnh</th>
                  <th scope="col">Phim hot</th>
                  <th scope="col">Định dạng</th>
                  <th scope="col">Phụ đề</th>
                  <!-- <th scope="col">Mô tả</th> -->
                  {{-- <th scope="col">Tags </th> --}}
                  <th scope="col">Đường dẫn</th>
                  <th scope="col">Trạng thái</th>
                  <th  scope="col">Danh mục</th>
                  <th scope="col">Thể loại</th>
                  <th scope="col">Quốc gia</th>
                  <th scope="col">Số tập</th>
                  {{-- <th scope="col">Ngày tạo</th> --}}
                  <th scope="col">Ngày cập nhật</th>
                  <th scope="col">Năm</th>
                  <th scope="col">Season</th>
                  <th scope="col">Thời Gian</th>
                  <th scope="col">Top Views</th>
                  <th scope="col">Quản lý</th>
                </tr>
              </thead>
              <tbody>
                @foreach($list as $key => $cate)
                <tr>
                  <th scope="row">{{$key}}</th>
                  <td>{{$cate->title}}</td>
                  <td><a href="{{route('add-episode',[$cate->id])}}" class="btn btn-primary btn-small">Thêm tập phim</a></td>
                  <td>{{$cate->episode_count}}/{{$cate->sotap}}</td>
                  <td>
                    <img width="100" src="{{asset('uploads/movie/'.$cate->image)}}">
                    <input type="file" data-movie_id={{$cate->id}} id="file-{{$cate->id}}" class="form-control-file file_image" accept="image/*">
                    <span id="success_image"></span>
                  </td>
                  <td>
                    @if($cate->phim_hot==0)
                        Không
                    @else
                        Có
                    @endif
                  </td>
                  <td>
                    {{-- @if($cate->resolution==0)
                        HD
                    @elseif($cate->resolution==1)
                        SD
                    @elseif($cate->resolution==2)
                        HDcam
                    @elseif($cate->resolution==3)
                        Cam
                    @elseif($cate->resolution==4)
                        Full HD
                        @else
                        Trailer
                    @endif --}}
                    @php
                    $options=array('0'=>'HD','1'=>'SD','2'=>'HDCam','3'=>'Cam','4'=>'FullHD','5'=>'Trailer');
                    @endphp
                     <select id="{{$cate->id}}" class="resolution_chosse">
                      @foreach($options as $key => $resolution)
                      <option {{ $cate->resolution==$key  ? 'selected' : '' }} value="{{$key}}">{{$resolution}}</option>

                      @endforeach
                    </select>
                  </td>
                  <td>
                    @if($cate->phude==0)
                        Vietsub
                    @else
                        Thuyết minh
                    @endif
                  </td>
                  <!-- <td>{{$cate->description}}</td> -->
                  {{-- <td>{{$cate->tags}}</td> --}}
                  <td>{{$cate->slug}}</td>
                  <td>
                    {{-- @if($cate->status)
                        Hiển thị
                    @else
                        Không hiển thị
                    @endif --}}
                    <select id="{{$cate->id}}" class="trangthai">
                      @if($cate->status==0)
                      <option value="1">Hiển thị</option>
                      <option selected value="0">Không</option>
                      @else
                      <option selected value="1">Hiển thị</option>
                      <option  value="0">Không</option>
                      @endif
                    </select>
                  </td>
                  <td>
                    {{-- {{$cate->category->title}} --}}
                    {!! Form::select('category_id', $category, isset($cate) ? $cate->category->id : '', ['class'=>'form-control cate_chosse','id'=>$cate->id]) !!}

                  </td>
                  <td>@foreach($cate->movie_genre as $gen)
                   <span class="badge badge-dark"> {{$gen->title}}</span>
                  @endforeach</td>

                  <td>
                    {{-- {{$cate->country->title}} --}}
                    {!! Form::select('country_id', $country, isset($cate) ? $cate->country->id : '', ['class'=>'form-control country_chosse','id'=>$cate->id]) !!}
                  </td>
                  <td>{{$cate->sotap}}</td>
                  {{-- <td>{{$cate->ngaytao}}</td> --}}
                  <td>{{$cate->ngaycapnhat}}</td>
                  <td>{!!Form::selectYear('year',2000,2022,isset($cate->year) ? $cate->year : '',['class'=>'select-year','id'=>$cate->id,'placeholder' => '--Năm Phim--'])!!}</td>
                  <td>{!!Form::selectRange('season',0,20,isset($cate->season) ? $cate->season : '',['class'=>'select-season','id'=>$cate->id,'placeholder' => '--Năm Phim--'])!!}</td>
                  <td>{{$cate->thoiluong}}</td>
                  <td>{!! Form::select('topview',['0'=>'Ngày','1'=>'Tuần','2'=>'Tháng'] ,isset($cate->topview) ? $cate->topview : '',['class'=>'select-topview','id'=>$cate->id])  !!}</td>
                  <td>
                      {!! Form::open(['method'=>'DELETE','route'=>['movie.destroy',$cate->id],'onsubmit'=>'return confirm("Bạn có chắc muốn xóa?")']) !!}
                        {!! Form::submit('Xóa', ['class'=>'btn btn-danger']) !!}
                      {!! Form::close() !!}
                      <a href="{{route('movie.edit',$cate->id)}}" class="btn btn-warning">Sửa</a>
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
