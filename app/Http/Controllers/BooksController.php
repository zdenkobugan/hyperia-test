<?php

namespace App\Http\Controllers;

use App\Services\BookSearchService;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    private BookSearchService $bookSearchService;

    public function __construct()
    {
        $this->bookSearchService = new BookSearchService();
    }

    /**
     * Shows found books from all bookstores filtered by searched name sorted by price.
     *
     * @param  String  $searchKeyword
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('books.search');
    }


    /**
     * Shows found books from all bookstores filtered by searched name sorted by price.
     *
     * @param  String  $searchKeyword
     * @return \Illuminate\View\View
     */
    public function processSearch(Request $request)
    {
        $searchKeyword = $request->input('keyword');
        // tu je mozne doplnit upravu klucoveho slova pred dalsim poslanim ako get url parameter vysledkovej routy
        return redirect(route('books.search', ['searchKeyword' => $searchKeyword]));
    }

    /**
     * Shows found books from all bookstores filtered by searched name sorted by price.
     *
     * @param  String  $searchKeyword
     * @return \Illuminate\View\View
     */
    public function search(Request $request, String $searchKeyword)
    {
        $unorderedResults = $this->bookSearchService->searchAllBookstoresByKeyword($searchKeyword);
        $sortedResults = $this->bookSearchService->sortUnifiedResultsByPrice($unorderedResults);

        return view('books.results', [
            'results' => $sortedResults
        ]);
    }
}
