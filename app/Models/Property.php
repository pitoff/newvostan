<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'image', 'title', 'p_type', 'p_for', 'state', 'lga', 'address', 'description', 'price', 'bedroom', 'toilet', 'kitchen'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function requestProperty()
    {
        return $this->hasMany(RequestProperty::class);
    }
}
