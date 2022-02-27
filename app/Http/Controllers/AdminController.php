<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categorie;
use App\Models\Article;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{




    
    public function admin()
    {
        // return view('welcome');

        return view('admin.tableaudebord');
        
    }


  


    /*******GESTION DES CATEGORIES  ****************/
    /***********************************************/

    public function creerCategorie(Request $request)
    {
        
        Request()->validate([                       //Validation des entrées
            'nom_categorie'=>['required', 'unique:categories', 'min:5'],
        ]);

        $categorie = new Categorie();
        $categorie->NOM_CATEGORIE = $request->nom_categorie;
        $categorie->save();
        session::put('succes', 'La nouvelle catégorie "'.$request->nom_categorie.'" a été ajoutée avec succès');
        return redirect('/ajout_categorie');
    }


    public function listeCategorie()
    {
        $categories = Categorie::All();
        return view('admin.listecategorie')->with('categories', $categories);
    }


    public function editerCategorie($id)
    {
        $categorie = Categorie::find($id);
        return view('admin.editercategorie')->with('categorie', $categorie);
    }
    

    public function modifierCategorie(Request $request, $id)
    {
        
        Request()->validate([                       //Validation des entrées
            'nom_categorie'=>['required', 'unique:categories', 'min:5'],
        ]);
        $categorie = Categorie::find($id);
        $categorie->NOM_CATEGORIE = $request->nom_categorie;
        $categorie->update();
     //   session::put('succes', 'Le nouveau nom de la catégorie est "'.$request->nom_categorie.'". Modification réussie.');

        return redirect('/liste_categorie')->with('succes', 'Le nouveau nom de la catégorie est "<i><b>'.$request->nom_categorie.'</b></i>". Modification réussie.');
    }


    public function supprimerCategorie($id)
    {
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect('/liste_categorie')->with('succes', 'La catégorie  "<i><b>'.$categorie->NOM_CATEGORIE.'</b></i>" a été supprimée.');
    }
  




    /****************GESTION DES ARTICLES  *********************/
    /************************************************************/


    public function formArticle()
    {
        $categories = Categorie::All();
        
        return view('admin.formarticle')->with('categories', $categories);

    }


    public function creerArticle(Request $request)
    {
      
        Request()->validate([                       //Validation des entrées
            'nom_article'=>['required', 'unique:articles', 'min:3'],
            'prix_ht_article'=>['required', 'min:2'],
            'description_article'=>['required', 'min:20', 'max:1000'],
            'image'=>['nullable', 'max:1999'],
        ]);

        if($request->hasFile('image')){
            $nomFichierAvecExt = $request->file('image')->getClientOriginalName(); // obtenir le nom original du fichier uploadé
            $nomFichier = pathinfo($nomFichierAvecExt, PATHINFO_FILENAME);    // nom du fichier sans l'extension
            $ext = $request->file('image')->getClientOriginalExtension();  // ext du fichier
            $nomFichierAinserer = $nomFichier.'_'.time().'.'.$ext;               // nom+date+extension
            $path=$request->file('image')->storeAs('public/images_articles', $nomFichierAinserer);
                    /***la fonction storeAs crée dossier images_articles dans storage/public si elle n'existe pas deja et y place les images */

        }else{
            $nomFichierAinserer = 'noImage.jpg';
        }

        $ref = rand(100000,999999);
        $ref = (substr($request->nom_article, 0, 3)).'_'.$ref;

    //    dd($ref);

        $article = new Article();
        $article->NOM_ARTICLE = $request->nom_article;
        $article->CATEGORIE_ARTICLE = $request->categorie_article;
        $article->PRIX_HT_ARTICLE = $request->prix_ht_article;
        $article->DESCRIPTION = $request->description_article;
        $article->STATUS = 1;
        $article->REF_ARTICLE = $ref;
        $article->IMAGE = $nomFichierAinserer;

        $article->save();
     
        return redirect('/form_article')->with('succes', 'Le nouvel article "'.$request->nom_article.'" a été ajouté avec succès');

    }


    public function listeArticle()
    {
        $articles = Article::All();

        return view('admin.listearticle')->with('articles', $articles);
    }


    public function editerArticle(int $id)
    {
        $categories = Categorie::All();
        $article = Article::find($id);

        return view('admin.editerarticle')->with('article', $article)->with('categories', $categories);

    }

    public function modifierArticle(Request $request, int $id)
    {
        Request()->validate([                       //Validation des entrées
            'nom_article'=>['required', 'min:3'],
            'prix_ht_article'=>['required', 'min:3'],
            'description_article'=>['required', 'min:30', 'max:1000'],
            'image'=>['nullable', 'max:1999'],
        ]);

        $ref = rand(100000,999999);
        $ref = (substr($request->nom_article, 0, 3)).'_'.$ref;

        $article = Article::find($id);
        $article->NOM_ARTICLE = $request->nom_article;
        $article->CATEGORIE_ARTICLE = $request->categorie_article;
        $article->PRIX_HT_ARTICLE = $request->prix_ht_article;
        $article->DESCRIPTION = $request->description_article;
        $article->REF_ARTICLE = $ref;



        if($request->hasFile('image')){
            $nomFichierAvecExt = $request->file('image')->getClientOriginalName(); // obtenir le nom original du fichier uploadé
            $nomFichier = pathinfo($nomFichierAvecExt, PATHINFO_FILENAME);    // nom du fichier sans l'extension
            $ext = $request->file('image')->getClientOriginalExtension();  // ext du fichier
            $nomFichierAinserer = $nomFichier.'_'.time().'.'.$ext;               // nom+date+extension
            $path=$request->file('image')->storeAs('public/images_articles', $nomFichierAinserer);

            if($article->IMAGE != 'noImage.jpg'){                           // on verifie sur l'image precedemment utilisé n'était pas l'image par défaut avant de le supprimer
                Storage::delete('public/images_articles/'.$article->IMAGE);
            }

            $article->IMAGE = $nomFichierAinserer;
        }


        $article->update();
        return redirect('/liste_article')->with('succes', 'L\'article "'.$request->nom_article.'" a été modifié avec succès');
    }



/*
    function activerStatus(int $id)
    {
        $article = Article::find($id);
        $article->STATUS = 1;
        $article->update();
        return redirect('/liste_article');
    }


    function desactiverStatus(int $id)
    {
        $article = Article::find($id);
        $article->STATUS = 0;
        $article->update();
        return redirect('/liste_article');
    }

*/


    public function actionArticle($action, $id)
    {
        $article = Article::find($id);

        if($action=='activer'){  $article->STATUS = 1;
           
        }else{ $article->STATUS = 0; }

        $article->update();
        return redirect('/liste_article');
    }



    public function supprimerArticle(int $id)
    {
        $article = Article::find($id);

        if($article->IMAGE != 'noImage.jpg'){
            Storage::delete('public/images_articles/'.$article->IMAGE);
        }

        $article->delete();

        return redirect('/admin.listearticle')->with('succes', 'L\'article  "<i><b>'.$article->NOM_ARTICLE.'</b></i>" a été supprimée.');
    }



    
    

    public function creerSlider(Request $request)
    {


        if($request->hasFile('image')){
            $nomFichierAvecExt = $request->file('image')->getClientOriginalName(); // obtenir le nom original du fichier uploadé
            $nomFichier = pathinfo($nomFichierAvecExt, PATHINFO_FILENAME);    // nom du fichier sans l'extension
            $ext = $request->file('image')->getClientOriginalExtension();  // ext du fichier
            $nomFichierAinserer = $nomFichier.'_'.time().'.'.$ext;               // nom+date+extension
            $path=$request->file('image')->storeAs('public/images_sliders', $nomFichierAinserer);
                    /***la fonction storeAs crée dossier images_articles dans storage/public si elle n'existe pas deja et y place les images */

        }else{
            $nomFichierAinserer = 'noSlide.jpg';
        }

        
        $slider = new Slider();
        $slider->DESCRIPTION_1 = $request->description1_slider;
        $slider->DESCRIPTION_2 = $request->description2_slider;
        $slider->STATUS = 1;
        $slider->IMAGE_SLIDER = $nomFichierAinserer;

        $slider->save();

        return redirect('/form_slider')->with('succes', 'Un nouveau slider article a été ajouté avec succès');

    }



    public function listeSlider()
    {
        $sliders = Slider::all();

        return view('admin.listeslider')->with('sliders', $sliders);
    }


    function activerSlider(int $id)
    {
        $slider = Slider::find($id);
        $slider->STATUS = 1;
        $slider->update();
        return redirect('/liste_slider');
    }


    function desactiverSlider(int $id)
    {
        $slider =  Slider::find($id);
        $slider->STATUS = 0;
        $slider->update();
        return redirect('/liste_slider');
    }


    public function editerSlider(int $id)
    {
        $slider = Slider::find($id);

        return view('admin.editerslider')->with('slider', $slider);
    }

    public function modifierSlider(Request $request, int $id)
    {
        $slider = Slider::find($id);
       

        $slider->DESCRIPTION_1 = $request->description1_slider;
        $slider->DESCRIPTION_2 = $request->description2_slider;
       
        if($request->hasFile('image')){
            $nomFichierAvecExt = $request->file('image')->getClientOriginalName(); // obtenir le nom original du fichier uploadé
            $nomFichier = pathinfo($nomFichierAvecExt, PATHINFO_FILENAME);    // nom du fichier sans l'extension
            $ext = $request->file('image')->getClientOriginalExtension();  // ext du fichier
            $nomFichierAinserer = $nomFichier.'_'.time().'.'.$ext;               // nom+date+extension
            $path=$request->file('image')->storeAs('public/images_sliders', $nomFichierAinserer);

            if($slider->IMAGE != 'noSlide.jpg'){
                Storage::delete('public/images_sliders/'.$slider->IMAGE);
            }

            $slider->IMAGE_SLIDER = $nomFichierAinserer;
        }

        $slider->update();
        
        return redirect('/liste_slider')->with('succes', 'Slider modifié avec succès.!');

    }



    public function supprimerSlider(int $id)
    {
        $slider = Slider::find($id);

        if($slider->IMAGE_SLIDER != 'noSlide.jpg'){
            Storage::delete('public/images_sliders/'.$slider->IMAGE_SLIDER);
        }

        $slider->delete();

        return redirect('/liste_slider')->with('succes', 'Slider supprimé avec succès.!');

    }

    

}
