<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class secteur extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idSecteur';
    protected $table = 'secteur';

    public function region()
    {

        return $this->hasMany( region::class,'idSecteur','idSecteur' );
    }


}
