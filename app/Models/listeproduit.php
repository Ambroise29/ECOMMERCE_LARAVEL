<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class listeproduit extends Model
{
    use HasFactory;
    protected $table="listeproduits";
    protected $fillable=['id_cmd', 'id_user','id_prod','qts'];
    public function produit(){
        return $this->belongsTo(produit::class,'id_prod','id');
    }
}
