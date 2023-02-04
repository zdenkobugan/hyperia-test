@extends('layout')

@section('page-content')
    <div class="z-10 w-3/4 px-6 py-10 mx-auto bg-white xl:w-1/2 rounded-2xl">
        <form action=" {{ route('bookstore.update', ['bookstore' => $bookstore->id]) }}" method="post"
            enctype="multipart/form-data">
            <div>
                @csrf
                @method('PUT')
                @include('bookstore.components._formBookstore')
            </div>
            <div class="text-center">
                <button
                    class="h-12 font-semibold text-white rounded-full px-7 from-orange-700 bg-gradient-to-r to-amber-500 hover:to-orange-700"
                    type="submit">Upraviť kníhkupectvo</button>
                <a class="py-[15px] font-semibold text-white rounded-full px-7 from-blue-700 bg-gradient-to-r to-blue-500 hover:to-blue-700"
                    class="" href="{{ route('bookstore.index') }}">Späť</a>
            </div>
        </form>
    </div>
@endsection
