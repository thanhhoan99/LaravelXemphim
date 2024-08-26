<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Movie;
use App\Models\Category;
use App\Models\Genre;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Movie_Genre;
use Carbon\Carbon;
use App\Models\Rating;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

class CreateSiteMap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sitemap=App::make('sitemap');
        $sitemap->add(route('homepage'),Carbon::now('Asia/Ho_Chi_Minh'),'1.0','daily');


        $genre=Genre::orderBy('id','DESC')->get();
        foreach($genre as $gen){
            $sitemap->add(env('APP_URL')."/the-loai/{$gen->slug}",Carbon::now('Asia/Ho_Chi_Minh'),'0.7','daily');
        }

        $category=Category::orderBy('id','DESC')->get();
        foreach($category as $cate){
            $sitemap->add(env('APP_URL')."/danh-muc/{$cate->slug}",Carbon::now('Asia/Ho_Chi_Minh'),'0.7','daily');
        }


        $country=Country::orderBy('id','DESC')->get();
        foreach($country as $cou){
            $sitemap->add(env('APP_URL')."/quac-gia/{$cou->slug}",Carbon::now('Asia/Ho_Chi_Minh'),'0.7','daily');
        }


        $movie=Movie::orderBy('id','DESC')->get();
        foreach($movie as $movi){
            $sitemap->add(env('APP_URL')."/phim/{$movi->slug}",Carbon::now('Asia/Ho_Chi_Minh'),'0.6','daily');
        }


        $movie_ep=Movie::orderBy('id','DESC')->get();
        $episode = Episode::all();
        foreach($movie_ep as $movi_ep){
            foreach($episode as $episode_ep){
                if($movi_ep->id == $episode_ep->movie_id){
                    $sitemap->add(env('APP_URL')."/xem-phim/{$movi_ep->slug}/tap-{$episode_ep->episode}",Carbon::now('Asia/Ho_Chi_Minh'),'0.6','daily');
                }
            }
        }


        $years=range(Carbon::now('Asia/Ho_Chi_Minh')->year,2000);
        foreach($years as $year){
            $sitemap->add(env('APP_URL')."/nam/{$year}",Carbon::now('Asia/Ho_Chi_Minh'),'0.6','daily');
        }

        $sitemap->store('xml','sitemap');
        if(File::exists(public_path().'/sitemap.xml')){
        File::copy(public_path('sitemap.xml'),base_path('sitemap.xml'));
    }
   }
}
