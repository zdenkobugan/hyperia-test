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
     * Zobrazuje základný interface pre vyhľadávanie, jednoduché search okno.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('books.search');
    }

    /**
     *  POST akcia volaná po submite formulára na hlavnej index stránke, umožňuje upravovať, prípadne sanitizovať vstupné kľúčové slovo a presmeruje používateľa na GET routu s výsledkami.
     *
     * @param  Request  $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function processSearch(Request $request)
    {
        $searchKeyword = $request->input('keyword');
        // tu je mozne doplnit upravu klucoveho slova pred dalsim poslanim ako get url parameter vysledkovej routy
        return redirect(route('books.search', ['searchKeyword' => $searchKeyword]));
    }

    /**
     * Zobrazuje výsledky hľadania podľa kľúčového slova, pričom výsledky sú zoradené podľa ceny. Funguje ako samostatná URL get cesta.
     *
     * @param  Request  $request
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
