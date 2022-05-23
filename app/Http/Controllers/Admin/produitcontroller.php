<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\produit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class produitcontroller extends Controller
{
   public function insert(Request $request){
       $product=new produit();
       $product->carte_id=$request->input('categorie');
       $product->name=$request->input('name');
       $product->slug=$request->input('title');
       $product->small_description=$request->input('small_description');
       $product->description=$request->input('description');
       $product->Original_price=$request->input('original_price');
       $product->selling_price=$request->input('selling_price');
       $product->qty=$request->input('qty');
       $product->tax=$request->input('tax');
       $product->status=$request->input('status')==TRUE ? '1' :'0';
       $product->trending=$request->input('trending')==TRUE ? '1' :'0';
       $product->meta_title=$request->input('meta_title');
       $product->meta_keywords=$request->input('meta_keywords');
       $product->meta_description=$request->input('meta_description');
       if($request->hasFile(('image'))){
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename=time().'.'.$ext;
        $file->move('images/produits/',$filename);

        $product->image=$filename;
    }
    $product->save();
   }
   public function form(){
       return view('Admin.produit.add');
   }

   public function edite($id){
       $produit=produit::find($id);
       return view('Admin.produit.edite',compact("produit"));
   }

   public function showproduit(){
    $produit=produit::all();
    return view('Admin.produit.table',compact("produit"));
}

public function update(Request $request,$id){
    $product=produit::find($id);
    if($request->hasFile('image')){
        $path='images/produits/';
        if(File::exists($path)){
            File::delete($path);
        }
        $file=$request->file('image');
        $ext=$file->getClientOriginalExtension();
        $filename=time().'.'.$ext;
        $file->move('images/produits/',$filename);

        $product->image=$filename;
    }
    $product->carte_id=$request->input('categorie');
    $product->name=$request->input('name');
    $product->slug=$request->input('title');
    $product->small_description=$request->input('small_description');
    $product->description=$request->input('description');
    $product->Original_price=$request->input('original_price');
    $product->selling_price=$request->input('selling_price');
    $product->qty=$request->input('qty');
    $product->tax=$request->input('tax');
    $product->status=$request->input('status')==TRUE ? '1' :'0';
    $product->trending=$request->input('trending')==TRUE ? '1' :'0';
    $product->meta_title=$request->input('meta_title');
    $product->meta_keywords=$request->input('meta_keywords');
    $product->meta_description=$request->input('meta_description');
    $product->update();
    return redirect('showproduit')->with('status','le produit est modifier avec success');
}

}
