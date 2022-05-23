<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class categoriecontroller extends Controller
{
    public function insert(Request $request){
        $categorie=new categorie();
        $categorie->name=$request->input('name');
        $categorie->description=$request->input('description');
        $categorie->slug=$request->input('slug');
        $categorie->status=$request->input('status')==TRUE ? '1':'0';
        $categorie->popular=$request->input('popular')==TRUE ? '1':'0';
        $categorie->meta_description=$request->input('meta_description');
        $categorie->meta_keywords=$request->input('meta_keywords');
        $categorie->meta_title=$request->input('slug');

        if($request->hasFile(('images'))){
            $file=$request->file('images');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('images/categories/',$filename);

            $categorie->images=$filename;
        }
        $categorie->save();
        return back()->with('statut','la categorie est a ete ajoutee avec success');
    
    }
    public function form(){
        return view('Admin.categorie.add');
    }

    public function showcategorie(){
        return view('Admin.categorie.table');
    }

    public function editercategorie($id){
        $verifier=categorie::where('id',$id)->first();
        if($verifier){
            return view('Admin.categorie.editer',compact("verifier"));
        }else{
            return redirect('/');
        }
    }

    public function update(Request $request,$id){
       
        $categorie=categorie::where('id',$id)->first();
        if($request->hasFile('images')){
            $path='images/categories/'.$categorie->images;
             if(File::exists($path)){
                 File::delete($path);

             }
            $file=$request->file('images');
            $ext=$file->getClientOriginalExtension();
            $filename=time().'.'.$ext;
            $file->move('images/categories/',$filename);
            $categorie->images=$filename;

        }
        $categorie->name=$request->input('name');
        $categorie->description=$request->input('description');
        $categorie->slug=$request->input('slug');
        $categorie->status=$request->input('status')==TRUE ? '1':'0';
        $categorie->popular=$request->input('popular')==TRUE ? '1':'0';
        $categorie->meta_description=$request->input('meta_description');
        $categorie->meta_keywords=$request->input('meta_keywords');
        $categorie->meta_title=$request->input('slug'); 
        $categorie->update();
        return redirect('showcategorie');
    }

    public function deletecategorie($id){
        $categorie=categorie::find($id);
      if($categorie->images){
        $path='images/categories/'.$categorie->images;
        if(File::exists($path)){
            File::delete($path);

        }
      }
        $categorie->delete();
        return back()->with('status','la categorie a ete supprimer avec success');

    }
}
