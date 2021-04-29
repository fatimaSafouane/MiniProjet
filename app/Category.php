<?php

namespace App;



use Illuminate\Database\Eloquent\SoftDeletes;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use SoftDeletes; 
    protected $dates = ['deleted_at'];

 
    public function user(){
        return  $this->hasMany('App\User');
 
     } 
     public function produits(){
      
        return  $this->hasMany('App\Produit');
 
     } 

     
   

}
