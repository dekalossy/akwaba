<?php 

namespace App;

class Cart{

    public $items = null;
    public $totalQte = 0;
    public $totalPrix =0;

    public function __construct($oldCart){
        if($oldCart){
            $this->items = $oldCart->items;
            $this->totalQte = $oldCart->totalQte;
            $this->totalPrix = $oldCart->totalPrix;
        }
    }


    public function add($item, $ID_ARTICLE){
        $storedItem = ['qte'=>0,
                        'id_produit'=>0,
                        'nom_produit'=>$item->NOM_ARTICLE,
                        'prix_produit'=>$item->PRIX_HT_ARTICLE, 
                        'image'=>$item->IMAGE, 
                        'item'=>$item];

        if($this->items){
            if(array_key_exists($ID_ARTICLE, $this->items)){
                $storedItem = $this->items[$ID_ARTICLE];
            }
        }

        $storedItem['qte']++;
        $storedItem['id_produit'] = $ID_ARTICLE;
        $storedItem['nom_produit'] = $item->NOM_ARTICLE;
        $storedItem['prix_produit'] = $item->PRIX_HT_ARTICLE;
        $storedItem['image'] = $item->IMAGE;
        $this->totalQte ++;
        $this->totalPrix += $item->PRIX_HT_ARTICLE;
        $this->items[$ID_ARTICLE] = $storedItem; 

    }



    
    public function updateQte($id, $qte){
        $this->totalQte -= $this->items[$id]['qte'];
        $this->totalPrix -= $this->items[$id]['prix_produit'] * $this->items[$id]['qte'];
        $this->items[$id]['qte'] = $qte;
        $this->totalQte += $qte;
        
        $this->totalPrix  += $this->items[$id]['prix_produit'] * $qte;
    }




    public function removeItem($id){
        $this->totalQte -= $this->items[$id]['qte'];
        $this->totalPrix -= $this->items[$id]['prix_produit'] * $this->items[$id]['qte'];
        unset($this->items[$id]);

    }


}

?>