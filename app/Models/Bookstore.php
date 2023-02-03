<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bookstore extends Model
{
    protected $table = 'bookstores';
    protected $fillable = [
        'name',
        'search_url',
        'path_to_list',
        'name_identifier',
        'price_identifier',
        'price_regex_extractor',
    ];
}
