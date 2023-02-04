@extends('layout')

@section('page-content')
    <div class="z-10 flex flex-col w-10/12 p-6 py-12 mx-auto bg-white shadow-lg rounded-2xl ">
        <div class="flex flex-row justify-center">
            <img class="w-20 mb-4" src="{{ asset('images/book-svgr2.svg') }}">
        </div>
        <div class="mb-10 text-2xl font-black text-center">
            <h1>Kníhkupectvá</h1>
        </div>
        <div class="mb-10 text-center">
            <a class="py-4 font-semibold text-white rounded-full px-7 from-orange-700 bg-gradient-to-r to-amber-500 hover:to-orange-700"
                href="{{ route('bookstore.create') }}">Pridaj Nové Kníhkupectvo</a>
        </div>
        <div class="flex justify-center">
            <table class="text-xs table-auto">
                <thead>
                    <tr>
                        <th></th>
                        <th class="px-3">Názov</th>
                        <th class="px-3">API URL</th>
                        <th class="px-3">Identifikátor názvu</th>
                        <th class="px-3">Identifikátor ceny</th>
                        <th class="px-3">Cesta k položkám</th>
                        <th class="px-3">Regex na extrakciu ceny</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookstores as $bookstore)
                        <tr>
                            <td class="p-2">
                                <div class="flex flex-row justify-between">
                                    <div class="h-8 ">
                                        <a class="p-3 mr-2 font-bold text-white rounded-full from-orange-700 bg-gradient-to-r to-amber-500 hover:to-orange-700"
                                            href="{{ route('bookstore.edit', ['bookstore' => $bookstore->id]) }}">Uprav</a>
                                    </div>
                                    <div>
                                        <a class="p-3 mr-2 font-bold text-white rounded-full from-red-700 bg-gradient-to-r to-orange-500 hover:to-red-700"
                                            href="{{ route('bookstore.delete', ['bookstore' => $bookstore->id]) }}">Zmaž</a>
                                    </div>
                                </div>
                            </td>
                            <td class="p-2">{{ $bookstore->name }}</td>
                            <td class="p-2">{{ $bookstore->search_url }}</td>
                            <td class="p-2">{{ $bookstore->name_identifier }}</td>
                            <td class="p-2">{{ $bookstore->price_identifier }}</td>
                            <td class="p-2">{{ $bookstore->path_to_list }}</td>
                            <td class="p-2">{{ $bookstore->price_regex_extractor }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
