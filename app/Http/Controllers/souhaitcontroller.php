<?php

namespace App\Http\Controllers;

use App\Models\produit;
use App\Models\souhait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class souhaitcontroller extends Controller
{
   public function addtosouhait(Request $request){
       $id_prod=$request->input('id_prod');
      if(Auth::check()){
        if(produit::where('id',$id_prod)->exists()){
            $souhait=new souhait();
            $souhait->id_prod=$id_prod;
            $souhait->qts=1;
            $souhait->id_user=Auth::id();
            $souhait->save();
            return response()->json(['status'=>"produit ajouté dans la liste des souhaits"]);
        }else{
         return response()->json(['status'=>"desole,ce produit n'existe pas pour le moment !!!!"]);
 
        }
      }else{
        return response()->json(['status'=>"veillles vous connecter pour ajouter le produit!!!!"]);
          
      }

   }
}
