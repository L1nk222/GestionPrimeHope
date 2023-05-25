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
    protected $fillable = [
        'nomVisiteur',
        'idRegion'
    ];

    public function region(){
        return $this->hasOne(region::class, 'idRegion','idRegion');
    }
    public function User(){
        return $this->belongsTo(User::class,'idVisiteur','idVisiteur');
    }

}
