<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FakeApiBookstore extends Model
{
    protected $table = 'fake_api_bookstores';
    protected $fillable = [
        'bookstore_search_url',
        'name_identifier',
        'price_identifier',
        'currency_identifier',
        'lang_identifier',
        'price_template',
        'final_template'
    ];

    public function items()
    {
        return $this->hasMany(FakeApiBookstoreItem::class);
    }
}
