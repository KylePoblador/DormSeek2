<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','title','slug','description','address','city',
        'price','beds','baths','area','images','is_published','is_available'
    ];

    protected $casts = [
        'images' => 'array',
        'is_published' => 'boolean',
        'is_available' => 'boolean',
        'price' => 'float',
    ];

    // Accessor for primary image url
    public function primaryImageUrl()
    {
        $images = $this->images ?? [];
        $first = $images[0] ?? null;
        return $first ? asset("storage/properties/{$first}") : asset('images/placeholder-640x420.png');
    }
}
