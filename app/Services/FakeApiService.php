<?php

namespace App\Services;

use App\Models\FakeApiBookstore;
use App\Models\FakeApiBookstoreItem;

class FakeApiService
{
    public function runFakeApi(String $url, String $searchKeyword): ?String
    {
        $fakeBookstore = FakeApiBookstore::select()
            ->where('bookstore_search_url', $url)
            ->first();
        if (null === $fakeBookstore) {
            return null; // some error handling for not found url's could be nice, but here I just return null
        }
        $foundBookstoreItems = FakeApiBookstoreItem::select()
            ->where('fake_api_bookstore_id', $fakeBookstore->id)
            ->where('name', 'like', '%' . $searchKeyword . '%')
            ->get();

        $arrayOfConstructedItems = [];
        foreach ($foundBookstoreItems as $foundItem) {
            $constructedItemArray = [];
            $constructedItemArray[$fakeBookstore->name_identifier] = $foundItem->name;
            if (null !== $fakeBookstore->price_template) {
                $price = str_replace('##price##', (int)$foundItem->price, $fakeBookstore->price_template);
            } else {
                $price = (int)$foundItem->price;
            }
            $constructedItemArray[$fakeBookstore->price_identifier] = $price;
            if (null !== $fakeBookstore->currency_identifier) {
                $constructedItemArray[$fakeBookstore->currency_identifier] = $foundItem->currency;
            }
            if (null !== $fakeBookstore->lang_identifier) {
                $constructedItemArray[$fakeBookstore->lang_identifier] = $foundItem->language;
            }

            $arrayOfConstructedItems[] = $constructedItemArray;
        }

        $generatedJSON = json_encode($arrayOfConstructedItems, JSON_UNESCAPED_UNICODE);
        if ($fakeBookstore->final_template !== '') {
            $generatedJSON = str_replace('##items_array##', $generatedJSON, $fakeBookstore->final_template);
        }

        return $generatedJSON;
    }
}
