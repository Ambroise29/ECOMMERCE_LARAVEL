<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class panier extends Model
{
    use HasFactory;
    protected $table='paniers';
    protected $filename=[];
    public function produit(){
        return $this->belongsTo(produit::class,'id_prod','id');
    }
   
}
