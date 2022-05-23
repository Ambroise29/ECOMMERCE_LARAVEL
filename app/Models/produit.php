<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produit extends Model
{
    use HasFactory;
    protected $table='produits';
    protected $attribut=[];
      

    public function categorie(){
        return $this->belongsTo(categorie::class,'carte_id','id');
    }
}
