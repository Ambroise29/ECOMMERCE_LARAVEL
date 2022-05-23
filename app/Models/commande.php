<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class commande extends Model
{
    use HasFactory;
    protected $table="commandes";
    protected $filename=[];
    public function produit(){
        return $this->hasMany(produit::class,'id_prod','id');
    }
}
