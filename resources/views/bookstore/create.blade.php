@extends('layout')

@section('page-content')
    <div class="z-10 w-3/4 px-6 py-10 mx-auto bg-white xl:w-1/2 rounded-2xl">
        <form action=" {{ route('bookstore.store') }}" method="post" enctype="multipart/form-data">
            <div>
                @csrf
                @include('bookstore.components._formBookstore')
            </div>
            <div class="text-center">
                <button
                    class="h-12 font-semibold text-white rounded-full px-7 from-orange-700 bg-gradient-to-r to-amber-500 hover:to-orange-700"
                    type="submit">Pridať nové kníhkupectvo</button>
                <a class="py-[15px] font-semibold text-white rounded-full px-7 from-blue-700 bg-gradient-to-r to-blue-500 hover:to-blue-700"
                    href="{{ route('bookstore.index') }}">Späť</a>
            </div>
        </form>
    </div>
@endsection
