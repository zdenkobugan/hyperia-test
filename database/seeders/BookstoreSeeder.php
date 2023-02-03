<?php

namespace Database\Seeders;

use App\Models\Bookstore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookstoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Bookstore::create(
            [
                'name' => 'Fiktivne knihkupectvo 1',
                'search_url' => 'https://fiktivne-knihy.sk/hladaj?nazov=',
                'path_to_list' => 'data',
                'name_identifier' => 'nazov',
                'price_identifier' => 'cena',
                'price_regex_extractor' => '([0-9,]+(\.[0-9]{2})?)',
            ]
        );
        Bookstore::create(
            [
                'name' => 'Fiktivne knihkupectvo 2',
                'search_url' => 'https://nonrealbookshop.com/search?title=',
                'path_to_list' => '',
                'name_identifier' => 'title',
                'price_identifier' => 'price',
                'price_regex_extractor' => '',
            ]
        );
    }
}
