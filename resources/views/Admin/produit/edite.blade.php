@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="text-center bg-danger text-white" style="padding: 10px">Mise a jour produit</h5>
        </div>
        <div class="card-body card shadow">
         <form method="post" action="{{url('update-produit/'.$produit->id)}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <select class="form-control" name="categorie">

                        @foreach($categorie as $itemcat)
                         <option value="{{$itemcat->id}}">{{$itemcat->name}}</option>
                      @endforeach
                      </select>
                </div>
                <div class="col-md-6">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control" placeholder="name" value="{{$produit->name}}">
                </div>
                <div class="col-md-6">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="name" value="{{$produit->slug}}">
                </div>
                <div class="col-md-12">
                    <label>small-description</label>
                    <textarea name="small_description" class="form-control" placeholder="description petit">{{$produit->small_description}}</textarea>
                </div>
                <div class="col-md-12">
                    <label>description</label>
                    <textarea name="description" class="form-control" placeholder="description petit">{{$produit->small_description}}</textarea>
                </div>
                <div class="col-md-6">
                    <label>Prix_normal</label>
                    <input type="text" name="original_price" class="form-control" placeholder="prix n" value="{{$produit->original_price}}">
                </div>
                <div class="col-md-6">
                    <label>Prix_reduit</label>
                    <input type="text" name="selling_price" class="form-control" placeholder="prix n" value="{{$produit->selling_price}}">
                </div>
                <div class="col-md-6">
                    <label>Status</label>
                    <input type="checkbox" name="status" {{$produit->status==1 ? 'checked' : ''}} class="form-controls" placeholder="prix n">
                </div>
                <div class="col-md-6">
                    <label>Treining</label>
                    <input type="checkbox" name="trending" {{$produit->trending==1 ? 'checked' : ''}} class="form-controls">
                </div>
                <div class="col-md-6">
                    <label>Qts</label>
                    <input type="text" name="qty" class="form-control" value="{{$produit->qty}}">
                </div>
                <div class="col-md-6 mb-3">
                    <label>Tax</label>
                    <input type="text" name="tax" class="form-control" value="{{$produit->tax}}">
                </div>

                <div class="col-md-12 mb-3">
                    <label>Meta-titre</label>
                    <textarea name="meta_title" class="form-control" placeholder="description petit">{{$produit->meta_title}}</textarea>
                </div>
                <div class="col-md-12">
                    <label>meta-description</label>
                    <textarea name="meta_description" class="form-control" placeholder="description petit">{{$produit->meta_description}}</textarea>
                </div>
                <div class="col-md-12">
                    <label>meta-meta_keywords</label>
                    <textarea name="meta_keywords" class="form-control" placeholder="description petit">{{$produit->meta_keywords}}</textarea>
                </div>
                <div class="col-md-12">

                   @if($produit->image)
                   <img src="{{asset('images/produits/'.$produit->image)}}" width="60px" height="60px" alt="">
                      @endif
                </div>
                <div class="col-md-12 mb-3">
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="col-md-8 mb-3">
                    <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
            </div>

         </form>
        </div>
    </div>
</div>
@endsection
