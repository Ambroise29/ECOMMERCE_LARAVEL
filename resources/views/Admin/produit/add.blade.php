@extends('layouts.frontend')
@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5 class="text-center bg-danger text-white" style="padding: 10px">Ajouter-Produit</h5>
        </div>
        <div class="card-body card shadow">
         <form method="post" action="{{url('insert-produit')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <select class="form-control" name="categorie">
                        @foreach ($categorie as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                </div>
                <div class="col-md-6">
                    <label>Nom</label>
                    <input type="text" name="name" class="form-control" placeholder="name">
                </div>
                <div class="col-md-6">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" placeholder="name">
                </div>
                <div class="col-md-12">
                    <label>small-description</label>
                    <textarea name="small_description" class="form-control" placeholder="description petit"></textarea>
                </div>
                <div class="col-md-12">
                    <label>description</label>
                    <textarea name="description" class="form-control" placeholder="description petit"></textarea>
                </div>
                <div class="col-md-6">
                    <label>Prix_normal</label>
                    <input type="text" name="original_price" class="form-control" placeholder="prix n">
                </div>
                <div class="col-md-6">
                    <label>Prix_reduit</label>
                    <input type="text" name="selling_price" class="form-control" placeholder="prix n">
                </div>
                <div class="col-md-6">
                    <label>Status</label>
                    <input type="checkbox" name="status" class="form-controls" placeholder="prix n">
                </div>
                <div class="col-md-6">
                    <label>Treining</label>
                    <input type="checkbox" name="trending" class="form-controls">
                </div>
                <div class="col-md-6">
                    <label>Qts</label>
                    <input type="text" name="qty" class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Tax</label>
                    <input type="text" name="tax" class="form-control">
                </div>

                <div class="col-md-12">
                    <label>Meta-titre</label>
                    <textarea name="meta_title" class="form-control" placeholder="description petit"></textarea>
                </div>
                <div class="col-md-12">
                    <label>meta-description</label>
                    <textarea name="meta_description" class="form-control" placeholder="description petit"></textarea>
                </div>
                <div class="col-md-12">
                    <label>meta-meta_keywords</label>
                    <textarea name="meta_keywords" class="form-control" placeholder="description petit"></textarea>
                </div>
                <div class="col-md-6">
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="col-md-6">
                    <input type="file" name="photos[]" class="form-control" multiple>
                </div>

                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">SAVE</button>
                </div>
            </div>

         </form>
        </div>
    </div>
</div>
@endsection
