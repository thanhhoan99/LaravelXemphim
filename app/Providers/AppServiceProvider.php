<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Info;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Movie;
use App\Models\Episode;
use App\Models\Rating;
use App\Models\Movie_Genre;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $phimhot_sidebar = Movie::where('phim_hot',1)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(5)->get();
        $phimhot_trailer = Movie::where('resolution',5)->where('status',1)->orderBy('ngaycapnhat','DESC')->take(5)->get();
        $category = Category::orderBy('position','ASC')->where('status',1)->get();
        $genre = Genre::orderBy('id','DESC')->get();
        $country = Country::orderBy('id','DESC')->get();

        //thong ke admin
        $category_total = Category::all()->count();
        $genre_total = Genre::all()->count();
        $country_total = Country::all()->count();
        $movie_total = Movie::all()->count();

        $info =Info::find(2);

        View::share([
            'category_total'=>$category_total,
            'genre_total'=>$genre_total,
            'country_total'=>$country_total,
            'movie_total'=>$movie_total,

            'info'=>$info,
            'phimhot'=>$info,
            'phimhot_sidebar'=>$phimhot_sidebar,
            'phimhot_trailer'=>$phimhot_trailer,
            'country_home'=>$country,
            'genre_home'=>$genre,
            'category_home'=>$category
        ]);
        
    }
}
