@extends('layout')

@section('page-content')
    <div class="z-10 w-3/4 p-6 mx-auto bg-white rounded-2xl">
        <div class="flex flex-col">
            <table class="table-auto">
                @foreach ($results as $result)
                    <tr class="">
                        <td class="text-xl font-bold">{{ $result['name'] }}</td>
                        <td>{{ $result['bookstore_name'] }}</td>
                        <td class="font-bold">
                            <div class="pl-10 text-3xl text-blue-900">{{ $result['price'] }}€</div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
