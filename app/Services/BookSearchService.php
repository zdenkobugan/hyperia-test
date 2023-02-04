<?php

namespace App\Services;

use App\Models\Bookstore;

class BookSearchService
{
    private FakeApiService $fakeApiService;

    /**
     * Zavolá fake API volania pre všetky uložene kníhkupectvá so vstupným kľúčovým slovom ako parametrom,
     * zunifikuje ich výsledky do jedného formátu na základe špecifík pre každé kníhkupectvo a vráti ako pole
     *
     * @param  String  $searchKeyword
     * @return array
     */
    public function searchAllBookstoresByKeyword(String $searchKeyword): array
    {
        $this->fakeApiService = new FakeApiService();
        //vytvorí prázdne unifikované pole pre finálny výsledok
        $unifiedResults = [];

        // vytiahne všetky uložené kníhkupectvá
        $bookstores = Bookstore::all();
        foreach ($bookstores as $bookstore) {
            // pre každé z nájdených kníhkupectiev vykoná fake API call použitím fake URL a kľúčového slova
            $bookStoreApiResult = $this->fakeApiService->runFakeApi($bookstore->search_url, $searchKeyword);
            // vrátený JSON string rozkóduje do associatívneho poľa
            $decodedResults = json_decode($bookStoreApiResult, true);
            // ak je pole samotných titulov vnorené pod ďalšie kľúče, na základe nastavenej property path_to_list (JSON pole "krokov kľúčov" od hornej úrovne až po pole položiek titulov)
            // vyextrahuje len samotné pole s položkami titulov
            if ('' !== $bookstore->path_to_list) {
                $levels = json_decode($bookstore->path_to_list);
                if (null !== $levels && is_array($levels)) {
                    foreach ($levels as $level) {
                        $decodedResults = $decodedResults[$level];
                    }
                }
            }

            // ak vrátené pole titulov obsahuje nejaké riadky, vyextrahuje ich názov a cenu do unifikovaného poľa
            if (is_array($decodedResults)) {
                foreach ($decodedResults as $bookItem) {
                    $processedItem = [];
                    // extrakcia názvu
                    $processedItem['name'] = $bookItem[$bookstore->name_identifier];
                    // pridanie názvu kníhkupectva
                    $processedItem['bookstore_name'] = $bookstore->name;
                    // extrakcia ceny, ak cena v zdroji nie je jednoduchá číselná hodnota, použije sa na jej extrakciu uložený regex výraz
                    if ('' !== $bookstore->price_regex_extractor) {
                        preg_match($bookstore->price_regex_extractor, $bookItem[$bookstore->price_identifier], $matches);
                        $processedItem['price'] = (int)$matches[0];
                    } else {
                        $processedItem['price'] = $bookItem[$bookstore->price_identifier];
                    }

                    // extrahovaná položka s použitými unifikovanými kľúčmi sa pridá do unifikovaného poľa
                    $unifiedResults[] = $processedItem;
                }
            }
        }

        return $unifiedResults;
    }

    /**
     * Prijme asociatívne pole unifikovaných výsledkov vyhľadávania, zoradí ho vzostupne podľa ceny každej položky a vráti naspäť
     *
     * @param  array  $unorderedResults
     * @return array
     */
    public function sortUnifiedResultsByPrice(array $unorderedResults): array
    {
        usort($unorderedResults, function ($item1, $item2) {
            return $item1['price'] <=> $item2['price'];
        });

        return $unorderedResults;
    }
}
