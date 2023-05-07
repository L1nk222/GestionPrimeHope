<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visiteur extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'idVisiteur';
    protected $table = 'visiteur';

    public function region(){
        return $this->hasOne(region::class, 'idRegion','idRegion');
    }
}
