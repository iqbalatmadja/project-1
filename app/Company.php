<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = "companies"; # default to companies (plural of model name
    protected $primaryKey = "id"; # default to id
    public $incrementing = true; # default to true
    //protected $keyType = 'string'; # primary key type, default to integer
    public $timestamps = true; # using timestamps (created_at,updated_at)default to true
    const CREATED_AT = 'creation_at'; # default to created_at
    const UPDATED_AT = 'updated_at'; # default to updated_at
    /*
    protected $attributes = [
        'delayed' => false,
    ];
    */ # defining default attribute values
    
}
