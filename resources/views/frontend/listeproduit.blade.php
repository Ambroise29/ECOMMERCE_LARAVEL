@extends('layouts.frontend')
@section('title') {{ $categorien->name }} @endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning bord"><h6 class="mb-0"> Colletions/{{$categorien->name }}</h6></div>

<div class="py-5">
    <div class="container">
        <div class="row">
                @foreach ($produit as $item)
                <div class="col-md-3 mt-3">
                 <div class="card">
                     <a href="{{ url('description/'.$categorien->id.'/'.$item->id) }}">
                     <img src="{{ asset('images/produits/'.$item->image) }}" alt="" width="303px" height="300px">
                     <div class="card-body data_product">
                         <h5>{{ $item->name }}</h5>
                         <span class="float-start">{{ $item->selling_price }}</span>
                         <span class="float-end"><s>{{$item->original_price }}</s></span>
                         <input type="hidden" name="" id="" class="id_prod" value="{{ $item->id }}">
                     </div>
                    </a>
                 </div>
             </div>
                @endforeach
    
        </div>
    </div>
</div>
@endsection