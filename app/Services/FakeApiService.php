<?php

namespace App\Services;

use App\Models\FakeApiBookstore;
use App\Models\FakeApiBookstoreItem;

class FakeApiService
{
    /**
     * Simuluje volanie fake API url s prijatým kľúčovým slovom, vracia JSON string ako fake API response.
     *
     * @param  String  $url
     * @param  String  $searchKeyword
     * @return ?String
     */
    public function runFakeApi(String $url, String $searchKeyword): ?String
    {
        // nájde fake API bookstore na základe prijatej URL a vytiahne dáta potrebné pre špecifické formátovanie fake API odpovede
        $fakeBookstore = FakeApiBookstore::select()
            ->where('bookstore_search_url', $url)
            ->first();
        if (null === $fakeBookstore) {
            return null; // ak sa dané fake API nenájde podľa URL, vráti null a nepokračuje
        }

        // vytiahne zoznam knižných titulov uložených pre nájdené fake API kníhkupectvo
        $foundBookstoreItems = FakeApiBookstoreItem::select()
            ->where('fake_api_bookstore_id', $fakeBookstore->id)
            ->where('name', 'like', '%' . $searchKeyword . '%')
            ->get();

        // do zberného poľa vytvára na základe špecifík formátovania (kľúč pre názov, cenu, jazyk a menu) objekty reprezentujúce každý nájdený titul v očakávanom formáte odpovede
        $arrayOfConstructedItems = [];
        foreach ($foundBookstoreItems as $foundItem) {
            $constructedItemArray = [];
            // k identifikátoru názvu priradí hodnotu názvu titulu
            $constructedItemArray[$fakeBookstore->name_identifier] = $foundItem->name;
            // ak odpoveď nemá cenu titulu vracať len ako jednoduchú číselnú hodnotu, použije sa uložená šablóna pre formátovanie ceny
            if (null !== $fakeBookstore->price_template) {
                $price = str_replace('##price##', (int)$foundItem->price, $fakeBookstore->price_template);
            } else {
                $price = (int)$foundItem->price;
            }
            $constructedItemArray[$fakeBookstore->price_identifier] = $price;
            // ak odpoveď pre kníhkupectvo má obsahovať aj údaj o mene, pridá sa k objektu titulu
            if (null !== $fakeBookstore->currency_identifier) {
                $constructedItemArray[$fakeBookstore->currency_identifier] = $foundItem->currency;
            }
            // ak odpoveď pre kníhkupectvo má obsahovať aj údaj o jazyku, pridá sa k objektu titulu
            if (null !== $fakeBookstore->lang_identifier) {
                $constructedItemArray[$fakeBookstore->lang_identifier] = $foundItem->language;
            }

            $arrayOfConstructedItems[] = $constructedItemArray;
        }
        // generované zberné pole sa zakóduje do JSON formátu
        $generatedJSON = json_encode($arrayOfConstructedItems, JSON_UNESCAPED_UNICODE);

        // ak je zoznam titulov daného kníhkupectva - zberné poľe pre API response vnorený ako poľe pod vyšší kľúč, použije sa template pre zostavenie kompletného JSONU odpovede
        if ($fakeBookstore->final_template !== '') {
            $generatedJSON = str_replace('##items_array##', $generatedJSON, $fakeBookstore->final_template);
        }

        return $generatedJSON;
    }
}
