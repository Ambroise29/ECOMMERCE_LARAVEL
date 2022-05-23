<?php

namespace App\Http\Controllers;

use App\Models\commande;
use App\Models\listeproduit;
use App\Models\panier;
use App\Models\produit;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class commandecontroller extends Controller
{
    public function formcmd(){
        return view('frontend.user.commande');
    }

    public function add(Request $request){
        $total=0;
        $commande=new commande();
        $commande->id_user=Auth::id();
        $commande->name = $request->input('name');
        $commande->prenom = $request->input('prenom');
        $commande->email = $request->input('email');
        $commande->telephone = $request->input('telephone');
        $commande->adresse1 = $request->input('adresse1');
        $commande->adresse2 = $request->input('adresse2');
        $commande->ville = $request->input('ville');
        $commande->quartier = $request->input('quartier');
        $commande->pays = $request->input('pays');
        $commande->code_postal = $request->input('code_postal');
        $commande->status =0;
        $panier=panier::where('id_user',Auth::id())->get();
        foreach($panier as $item){
        $total=$total+$item->produit->selling_price*$item->qts;
        }
        $commande->total = $total;
        $commande->tracking_no='AK'.'SX'.rand(1111,99999);
        $commande->save();

        foreach($panier as $itemp){
            listeproduit::create(['id_cmd'=>$commande->id,'id_user'=>Auth::id(),'qts'=>$itemp->qts,'id_prod'=>$itemp->produit->id]);

            // calcul de la quantite restante apres achat
          $prod=produit::where('id',$itemp->id_prod)->first();
          $prod->qty=$prod->qty-$itemp->qts;
          $prod->update();
          //fin
        }

        if($commande->addresse1==null){
            $user=User::where('id',Auth::id())->first();
            $user->name =$request->input('name');
            $user->prenom =$request->input('prenom');
            $user->email =$request->input('email');
            $user->adresse1 =$request->input('adresse1');
            $user->adresse2 =$request->input('adresse2');
            $user->ville =$request->input('ville');
            $user->quartier =$request->input('quartier');
            $user->telephone =$request->input('telephone');
            $user->pays =$request->input('pays');
            $user->code_postal =$request->input('code_postal');
            $user->update();

        }
          

       if(panier::where('id_user',Auth::id())->exists()){
           $effacer=panier::where('id_user',Auth::id());
           $effacer->delete();
       }

      return back()->with('status','votre commande a ete effectuee avec success');
    }
}
