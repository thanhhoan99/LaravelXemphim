<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Rating;
use App\Models\Movie_Genre;
use App\Models\Info;
use Illuminate\Support\Facades\DB;


class IndexController extends Controller
{
    public function locphim(){
        $sapxep = $_GET['order'];
        $genre_get = $_GET['genre'];
        $country_get = $_GET['country'];
        $year_get = $_GET['year'];

        if($sapxep=='' && $country_get=='' && $year_get=='' && $genre_get==''){
            return redirect()->back();
        }else{
             $category = Category::orderBy('position','ASC')->where('status',1)->get();
            $genre = Genre::orderBy('id','DESC')->get();
            $country = Country::orderBy('id','DESC')->get();
            $phimhot_sidebar = Movie::withCount('episode')->where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(20)->get();
            $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();

            // $movie = Movie::withCount('episode')->orwhere('country_id',$country_get)->orwhere('year',$year_get)->orwhere('genre_id',$genre_get)->orderBy('ngaycapnhat','DESC')->paginate(40);
            // $category = Category::orderBy('position','ASC')->where('status',1)->get();
            // $genre = Genre::orderBy('id','DESC')->get();
            // $country = Country::orderBy('id','DESC')->get();
            // $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(20)->get();
            // $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();


            $movie=Movie::withCount('episode');
            if($genre_get){
                $movie=$movie->where('genre_id','=',$genre_get);
            }elseif($country_get){
                $movie=$movie->where('country_id','=',$country_get);
            }elseif($year_get){
                $movie=$movie->where('year','=',$year_get);
            }elseif($country_get && $genre_get ){
                $movie=$movie->where('country_id','=',$country_get)->where('genre_id','=',$genre_get);
            }

            $movie=$movie->orderBy('ngaycapnhat','DESC')->paginate(40);
            return view('pages.locphim', compact('category','genre','country','movie','phimhot_sidebar','phimhot_trailer'));
        }
    }
    public function timkiem(){
        if(isset($_GET['search'])){
            $search = $_GET['search'];
            $category = Category::orderBy('position','ASC')->where('status',1)->get();
            $genre = Genre::orderBy('id','DESC')->get();
            $country = Country::orderBy('id','DESC')->get();
            $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(20)->get();
            $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();

            $movie = Movie::where('title','LIKE','%'.$search.'%')->orderBy('ngaycapnhat','DESC')->paginate(40);
            return view('pages.timkiem', compact('category','genre','country','search','movie','phimhot_sidebar','phimhot_trailer'));
        }else{
            return redirect()->to('/');
        }
    }
    public function home(){

        $phimhot = Movie::withCount('episode')->where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(10)->get();
       
        $category_home = Category::with(['movie'=>function($q){$q->withCount('episode')->where('status',1);}])->orderBy('id','DESC')->where('status',1)->get();
    	return view('pages.home', compact('category_home','phimhot'));
    }
    public function category($slug){
        $cate_slug = Category::where('slug',$slug)->first();
        $movie = Movie::withCount('episode')->where('category_id',$cate_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(8);
    	return view('pages.category', compact('cate_slug','movie'));
    }
    public function year($year){
        $year = $year ;
        $movie = Movie::where('year',$year)->orderBy('ngaycapnhat','DESC')->paginate(40);
    	return view('pages.year', compact('year','movie'));
    }
    public function tag($tag){
        $tag = $tag ;
        $movie = Movie::where('tags','LIKE','%'.$tag.'%')->orderBy('ngaycapnhat','DESC')->paginate(40);
    	return view('pages.tag', compact('tag','movie'));
    }
    public function genre($slug){
        $genre_slug = Genre::where('slug',$slug)->first();

        $movie_genre=Movie_Genre::where('genre_id',$genre_slug->id)->get();
        $many_genre=[];
        foreach($movie_genre as $key=>$movi){
            $many_genre[]=$movi->movie_id;
        }

        $movie = Movie::withCount('episode')->whereIn('id',$many_genre)->orderBy('ngaycapnhat','DESC')->paginate(40);
    	return view('pages.genre', compact('genre_slug','movie'));
    }
    public function country($slug){
        $country_slug = Country::where('slug',$slug)->first();
        $movie = Movie::where('country_id',$country_slug->id)->orderBy('ngaycapnhat','DESC')->paginate(40);
    	return view('pages.country', compact('country_slug','movie'));
    }
    public function movie($slug){
        
        $movie = Movie::with('category','genre','country','movie_genre')->where('slug',$slug)->where('status',1)->first();
        $related = Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        $episode_tapdau = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','ASC')->take(1)->first();
        //lay 4phim mới
        $episode = Episode::with('movie')->where('movie_id',$movie->id)->orderBy('episode','DESC')->take(4)->get();
        //lấy toàn bộ soo tappj phim
        $episode_curren_list = Episode::with('movie')->where('movie_id',$movie->id)->get();
        $episode_curren_list_count =$episode_curren_list->count();

        $rating=Rating::where('movie_id',$movie->id)->avg('rating');
        $rating=round($rating);
        $count_total=Rating::where('movie_id',$movie->id)->count();
        return view('pages.movie', compact('movie','related','episode','episode_tapdau','episode_curren_list_count','rating','count_total'));
    }
    public function add_rating(Request $request){
        $data=$request->all();
        $ip_address=$request->ip();
        $rating_count=Rating::where('movie_id',$data['movie_id'])->where('ip_address',$ip_address)->count();
        if($rating_count>0){
            echo 'exist';
        }else{
            $rating=new Rating();
            $rating->movie_id=$data['movie_id'];
            $rating->rating =$data['index'];
            $rating->ip_address=$ip_address;
            $rating->save();
            echo 'done';

        }
    }
    public function watch($slug,$tap){

        $tapphim=substr($tap,4,1);
        $movie = Movie::with('category','genre','country','episode','movie_genre')->where('slug',$slug)->where('status',1)->first();
        $related=Movie::with('category','genre','country')->where('category_id',$movie->category->id)->orderBy(DB::raw('RAND()'))->whereNotIn('slug',[$slug])->get();
        if(isset($tap)){
            $tapphim=$tap;
            $tapphim=substr($tap,4,1);
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }else{
            $tapphim=1;
            $episode = Episode::where('movie_id',$movie->id)->where('episode',$tapphim)->first();
        }

    	return view('pages.watch', compact('movie','episode','tapphim','related'));
    }
    public function episode(){
    	return view('pages.episode');
    }
}
