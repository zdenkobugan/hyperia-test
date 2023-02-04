@extends('layout')

@section('page-content')
    <div class="z-10 w-1/2 p-6 mx-auto bg-white xl:w-1/4 rounded-2xl">
        <div class="flex flex-col">
            <form action="{{ route('books.processSearch') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div>
                    <img src="{{ asset('images/book-svgrepo-com.svg') }}">
                </div>
                <div class="py-10 text-center">
                    <input class="h-12 font-semibold border rounded-full px-7 border-slate-200 text-slate-900" type="text"
                        required id="keyword" name="keyword" placeholder="Nájdi svoju knihu...">
                </div>
                <div class="pb-6 text-center">
                    <button
                        class="h-12 font-semibold text-white rounded-full px-7 from-orange-700 bg-gradient-to-r to-amber-500 hover:to-orange-700"
                        type="submit">Hľadať</button>
                </div>
            </form>
        </div>
    </div>
@endsection
