<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    //

    protected $table = 'employees';

    protected $fillable = [  
                            'name', 
                            'email', 
                            'companies_id'

                            ];


     public function companies(){
        return $this->hasOne('App\Companies','id','companies_id');
    }

}