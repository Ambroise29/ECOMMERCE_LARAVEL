@extends('layouts.frontend')
@section('title') 
{{ $produits->name }}
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning bord"><h6 class="mb-0"> Colletions/{{$produits->categorie->name }}/{{$produits->name}}</h6></div>
<div class="py-5">
    <div class="container">
       <div class="card shadow data_product">
           <div class="card-body">
            <div class="row">
                <div class="col-md-4 border-right">
                    <img src="{{ asset('images/produits/'.$produits->image) }}" alt="" class="w-100" height="450px">
    
                </div>
                <div class="col-md-8">
                    <h2 class="mb-0">
                        {{$produits->name}}
                        <label style="font-size:16px" class="float-end badge bg-danger treining_tag">{{ $produits->trending=='1' ? 'Treding' : '' }}</label>
    
                    </h2>
                    <hr>
                    <label class="me-3">Original_prix:<s>{{$produits->original_price}}</s></label>
                    <label class="me-3">Original_prix:{{$produits->selling_price}}</label>
                    <p class="mt-3">
                        {{ $produits->small_description }}
                    </p>
                    <hr>
    
                    @if($produits->qty>0)
                    <label class="badge bg-success">in stock {{ ($produits->qty) }}</label>
                    @else
                    <label class="badge bg-danger">Out/label>
                    @endif
                    <div class="row mt-2">
                        <div class="col-md-2 data-qts">
                            <input type="hidden" value="{{ $produits->id }}" class="id_prod">
                            <label for="Quantity">Quantite</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text decremente-btn">-</button>
                                <input type="text" value="1" class="form-control input-qts"name="quantite">
                                <button class="input-group-text incremente-btn">+</button>
    
                            </div>
    
                        </div>
    
                        <div class="col-md-10">
                            <br/>
                            <button class="btn btn-success me-3 float-start">Add to wish</button>
                            <button class="btn btn-primary me-3 float-start addto-cat"> Add to cart</button>
    
                        </div>
    
                    </div>
    
                </div>
            </div>
            <div class="col-md-12">
                <hr>
                <h3>Description</h3>
                <p>{{ $produits->description }}</p>
            </div>
           </div>
       </div>
    </div>
</div>
@endsection