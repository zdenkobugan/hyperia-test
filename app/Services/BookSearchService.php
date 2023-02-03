<?php

namespace App\Services;

use App\Models\Bookstore;

class BookSearchService
{
    private FakeApiService $fakeApiService;

    public function searchAllBookstoresByKeyword(String $searchKeyword): array
    {
        $this->fakeApiService = new FakeApiService();
        $unifiedResults = [];

        $bookstores = Bookstore::all();
        foreach ($bookstores as $bookstore) {
            $bookStoreApiResult = $this->fakeApiService->runFakeApi($bookstore->search_url, $searchKeyword);
            $decodedResults = json_decode($bookStoreApiResult, true);
            // comment for leveling
            if ('' !== $bookstore->path_to_list) {
                $levels = json_decode($bookstore->path_to_list);
                foreach ($levels as $level) {
                    $decodedResults = $decodedResults[$level];
                }
            }

            foreach ($decodedResults as $bookItem) {
                $processedItem = [];

                $processedItem['name'] = $bookItem[$bookstore->name_identifier];
                $processedItem['bookstore_name'] = $bookstore->name;
                if ('' !== $bookstore->price_regex_extractor) {
                    preg_match($bookstore->price_regex_extractor, $bookItem[$bookstore->price_identifier], $matches);
                    $processedItem['price'] = (int)$matches[0];
                } else {
                    $processedItem['price'] = $bookItem[$bookstore->price_identifier];
                }

                $unifiedResults[] = $processedItem;
            }
        }

        return $unifiedResults;
    }

    public function sortUnifiedResultsByPrice(array $unorderedResults): array
    {
        usort($unorderedResults, function ($item1, $item2) {
            return $item1['price'] <=> $item2['price'];
        });

        return $unorderedResults;
    }
}
