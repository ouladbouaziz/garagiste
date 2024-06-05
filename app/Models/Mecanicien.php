<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mecanicien extends Model
{
    use HasFactory;
    protected $table="mecaniciens";
    protected $fillable=[
        'name',
        'adresse',
        'telephone',
        'user_id'
    ]

    ;
    public function mecanicien(){
        return $this->belongsTo(User::class,'mecanic_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
