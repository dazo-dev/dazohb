<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmailChange extends Model
{
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [

        'email','new_email','token','created_at','used'

    ];

   /**
    * The attributes that should be hidden for arrays.
    *
    * @var array
    */
   protected $hidden = [
       'email','new_email', 'token',
   ];
}
