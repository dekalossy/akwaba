<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use App\Models\Article;
use Illuminate\Support\Facades\Session;




class PanierController extends Controller
{
    
    public function ajouterAuPanier($id)
    {
        $article = Article::find($id);

        $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);
        $cart->add($article, $id);
        Session::put('cart', $cart);

       // dd($cart);

       // return redirect('/shop');

       return back();

    }


    public function modifierQuantite(Request $request, int $id)
    {
        $panier  = Session::get('cart');
        $qte = $request->quantite;
        $panier->updateQte($id, $qte );


        $cart = new Cart($panier);
        Session::put('cart', $cart);

        return view('client.panier')->with('panier', $panier);
    }


    public function enleverDuPanier(int $id)
    {
        $panier  = Session::has('cart') ? Session::get('cart') : null;
        $panier->removeItem($id);

        $cart = new Cart($panier);

            if(count($cart->items) > 0){
                Session::put('cart', $cart);
            }else{
                Session::forget('cart');
            }
            

            return view('client.panier')->with('panier', $panier);

    }



    public function panier()
    {
        if(!Session::has('cart')){
            return back();
        }

    /*    $oldCart = Session::has('cart') ? Session::get('cart') : null;
        $cart = new Cart($oldCart);  */
        $panier  = Session::has('cart') ? Session::get('cart') : null;

     //   dd($panier->totalPrix);

        return view('client.panier')->with('panier', $panier);
    }







    public function paiement()
    {
        if(!Session::has('client')){

            return redirect('/formconnexion');
        }

        return view('client.paiement');
    }

}
