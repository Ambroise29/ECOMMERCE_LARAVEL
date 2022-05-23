@extends('layouts.frontend')

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-header text-center">Enregistrer categorie</div>
        <div class="card-body">
            <form action="{{ url('update-categorie/'.$verifier->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ $verifier->name }}">
                       
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="slug">slug</label>
                        <input type="text" name="slug" class="form-control" value="{{ $verifier->slug }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">Description</label>
                        <textarea name="description" id="description"  rows="3" class="form-control"> {{ $verifier->description }}</textarea>
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="statut">statut</label>
                        <input type="checkbox" name="statut"  {{ $verifier->status=='1' ? 'checked':'' }}>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="popular">popular</label>
                        <input type="checkbox" name="popular" {{ $verifier->popular=='1' ? 'checked':'' }}>
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="name">meta description</label>
                        <textarea name="meta_title" id="description"  rows="3" class="form-control"> {{ $verifier->meta_title }}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">meta key</label>
                        <textarea name="meta_keywords" id="description"  rows="3" class="form-control"> {{ $verifier->meta_keywords}}</textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">meta description</label>
                        <textarea name="meta_description" id="description"  rows="3" class="form-control"> {{ $verifier->meta_description }}</textarea>
                    </div>
                    <div class="col-md-12 text-center">
                        @if($verifier->images)
                        <img src="{{ asset('images/categories/'.$verifier->images) }}" width="159px" height="150px">
      
                          @endif
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