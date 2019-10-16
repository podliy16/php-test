## Installing
```bash
composer install
composer dump-autoload -o
```


## Test the application
```bash
./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/
```