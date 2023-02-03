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
    public function search(Request $request, String $searchKeyword)
    {
        $this->bookSearchService->searchAllBookstoresByKeyword($searchKeyword);

        // return view('user.profile', [
        //     'user' => User::findOrFail($id)
        // ]);
    }
}
