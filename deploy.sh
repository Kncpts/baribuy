/home/appxxebl/.bin/php artisan down
rm public/js/app.js
rm public/css/app.css
rm public/js/app.js.LICENSE.txt
/usr/bin/git checkout staging --force
/usr/bin/git pull
/usr/bin/npm install
/home/appxxebl/.bin/php artisan VueTranslation:generate
/usr/bin/npm run dev
/home/appxxebl/.bin/php ./composer.phar install

rm -rf bootstrap/cache/*
/home/appxxebl/.bin/php artisan clear-compiled
/home/appxxebl/.bin/php ./composer.phar dumpautoload
/home/appxxebl/.bin/php artisan cache:clear
/home/appxxebl/.bin/php artisan view:clear
/home/appxxebl/.bin/php artisan config:clear
/home/appxxebl/.bin/php artisan route:clear

/home/appxxebl/.bin/php artisan migrate --force
/home/appxxebl/.bin/php artisan db:seed --force

# Hiding articulate module titles on deployment
# /home/appxxebl/.bin/php artisan edup:hide-articulate-module-titles
/home/appxxebl/.bin/php artisan up
