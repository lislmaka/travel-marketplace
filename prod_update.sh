#!/bin/bash

/opt/php/7.3/bin/php composer.phar install --no-dev --optimize-autoloader
/opt/php/7.3/bin/php artisan migrate:fresh --seed
/opt/php/7.3/bin/php artisan config:cache
/opt/php/7.3/bin/php artisan view:cache
/opt/php/7.3/bin/php artisan route:cache
