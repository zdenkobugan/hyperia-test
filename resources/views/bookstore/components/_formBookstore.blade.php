<h3 class="text-xl font-black text-center">Prosím zadaj nastavenie kníhkupectva: </h3>
<div class="flex flex-col mt-6 mb-10 ">
    <div class="mt-3 text-center"><label for="name">Meno kníhkupectva:</label></div>
    <div class="text-center"><input
            class="h-12 font-semibold border rounded-full w-96 px-7 border-slate-200 text-slate-900" type="text"
            required name="name" id="name" value="{{ old('name', $bookstore->name ?? null) }}"></div>

    <div class="mt-3 text-center"><label for="search_url">API URL:</label></div>
    <div class="text-center"><input
            class="h-12 font-semibold border rounded-full w-96 px-7 border-slate-200 text-slate-900" type="text"
            required name="search_url" id="search_url" value="{{ old('search_url', $bookstore->search_url ?? null) }}">
    </div>

    <div class="mt-3 text-center"><label for="name_identifier">Identifikátor názvu:</label></div>
    <div class="text-center"><input
            class="h-12 font-semibold border rounded-full w-96 px-7 border-slate-200 text-slate-900" type="text"
            required name="name_identifier" id="name_identifier"
            value="{{ old('name_identifier', $bookstore->name_identifier ?? null) }}"></div>

    <div class="mt-3 text-center"><label for="price_identifier">Identifikátor ceny:</label></div>
    <div class="text-center"><input
            class="h-12 font-semibold border rounded-full w-96 px-7 border-slate-200 text-slate-900" type="text"
            required name="price_identifier" id="price_identifier"
            value="{{ old('price_identifier', $bookstore->price_identifier ?? null) }}"></div>

    <div class="mt-3 text-center"><label for="path_to_list">Cesta k položkám (JSON):</label></div>
    <div class="text-center"><input
            class="h-12 font-semibold border rounded-full w-96 px-7 border-slate-200 text-slate-900" type="text"
            name="path_to_list" id="path_to_list" value="{{ old('path_to_list', $bookstore->path_to_list ?? null) }}">
    </div>

    <div class="mt-3 text-center"><label for="price_regex_extractor">Regex na extrakciu ceny (nezadávaj ak cena je len
            číslo):</label></div>
    <div class="text-center"><input
            class="h-12 font-semibold border rounded-full w-96 px-7 border-slate-200 text-slate-900" type="text"
            name="price_regex_extractor" id="price_regex_extractor"
            value="{{ old('price_regex_extractor', $bookstore->price_regex_extractor ?? null) }}"></div>
</div>
