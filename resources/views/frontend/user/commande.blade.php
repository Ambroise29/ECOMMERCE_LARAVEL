@extends('layouts.frontend')
@section('title') 
Finaliser
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning bord"><h6 class="mb-0"> Colletions/</h6></div>

<div class="py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                   <form action="{{ url('add') }}" method="post">
                    @csrf
                    <div class="card-header">Donnee Personnelles</div>
                    <div class="card-body">
                        <input type="text" name="name" class="form-control mb-3" value="{{ Auth::user()->name }}" >
                        <input type="text" name="prenom"class="form-control mb-3"  value="{{ Auth::user()->prenom }}" >
                        <input type="text" name="email" class="form-control mb-3"  value="{{ Auth::user()->email }}" >
                        <label for="">Telephone</label>
                        <input type="text" name="telephone" class="form-control mb-3"  value="{{ Auth::user()->telephone}}" >
                        <label for="">Adresse 1</label>
                        <input type="text" name="adresse1" id="cidadew" class="form-control mb-3"  value="{{ Auth::user()->adresse2 }}" >

                        <label for="">Point de reference</label>
                        <input type="text" name="adresse2" id="rua" class="form-control mb-3"  value="{{ Auth::user()->adresse2 }}" >
                        <label for="">Ville</label>
                        <input type="text" name="ville" id="cidade" class="form-control mb-3"  value="{{ Auth::user()->ville }}" >
                        <label for="">Quartier</label>
                        <input type="text" name="quartier" id="bairro" class="form-control mb-3"  value="{{ Auth::user()->quartier }}" >
                        <label for="">pays</label>
                        <input type="text" name="pays" class="form-control mb-3"  value="{{ Auth::user()->pays }}" >
                        <label for="">Code Postal</label>
                        <input type="text" name="code_postal" value="{{ Auth::user()->code_postal }}" id="cep" class="form-control mb-3"  value="{{ Auth::user()->code_postal }}" >
                        <label for="Adresse"><strong>ADRESSE DE LIVRAISON</strong></label>
                      <textarea name="" id="" cols="30" rows="10" class="form-control" placeholder="Informez votre adresse de Livraison Complete sous le format EX: Etat...,ville...,quartier...,rue...,numero...,CEP..."></textarea><br>
                        <button  type="submit" class="btn btn-primary">Entrer</button>
                    </div>
                </form>
                </div>

            </div>

            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-info text-center">Resume commande</div>
                    <div class="card-body">
                    @include('layouts.resumecommande')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection