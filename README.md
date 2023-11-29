# WP3 Tokori

UBSI WP3 final project: Tokori (Point of sale application integrated with barcode scanner)

## Server Requirements

PHP version 7.4 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

## Development

Configure database connection with .env file, migrate using command

```
php spark migrate
```

Seeds default account (because we do not use registration form, look UsersSeeder file for get account information)

```
php spark db:seed UsersSeeder
```

Running on your localhost server

```
php spark serve
```