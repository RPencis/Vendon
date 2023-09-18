# Vendon
## Šo vajag obligāi
php.ini nomainīt **session.auto_start=0** uz **session.auto_start=1**
## Composer
Projektā tiek izmantotas pāris trešo pušu bibliotēkas
tas nozīmē ka pirms projekta palaišanas ir nepieciešams projekta **root** mapē izmantojot **cmd**
palaist **composer install**

## Darbināšana
Es datubāzei izmantojo **xampp** iebūvēto MySQL risinājumu

Bet **PHP serveri** darbinu ar cmd izmantojo komandu:
**php -S localhost:8000 -t public/**

## Datubāzes dump fails
 **vendon.sql** atrodas projekta **/mysqldump** mapīte