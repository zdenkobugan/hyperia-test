# Hyperia zadanie - Kníhkupectvo

## Úvod

Pozdravujem do Hyperie, posielam Vám vypracované zadanie - porovnávač cien fiktívnych kníhkupectiev. Riešenie je vypracované na frameworku Laravel 9 s kompletným frontendom na vyhľadávanie, zobrazenie výsledkov, osobitnou sekciou na administračnú správu kníhkupectiev, komplet CRUD akcie - pridanie nového kníkupectva, editácia existujúceho, zmazanie a prehľad všetkých pridaných s príslušným GUI. Pre potreby fiktívnych API responsov je vypracovaný samostatný modul ktorý tieto odpovede generuje z dát uložených v databáze pomocou špecifických šablón pre konkrétne fiktívne URL, je možné ich pridávat dynamicky.

## Nastavenie v lokálnom prostredí

Pre rozbehanie projektu bude potrebné nasledovné:
PHP 8.1 a vyššie
MySQL databáza

- naklonujte si projekt z GitHub repozitára
- nastavte si lokálny web server s PHP a jeho zdroj nastavte na adresár /public
- v MySQL vytvorte novú databázu pre projekt - napr. knihkupectvo
- v root adresári upravte súbor .env - vyplňte údaje v sekcií DB_ správnymi hodnotami pre pripojenie k vytvorenej lokálnej MySQL databáze 
- v root adresári odporúčam spustiť composer install a composer update
- v root adresári spustite npm run dev
- v root adresári spustite príkaz php artisan migrate:fresh --seed pre vytvorenie tabuliek 

## Popis používania projektu

Projekt má niekoľko URL ciest s príslušnými GUI

- / alebo /books - interface na vyhľadávanie, obsahuje input na zadanie kľúčového slova a tlačidlo Hľadať
- /books/search/{keyword} - cesta na priame vrátenie výsledkov vyhľadávania pre zadané kľúčové slovo - keyword URL parameter
- /bookstore/ - cesta pre GUI interface pre pridávanie, úpravu, mazanie či zobrazenie zoznamu pridaných kníhkupectiev s ich špecifikami pre vyhľadávanie (identifikátor pre cenu, názov, regex pre extrakciu ceny ak obsahuje nečíselné znaky, postup (cestu) pre parsovanie prijatých API dát ak je zoznam titulov vnorený.


