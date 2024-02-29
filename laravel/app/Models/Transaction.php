<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'transaction_type',
        'value',
        'category_id',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
    public function category(){
        return $this->belongsTo(Categorie::class, 'category_id');
    }
}
