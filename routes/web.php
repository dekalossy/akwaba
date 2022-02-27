<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PanierController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*Route::view('/', 'client.accueil');*/
Route::get('/', [PagesController::class, 'accueil'])->name('accueil'); 
Route::get('/shop', [PagesController::class, 'shop'])->name('shop');
Route::get('/shop/{categ}', [PagesController::class, 'shopcategorie'])->name('shopcategorie');
Route::get('/blog', [PagesController::class, 'blog']);
Route::get('/forminscription', [PagesController::class, 'forminscription']);
Route::get('/formconnexion', [PagesController::class, 'formconnexion']);

Route::get('/paiement', [PanierController::class, 'paiement']);

/******************************* Routes admin************************* */
/*****SLIDERS */
Route::get('/admin', [AdminController::class, 'admin'])->name('admin');
Route::view('/form_slider', 'admin.formslider')->name('formSlider');
Route::post('/create_slider', [AdminController::class, 'creerSlider']);
Route::get('/editer_slider/{id}', [AdminController::class, 'editerSlider']);/****-affiche formulaire pour modification-- */
Route::post('/modifier_slider/{id}', [AdminController::class, 'modifierSlider']);
Route::get('/liste_slider', [AdminController::class, 'listeSlider'])->name('listeSlider');
Route::get('/supprimer_slider/{id}', [AdminController::class, 'supprimerSlider']);

Route::get('/activationslider/{id}', [AdminController::class, 'activerSlider']);
Route::get('/desactivationslider/{id}', [AdminController::class, 'desactiverSlider']);




/****CATEGORIES */
Route::view('/ajout_categorie', 'admin.formCategorie')->name('formCategorie'); 
Route::post('/create_categorie', [AdminController::class, 'creerCategorie']);
Route::get('/liste_categorie', [AdminController::class, 'listeCategorie']);
Route::get('/editer_categorie/{id}', [AdminController::class, 'editerCategorie']); /****-affiche formulaire pour modification-- */
Route::post('/modifier_categorie/{id}', [AdminController::class, 'modifierCategorie']);
Route::get('/supprimer_categorie/{id}', [AdminController::class, 'supprimerCategorie']); 




/**Articles */
Route::get('/form_article', [AdminController::class, 'formArticle'])->name('formArticle');
Route::post('/create_article', [AdminController::class, 'creerArticle']);
Route::get('/liste_article', [AdminController::class, 'listeArticle'])->name('listeArticle');
Route::get('/editer_article/{id}', [AdminController::class, 'editerArticle']);/****-affiche formulaire pour modification-- */
Route::post('/modifier_article/{id}', [AdminController::class, 'modifierArticle']);
Route::get('/supprimer_article/{id}', [AdminController::class, 'supprimerArticle']);
/* Route::get('/activation/{id}', [AdminController::class, 'activerStatus']);
Route::get('/desactivation/{id}', [AdminController::class, 'desactiverStatus']);  remplacés par la ligne suivante*/

Route::get('/article/{action}/{id}', [AdminController::class, 'actionArticle'])->name('actionArticle');



/******************************* Routes PANIER************************* */

Route::get('ajouter_au_panier/{id}', [PanierController::class, 'ajouterAuPanier'])->name('ajouterAuPanier');
Route::get('/panier', [PanierController::class, 'panier']);
Route::post('/modifier_quantite/{id}', [PanierController::class, 'modifierQuantite'])->name('modifierQuantite');
Route::get('/enlever_du_panier/{id}', [PanierController::class, 'enleverDuPanier'])->name('enleverDuPanier');