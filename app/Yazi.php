<?php

namespace App;

use CyrildeWit\EloquentViewable\Viewable;
use Illuminate\Database\Eloquent\Model;
use willvincent\Rateable\Rateable;

class Yazi extends Model
{
    use Rateable;
    use Viewable;
    protected $table = 'yazilar';
    protected $guarded = [];


    public function kullanici(){
        return $this->belongsTo('App\User','user_id');
    }

    public function kategori(){
        return $this->belongsTo('App\Kategori','kategori_id');
    }

    public function yorumlar() {

        return $this->hasMany('App\Yorum','yazi_id');
    }

}
