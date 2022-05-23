@extends('layouts.frontend')

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-header text-center">Enregistrer categorie</div>
        <div class="card-body">
            <form action="{{ url('insert-categorie') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control">
                       
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug">slug</label>
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">Description</label>
                        <textarea name="description" id="description"  rows="3" class="form-control"></textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="statut">statut</label>
                        <input type="checkbox" name="statut" class="form-controld">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="popular">popular</label>
                        <input type="checkbox" name="popular" class="form-d">
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="name">meta description</label>
                        <textarea name="meta_title" id="description"  rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">meta key</label>
                        <textarea name="meta_keywords" id="description"  rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">meta description</label>
                        <textarea name="meta_description" id="description"  rows="3" class="form-control"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <input type="file" class="form-control" name="images">
                    </div>
                    <div class="col-md-4 mb-3">
                        <button type="submit" class="btn btn-dark">Valider</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection