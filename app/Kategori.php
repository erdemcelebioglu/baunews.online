<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $table = 'kategoriler';
    protected $guarded=[];

   //protected $fillable = ['baslik','aciklama','slug','ust_id'];

    public function yazilar(){
        return $this->hasMany('App\Yazi','kategori_id');
    }

    public function anakategori(){
        return $this->belongsTo('App\Kategori','id');
    }

    public function altkategori(){
        return $this->hasMany('App\Kategori','ust_id');
    }
}
