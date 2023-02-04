<?php

namespace App\Http\Controllers;

use App\Models\Bookstore;
use Illuminate\Http\Request;

class BookstoreController extends Controller
{
    /**
     * Zobrazí zoznam všetkých uložených kníhkupectiev s tlačidlami na CUD operácie
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('bookstore.list', [
            'bookstores' => Bookstore::all()
        ]);
    }

    /**
     * Zobrazí formulár pre pridanie nového kníhkupectva
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('bookstore.create', [
            'bookstore' => null
        ]);
    }

    /**
     * Uloží nové kníhkupectvo po odoslaní formu a vráti užívateľa na zoznam existujúcich kníhkupectiev
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $newBookstoreData = [
            'name' => $request->input('name'),
            'search_url' => $request->input('search_url'),
            'name_identifier' => $request->input('name_identifier'),
            'price_identifier' => $request->input('price_identifier'),
            'path_to_list' => $request->input('path_to_list') != null ? $request->input('path_to_list') : '',
            'price_regex_extractor' => $request->input('price_regex_extractor') != null ? $request->input('price_regex_extractor') : '',
        ];

        Bookstore::create($newBookstoreData);

        return redirect()->route('bookstore.index');
    }

    /**
     * Zobrazí formulár na úpravu existujúceho kníhkupectva s predvyplnenými hodnotami
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit(int $id)
    {
        return view('bookstore.edit', [
            'bookstore' => Bookstore::findOrFail($id)
        ]);
    }

    /**
     * Updatne existujúce kníhkupectvo novými hodnotami z edit formu, po vykonaní redirectne užívateľa na zoznam kníhkupectiev.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, int $id)
    {
        $newBookstoreData = [
            'name' => $request->input('name'),
            'search_url' => $request->input('search_url'),
            'name_identifier' => $request->input('name_identifier'),
            'price_identifier' => $request->input('price_identifier'),
            'path_to_list' => $request->input('path_to_list') != null ? $request->input('path_to_list') : '',
            'price_regex_extractor' => $request->input('price_regex_extractor') != null ? $request->input('price_regex_extractor') : '',
        ];

        Bookstore::findOrFail($id)->update($newBookstoreData);

        return redirect()->route('bookstore.index');
    }

    /**
     * Zobrazí form pre potvrdenie zmazania existujúceho kníhkupectva.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(int $id)
    {
        return view('bookstore.delete', [
            'bookstore' => Bookstore::findOrFail($id)
        ]);
    }

    /**
     * DELETE akcia pre fyzické zmazanie existujúceho kníhkupectva.
     *
     * @param  int  $id
     * @return Illuminate\Http\RedirectResponse
     */
    public function destroy(int $id)
    {
        Bookstore::findOrFail($id)->delete();

        return redirect()->route('bookstore.index');
    }
}
