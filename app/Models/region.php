<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class region extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idRegion';
    protected $table = 'region';

    public function secteur(){

        return $this->hasOne(secteur::class, 'idSecteur','idSecteur');
    }

    public function visiteur(){
        return $this->hasMany(visiteur::class, 'idRegion','idRegion');
    }

    public function User(){
        return $this->belongsTo(User::class,'idRegion','idRegion');
    }
}
