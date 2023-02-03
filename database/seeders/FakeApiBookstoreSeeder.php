<?php

namespace Database\Seeders;

use App\Models\FakeApiBookstore;
use App\Models\FakeApiBookstoreItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FakeApiBookstoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $firstBookstore = FakeApiBookstore::create([
            'bookstore_search_url' => 'https://fiktivne-knihy.sk/hladaj?nazov=',
            'name_identifier' => 'nazov',
            'price_identifier' => 'cena',
            'currency_identifier' => null,
            'lang_identifier' => null,
            'price_template' => '##price##€',
            'final_template' => '{"data": ##items_array##}'
        ]);

        FakeApiBookstoreItem::create(
            [
                'fake_api_bookstore_id' => $firstBookstore->id,
                'name' => 'Harry Potter a kamen mudrcov',
                'price' => 10,
                'currency' => null,
                'language' => null
            ]
        );
        FakeApiBookstoreItem::create(
            [
                'fake_api_bookstore_id' => $firstBookstore->id,
                'name' => 'Harry Potter a tajomna komnata',
                'price' => 11,
                'currency' => null,
                'language' => null
            ]
        );
        FakeApiBookstoreItem::create(
            [
                'fake_api_bookstore_id' => $firstBookstore->id,
                'name' => 'Harry Potter a vazen z Azkabanu',
                'price' => 7,
                'currency' => null,
                'language' => null
            ]
        );

        $secondBookstore = FakeApiBookstore::create([
            'bookstore_search_url' => 'https://nonrealbookshop.com/search?title=',
            'name_identifier' => 'title',
            'price_identifier' => 'price',
            'currency_identifier' => 'currency',
            'lang_identifier' => 'lang',
            'price_template' => null,
            'final_template' => ''
        ]);

        FakeApiBookstoreItem::create(
            [
                'fake_api_bookstore_id' => $secondBookstore->id,
                'name' => 'Harry Potter a kamen mudrcov',
                'price' => 7,
                'currency' => '€',
                'language' => 'SK'
            ]
        );
        FakeApiBookstoreItem::create(
            [
                'fake_api_bookstore_id' => $secondBookstore->id,
                'name' => 'Harry Potter a tajomna komnata',
                'price' => 15,
                'currency' => '€',
                'language' => 'SK'
            ]
        );
        FakeApiBookstoreItem::create(
            [
                'fake_api_bookstore_id' => $secondBookstore->id,
                'name' => 'Harry Potter a vazen z Azkabanu',
                'price' => 18,
                'currency' => '€',
                'language' => 'SK'
            ]
        );
    }
}
