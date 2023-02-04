# Hyperia zadanie - Kníhkupectvo

## Úvod

Pozdravujem do Hyperie, posielam Vám vypracované zadanie - porovnávač cien fiktívnych kníhkupectiev. Riešenie je vypracované na frameworku Laravel 9 s kompletným frontendom na vyhľadávanie, zobrazenie výsledkov, osobitnou sekciou na administračnú správu kníhkupectiev, komplet CRUD akcie - pridanie nového kníkupectva, editácia existujúceho, zmazanie a prehľad všetkých pridaných s príslušným GUI. Pre potreby fiktívnych API responsov je vypracovaný samostatný modul ktorý tieto odpovede generuje z dát uložených v databáze pomocou špecifických šablón pre konkrétne fiktívne URL, je možné ich pridávat dynamicky. Frontend bol implementovaný priamo cez Laravel Blade viewy a štýlovaný pomocou TailwindCSS 3 utility classes.

## Nastavenie v lokálnom prostredí

Pre rozbehanie projektu bude potrebné nasledovné:
PHP 8.1 a vyššie
MySQL 8 databáza

- naklonujte si projekt z GitHub repozitára
- nastavte si lokálny web server s PHP a jeho zdroj nastavte na adresár /public
- v MySQL vytvorte novú databázu pre projekt - napr. knihkupectvo
- v root adresári upravte súbor .env - vyplňte údaje v sekcií DB_ správnymi hodnotami pre pripojenie k vytvorenej lokálnej MySQL databáze 
- v root adresári odporúčam spustiť composer install a composer update
- v root adresári spustite npm install a npm run dev
- v root adresári spustite príkaz php artisan migrate:fresh --seed pre vytvorenie tabuliek a naplnenie dátami

## Popis používania projektu

Projekt má niekoľko URL ciest s príslušnými GUI

- / alebo /books - interface na vyhľadávanie, obsahuje input na zadanie kľúčového slova a tlačidlo Hľadať
- /books/search/{keyword} - cesta na priame vrátenie výsledkov vyhľadávania pre zadané kľúčové slovo - keyword URL parameter - táto cesta samotná je riešením zadania
- /bookstore/ - cesta pre GUI interface pre pridávanie, úpravu, mazanie či zobrazenie zoznamu pridaných kníhkupectiev s ich špecifikami pre vyhľadávanie (identifikátor pre cenu, názov, regex pre extrakciu ceny ak obsahuje nečíselné znaky, postup (cestu) pre parsovanie prijatých API dát ak je zoznam titulov vnorený - cez tento interface je možné pridávať nové kníhkupectvá bez nutnosti úpravy kódu aj keď sa štruktúra ich API odpovedí líši

 ## Organizácia kódu
 
 Pre zhodnotenie projektu najdôležitejšie súbory kódu nájdete:
 
 - kontrolery v adresári app/Http/Controllers
 - modely v adresári app/Models
 - servicy s vyhľadávacou logikou a generovaním fake API resposov v app/Services
 - DB migrácie na vytvorenie DB štruktúry - database/migrations
 - seedre pre seedovanie tabuliek dummy dátami - database/seeders
 - blade viewy pre všetky GUI - resources/views
 - definiciu routes - routes/web.php
 
 

