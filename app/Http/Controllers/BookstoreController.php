<?php

namespace App\Http\Controllers;

use App\Models\Bookstore;
use Illuminate\Http\Request;

class BookstoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bookstore.list', [
            'bookstores' => Bookstore::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookstore.create', [
            'bookstore' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('bookstore.edit', [
            'bookstore' => Bookstore::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
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
     * Show the form for deleting the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        return view('bookstore.delete', [
            'bookstore' => Bookstore::findOrFail($id)
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Bookstore::findOrFail($id)->delete();

        return redirect()->route('bookstore.index');
    }
}
