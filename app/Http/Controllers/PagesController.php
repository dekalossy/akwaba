<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Categorie;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Cart;

class PagesController extends Controller
{
    


    public function accueil()
    {
        $categories = Categorie::all();
        $sliders = Slider::all()->where('STATUS', 1);
        $articles = Article::all()->where('STATUS', 1);

        return view('client.accueil')
        ->with('categories', $categories)
        ->with('sliders', $sliders)
        ->with('articles', $articles);
    }


    public function shop()
    {
        $categories = Categorie::all();
        $sliders = Slider::all()->where('STATUS', 1);
        $articles = Article::all()->where('STATUS', 1);

        return view('client.shop')
        ->with('categories', $categories)
        ->with('sliders', $sliders)
        ->with('articles', $articles);
        
    }


    public function shopcategorie($categ)
    {
        $categories = Categorie::all();
        $sliders = Slider::all()->where('STATUS', 1);
        $articles = Article::all()->where('STATUS', 1)->where('CATEGORIE_ARTICLE', $categ);

       // return view('client.shopcategorie')
       return view('client.shop')
        ->with('categories', $categories)
        ->with('sliders', $sliders)
        ->with('articles', $articles);
        
    }





    public function blog()
    {
        // return view('welcome');

        return view('client.blog');
    }

    public function forminscription()
    {
        // return view('welcome');

        return view('client.forminscription');
    }


    public function formconnexion()
    {
        // return view('welcome');

        return view('client.formconnexion');
    }

    

  

    
}
