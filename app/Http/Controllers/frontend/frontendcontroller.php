<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\categorie;
use App\Models\panier;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class frontendcontroller extends Controller
{
    public function index(){
        $produit=produit::all();
        $categoriet=categorie::where('status',1)->get();
        return view('frontend.index',compact('produit','categoriet'));
    }


    public function enregistrement_catalog(Request $request){
        $id_prod=$request->input('id_prod');
        $quantite=1;
       $f= $request->input('qts');
        $produit_voulu=produit::where('id',$id_prod)->first();
        if($produit_voulu){
            if(panier::where('id_prod',$id_prod)->where('id_user',Auth::id())->first()){
                return response()->json(['status'=>'Ce produit existe deja dans le panier !!!']);

            }else{
                $panier=new panier();
                $panier->id_prod=$id_prod;
                $panier->id_user=Auth::id();
                $panier->qts=$f;
                $panier->save();
                return response()->json(['status'=>'Produit ajouté avec succes !!!']);
            }

        }else{
            return response()->json(['status'=>"desole,ce produit n'est pas disponible pour le moment !!!"]);

        }



}
public function mycart(){
   return view('frontend.panier.item');
}

public function filtrecategorie($id){
    if(categorie::where('id',$id)->exists()){
        $categorien=categorie::where('id',$id)->first();
        $produit=produit::where('carte_id',$categorien->id)->get();
        return view('frontend.listeproduit',compact('produit','categorien'));

    }else{
        return back()->with('status',"cette categorie n'est pas disponible pour le momment !!!");
    }

}

public function description($categorie,$produit){
    if(categorie::where('id',$categorie)->exists()){
        if(produit::where('id',$produit)->exists()){
         $produits=produit::where('id',$produit)->first();
         return view('frontend.description',compact('produits'));
        }else{
            return back()->with('status',"le produit n'est pas disponible pour le moment !!!");
        }
    }else{
        return back()->with('status',"la categorie n'est plus disponible !!!");

    }

}

public function updatecat(Request $request){
    $idprod=$request->input('id_prod');
    $qts=$request->input('qts');
   if(Auth::check()){
    if(panier::where('id_prod',$idprod)->where('id_user',Auth::id())->exists()){
        $panier=panier::where('id_prod',$idprod)->where('id_user',Auth::id())->first();
        $panier->qts=$qts;
        $panier->update();
        return response()->json(['status'=>"la quantité est modifier avec success"]);
    }else{
        return response()->json(['status'=>"le produit n'existe pas"]);

    }
   }else{
    return response()->json(['status'=>" veillez vous connecter"]);

   }
}

public function supprimerproduit(Request $request){
    $idprod=$request->input('id_prod');
    if(panier::where('id_prod',$idprod)->where('id_user',Auth::id())->exists()){
        $panier=panier::where('id_prod',$idprod)->where('id_user',Auth::id())->first();
        $panier->delete();
        return response()->json(['status'=>"le produit est retirer du panier avec success"]);


    }else{
        return response()->json(['status'=>"Erreur lors de la suppression,veillez reesaayer"]);

    }
}

}

