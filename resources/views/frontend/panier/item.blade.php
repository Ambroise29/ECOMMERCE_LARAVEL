@extends('layouts.frontend')
@section('title') 
my cart
@endsection
		@section('content')
        <div class="py-3 mb-4 shadow-sm bg-warning bord"><h6 class="mb-0"> Colletions/</h6></div>

       <div class="container my-5">
           <div class="card shadow ">
               <div class="card-header bg-info text-center">
                <table class="table table-striped">
                       <tr><thead><th>Image</th><th>Image</th><th>Image</th><th>Image</th><th>Image</th><th>Image</th></thead></tr>
                   </table>
               </div>
               <div class="card-body">
                   <div class="row">
                       <?php $total=0 ?>
                       @foreach ($panier as $item)

                       <div class="col-md-2">
						<img src="{{ asset('images/produits/'.$item->produit->image) }}" style="height:80px;width:80px">

                       </div>
                       <div class="col-md-3 mt-4"><h6>{{ $item->produit->name }}</h6> </div>
                   
                       <div class="col-md-1 mt-4"> {{ $item->produit->selling_price }}</h6> </div>

                       <div class="col-md-2 data-qts" style="margin-top: -10px">
                        <input type="hidden" class="id_prod" value="{{ $item->produit->id }}">
                        <label for="quantity">Quantity</label>
                           <div class="input-group text-center mb-3" style="width: 130px">
                             <button type="button" class="input-group-text decremente-btn modifier-qts">-</button><br><br>
                             <input type="text" value="{{ $item->qts }}" class="input-qts form-control text-center">
                             <button type="button" class="input-group-text incremente-btn modifier-qts">+</button>

                           </div>
                       </div>
                       <div class="col-md-1 mt-4">{{ $item->produit->selling_price *$item->qts }}</div>

                       <div class="col-md-2 mt-4 data-qts">
                        <input type="hidden" class="id_prod" value="{{ $item->produit->id }}">
                         <button class="delete-btn float-end"><i class="fa-solid fa-trash-can"></i><button/>
                       </div>
                       <?php $total=$total+$item->produit->selling_price*$item->qts?>
                       @endforeach
                   </div>
               </div>
               <div class="card-footer">
                   <h5>Total:{{ $total }}
                <a href="{{ url('finaliser') }}" class="float-end"> Continuer</a>
                </h5>
               </div>
           </div>
       </div>
        @endsection
     

