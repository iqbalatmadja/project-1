<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = "images";
    protected $primaryKey = "id";
    public $incrementing = true; 
    //protected $keyType = 'string'; # primary key type, default to integer
    public $timestamps = true; 
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    
    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
