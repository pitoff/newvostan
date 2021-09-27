<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestProperty extends Model
{
    use HasFactory;

    protected $fillable =[
        'email', 'phonenumber', 'body'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
