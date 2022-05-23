@extends('layouts.frontend')
@section('title')
Principal
@endsection
@section('content')
<div class="">
<div class="container">
    <div class="row">
        <div class="owl-carousel featured-carousel owl-theme">
            @foreach ($produit as $item)
            <div class="item">
             <div class="card data_product">
                 <img src="{{ asset('images/produits/'.$item->image) }}" alt="" height="300px">
                 <div class="card-body">
                     <h6>{{ $item->name }}</h6>
                     <span class="float-start">{{ $item->selling_price }}</span>
                     <span class="float-end"><s>{{$item->original_price }}</s></span>


                     <input type="hidden" name="" id="" class="id_prod" value="{{ $item->id }}">
                     <button class="addto-cat">add</button>
                 </div>
             </div>
         </div>
            @endforeach
        </div>

    </div>
</div>
</div>

<div class="py-5">
<div class="container">
    <h2>All category</h2>
    <div class="row"> 
        <div class="owl-carousel featured-carousel owl-theme">
            @foreach ($categoriet as $item)
            <div class="item">
                <a href="{{ url('filtrecategorie/'.$item->id)}}">
             <div class="card">
                    <img src="{{ asset('images/categories/'.$item->images) }}" alt="" height="300px">
                
                 <div class="card-body">
                     <p>{{ $item->name }}</p>
                    
                 </div>
             </div>
            </a>
         </div>
            @endforeach
        </div>
    </div>
</div>
</div>
@endsection

@section('scripts')
<script>
 $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection