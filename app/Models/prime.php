<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prime extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $primaryKey = 'idPrime';
    protected $table = 'prime';

/*public function visiteur()
{
return $this->hasOne(visiteur::class, "Code","idVisiteur");
}*/
}
