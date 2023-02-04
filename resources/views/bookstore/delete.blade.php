@extends('layout')

@section('page-content')
    <div class="z-10 w-3/4 px-6 py-10 mx-auto bg-white xl:w-1/2 rounded-2xl">
        <form action=" {{ route('bookstore.destroy', ['bookstore' => $bookstore->id]) }}" method="post"
            enctype="multipart/form-data">
            <div class="py-10 text-xl font-normal text-center">
                @csrf
                @method('DELETE')
                Si si naozaj istý, že chceš odstrániť kníhkupectvo:<span class="font-black ">{{ $bookstore->name }}</span>
            </div>
            <div class="mb-10 text-center">
                <button
                    class="h-12 font-semibold text-white rounded-full px-7 from-red-700 bg-gradient-to-r to-orange-500 hover:to-red-700"
                    type="submit">Zmazať kníhkupectvo</button>
                <a class="py-[15px] font-semibold text-white rounded-full px-7 from-blue-700 bg-gradient-to-r to-blue-500 hover:to-blue-700"
                    class="" href="{{ route('bookstore.index') }}">Späť</a>
            </div>
        </form>
    </div>
@endsection
