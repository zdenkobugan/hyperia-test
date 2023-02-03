<?php

namespace App\Services;

class BookSearchService
{
    private FakeApiService $fakeApiService;

    public function searchAllBookstoresByKeyword(String $searchKeyword): array
    {
        $this->fakeApiService = new FakeApiService();

        $dummyApiReturn = $this->fakeApiService->runFakeApi('https://fiktivne-knihy.sk/hladaj?nazov=', $searchKeyword);
        dd($dummyApiReturn);


        return [];
    }
}
