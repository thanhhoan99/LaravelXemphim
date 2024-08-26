<form action="{{route('locphim')}}" method="GET">
   <style type="text/css">
      .fitle{
         border: 0;
         background: rgb(5, 2, 21);
         color: white;
      }
   </style>
   {{-- @csrf --}}
   <div class="col-md-2">
      <div class="form-group " >
         <select class="form-control fitle" name="order">
            <option value="">--Sắp xếp--</option>
            <option value="date">Ngày đăng</option>
            <option value="name_a_z">Tên Phim</option>
            <option value="year_pub">Năm sản xuất</option>
            <option value="watch_views">Lượt xem</option>
         </select>
      </div>
   </div>
   <div class="col-md-3">
      <div class="form-group ">
         <select class="form-control fitle"  name="genre">
            <option value="">--Thể Loại--</option>
            @foreach($genre_home as $key => $gen_fitle)
            <option {{ (isset($_GET['genre']) && $_GET['genre']==$gen_fitle->id) ? 'selected ' : ' '}} value="{{$gen_fitle->id}}">{{$gen_fitle->title}}</option>
            @endforeach
         </select>
      </div>
   </div>
   <div class="col-md-3" >
      <div class="form-group ">
         <select class="form-control fitle" name="country">
            <option value="">--Quấc Gia--</option>
            @foreach($country_home as $key => $cou_fitle)
            <option {{ (isset($_GET['country']) && $_GET['country']==$cou_fitle->id) ? 'selected ' : ' '}} value="{{$cou_fitle->id}}">{{$cou_fitle->title}}</option>
            @endforeach
         </select>
      </div>
   </div>
   <div class="col-md-3">
      <div class="form-group">
         @php
         if(isset($_GET['year'])){
            $year = $_GET['year'];
         }else{
            $year=null;
         }

         @endphp
         {!!Form::selectYear('year',2010,2022,  $year,['class'=>'form-control fitle','placeholder'=>'--Năm phim--'])!!}
      </div>
   </div>
   <div class="col-md-1">
   <input type="submit" class="btn btn-sm btn-default fitle" value="Lọc Phim">
   </div>
  </form>