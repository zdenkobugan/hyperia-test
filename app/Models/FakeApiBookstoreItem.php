<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakeApiBookstoreItem extends Model
{
    protected $table = 'fake_api_bookstore_items';
    protected $fillable = [
        'fake_api_bookstore_id',
        'name',
        'price',
        'currency',
        'language'
    ];
}
