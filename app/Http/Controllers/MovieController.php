<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Movie_Genre;
use App\Models\Info;
use Carbon\Carbon;
use App\Models\Rating;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = Movie::with('category','movie_genre','country','genre')->withCount('episode')->orderBy('id','DESC')->get();
        $path= public_path()."/json/";
        $category=Category::pluck('title' ,'id');
        $country=Country::pluck('title' ,'id');
        if(!is_dir($path)){
          mkdir($path,0777,true);
        }
        File::put($path.'movies.json',json_encode($list));

        return view('admincp.movie.index', compact('list','category','country'));
    }
    public function cate_chosse(Request $request){
      $data= $request->all();
      $movie=Movie::find($data['movie_id']);
      $movie->category_id=$data['category_id'];
      $movie->save();
    }
    public function country_chosse(Request $request){
      $data= $request->all();
      $movie=Movie::find($data['movie_id']);
      $movie->country_id=$data['country_id'];
      $movie->save();
    }
    public function resolution_chosse(Request $request){
      $data= $request->all();
      $movie=Movie::find($data['movie_id']);
      $movie->resolution=$data['resolu_val'];
      $movie->save();
    }
    public function trangthai(Request $request){
      $data= $request->all();
      $movie=Movie::find($data['movie_id']);
      $movie->status=$data['trangtha'];
      $movie->save();
    }
    public function update_year(Request $request){
        $data= $request->all();
        $movie=Movie::find($data['id_phim']);
        $movie->year=$data['year'];
        $movie->save();

    }
    public function update_image_ajax(Request $request){
      $get_image= $request->file('file');
      $movie_id=$request->movie_id;

      if($get_image){
      $movie=Movie::find($movie_id);
      unlink('uploads/movie/'.$movie->image);


      $get_name_image = $get_image->getClientOriginalName();
      $name_image = current(explode('.',$get_name_image));
      $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
      $get_image->move('uploads/movie/',$new_image);
      $movie->image = $new_image;

      $movie->save();
    }

  }
    public function update_season(Request $request){
      $data= $request->all();
      $movie=Movie::find($data['id_phim']);
      $movie->season=$data['season'];
      $movie->save();

  }
    public function update_topview(Request $request){
        $data= $request->all();
        $movie=Movie::find($data['id_phim']);
        $movie->topview=$data['topview'];
        $movie->save();

    }
    public function filter_topview(Request $request){
        $data= $request->all();
        $movie=Movie::where('topview',$data['value'])->orderBy('ngaycapnhat','DESC')->take(3)->get();
       $output='';
       foreach($movie as $key=>$mov ){
           if($mov->resolution==0){
                                $text= ' HD';}
                              elseif($mov->resolution==1)
                              {
                                $text= ' SD';}
                              elseif($mov->resolution==2)
                              {
                                $text= ' HDCam';}
                              elseif($mov->resolution==3)
                              {
                                $text= ' Cam';}
                              elseif($mov->resolution==4)
                              {
                                $text= ' FullHD';}
                              else{
                                $text='Trailer';}

            $output.=' <div  class="item">

               <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                  <div class="item-link">
                     <img src="'.url('uploads/movie/'.$mov->image).'" class="lazy post-thumb"
                      alt="'.$mov->title.'" title="'.$mov->title.'" />
                     <span class="is_trailer">
                      '.$text.'
                     </span>
                  </div>
                  <p class="title">'.$mov->title.'</p>
               </a>
               <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
               <div style="float: left;">';
               for($count=1; $count<=5; $count++){
                $output.='  <ul class="list-inline rating"  title="Average Rating">
                <li title="star_rating"
                class="rating"
                style="cursor:pointer;
                font-size:20px;color:#ffcc00;">&#9733;</li>
                </ul>';}
                $output.=' </div>';
         '</div>';
       }
       echo $output;

    }
//     <div style="float: left;">
//     <span class="user-rate-image post-large-rate stars-large-vang" style="display: block;/* width: 100%; */">
//     <span style="width: 0%"></span>
//     </span>
//  </div>
//     <div style="float: left;">';
//     for($count=1; $count<=5; $count++){

//   $output.='  <ul class="list-inline rating"  title="Average Rating">

//       <li title="star_rating"

//       class="rating"
//       style="cursor:pointer;

//       font-size:20px;color:#ffcc00;">&#9733;</li>
//        </ul>';

//     }

//  '</div>
// </div>  ';

    public function filter_default(Request $request){
        $data= $request->all();
        $movie=Movie::where('topview',0)->orderBy('ngaycapnhat','ASC')->take(3)->get();
       $output='';
       foreach($movie as $key=>$mov ){
           if($mov->resolution==0){
                                $text= ' HD';}
                              elseif($mov->resolution==1)
                              {
                                $text= ' SD';}
                              elseif($mov->resolution==2)
                              {
                                $text= ' HDCam';}
                              elseif($mov->resolution==3)
                              {
                                $text= ' Cam';}
                              elseif($mov->resolution==4)
                              {
                                $text= ' FullHD';}
                                else{
                                  $text='Trailer';}
            $output='
            <div class="item ">
               <a href="'.url('phim/'.$mov->slug).'" title="'.$mov->title.'">
                  <div class="item-link">
                     <img src="'.url('uploads/movie/'.$mov->image).'" class="lazy post-thumb"
                      alt="'.$mov->title.'"
                       title="'.$mov->title.'" />
                     <span class="is_trailer">
                      '.$text.'
                     </span>
                  </div>
                  <p class="title">'.$mov->title.'</p>
               </a>
               <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
               <div style="float: left;">';
               for($count=1; $count<=5; $count++){
                $output.='  <ul class="list-inline rating"  title="Average Rating">
                <li title="star_rating"
                class="rating"
                style="cursor:pointer;
                font-size:20px;color:#ffcc00;">&#9733;</li>
                </ul>';}
                $output.=' </div>';
         '</div>';
       }
       echo $output;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $list_genre=Genre::all();
        $country = Country::pluck('title','id');
        return view('admincp.movie.form', compact('category','genre','country','list_genre'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $data = $request->all();
        $data=request()->validate(
          ['title'=> 'required|unique:movies|max:255',
          'sotap'=> 'required|integer',
          'thoiluong'=> 'required|integer',
          'slug'=> 'required|unique:movies|max:255',
          'trailer'=> 'required|max:255',
          'tags'=> 'required|max:255',
          'phude'=> 'required',
          'resolution'=> 'required',
          'name_eng'=> 'required|max:255',
          'phim_hot'=> 'required',
          'description'=> 'required|max:255',
          'status'=> 'required',
          'category_id'=> 'required',
          'genre'=> 'required',
          'country_id'=> 'required',

          'image'=> 'required|image|mimes:jpg,png,jpeg,gif,svg|max:100000|dimensions:min_width=100,min_height:100,max_width=2000,max_height:2000',
          ]
        );

        $movie = new Movie();
        $movie->title = $data['title'];
        $movie->sotap = $data['sotap'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->slug = $data['slug'];
        $movie->trailer = $data['trailer'];
        $movie->tags = $data['tags'];
        $movie->phude = $data['phude'];
        $movie->resolution = $data['resolution'];
        $movie->name_eng = $data['name_eng'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        $movie->count_view =rand(100,99999);

        $movie->country_id = $data['country_id'];
        $movie->ngaytao=Carbon::now('Asia/Ho_Chi_Minh');
        $movie->ngaycapnhat=Carbon::now('Asia/Ho_Chi_Minh');
        foreach($data['genre'] as  $key => $gen){
          $movie->genre_id = $gen[0];
        }

        $get_image = $request->file('image');

        if($get_image){

            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/',$new_image);
            $movie->image = $new_image;
        }
        $movie->save();
        $movie->movie_genre()->attach($data['genre']);
        toastr()->info('Thành Công','Thêm Thành Công.');
        return redirect()->route('movie.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::pluck('title','id');
        $genre = Genre::pluck('title','id');
        $country = Country::pluck('title','id');
        $list_genre=Genre::all();

        $movie =  Movie::find($id);
        $movie_genre = $movie->movie_genre  ;

        return view('admincp.movie.form', compact('category','genre','country','movie','list_genre','movie_genre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $movie = Movie::find($id);
        $movie->title = $data['title'];
        $movie->sotap = $data['sotap'];
        $movie->thoiluong = $data['thoiluong'];
        $movie->trailer = $data['trailer'];
        $movie->resolution = $data['resolution'];
        $movie->phude = $data['phude'];
        $movie->slug = $data['slug'];
        $movie->tags = $data['tags'];
        $movie->name_eng = $data['name_eng'];
        $movie->phim_hot = $data['phim_hot'];
        $movie->description = $data['description'];
        $movie->status = $data['status'];
        $movie->category_id = $data['category_id'];
        // $movie->count_view =rand(100,99999);
        $movie->country_id = $data['country_id'];
        $movie->ngaycapnhat=Carbon::now('Asia/Ho_Chi_Minh');
        foreach($data['genre'] as  $key => $gen){
          $movie->genre_id = $gen[0];
        }

        $get_image = $request->file('image');

        if($get_image){
            if(file_exists('uploads/movie/'.$movie->image)){
                unlink('uploads/movie/'.$movie->image);
            }else{
            $get_name_image = $get_image->getClientOriginalName();
            // $name_image = pathinfo($get_name_image, PATHINFO_FILENAME);
            // $new_image = $name_image . '_' . time() . '.' . $get_image->getClientOriginalExtension();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,9999).'.'.$get_image->getClientOriginalExtension();
            $get_image->move('uploads/movie/',$new_image);
            $movie->image = $new_image;}
        }
        $movie->save();
        $movie->movie_genre()->sync($data['genre']);
        toastr()->info('Thành Công','Cập nhật Thành Công.');
        return redirect()->route('movie.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $movie = Movie::find($id);
        if(file_exists('uploads/movie/'.$movie->image)){
            unlink('uploads/movie/'.$movie->image);
        }
        Movie_Genre::whereIn('movie_id',[$movie->id])->delete();
        Episode::whereIn('movie_id',[$movie->id])->delete();
        $movie->delete();
        toastr()->info('Thành Công','Xóa Thành Công.');
        return redirect()->back();
    }
}
