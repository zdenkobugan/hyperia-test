@extends('layout')

@section('page-content')
    <div class="z-10 w-3/4 p-6 mx-auto bg-white rounded-2xl">
        <div class="flex flex-col">
            @if (empty($results))
                <p>Pre zadané slovo neboli nájdené žiadne výsledky, skúste znovu...</p>
            @else
                <table class="table-auto">
                    <thead>
                        <tr>
                            <th class="pl-10 text-left">
                                Názov titulu
                            </th>
                            <th class="text-left">
                                Kníhkupectvo
                            </th>
                            <th class="pr-10 text-right">
                                Cena
                            </th>
                        </tr>
                    </thead>
                    @php
                        $minimalValue = null;
                    @endphp
                    @foreach ($results as $result)
                        @php
                            if ($minimalValue === null || $minimalValue > $result['price']) {
                                $minimalValue = $result['price'];
                            }
                        @endphp
                        <tr class="">
                            <td class="pl-10 text-xl font-bold">{{ $result['name'] }}</td>
                            <td>{{ $result['bookstore_name'] }}</td>
                            <td class="font-bold text-right">
                                <div
                                    class="pl-10 pr-10 text-3xl font-black {{ $minimalValue == $result['price'] ? 'text-red-800' : 'text-blue-900' }}">
                                    {{ $result['price'] }}€</div>
                            </td>
                        </tr>
                    @endforeach
                </table>
            @endif
        </div>
    </div>
@endsection
