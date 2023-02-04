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

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
