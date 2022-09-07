# The SideProject API

Sample Laravel API to demonstrate [Scribe's](http://scribe.knuckles.wtf) API documentation capabilities. See the docs at [demo.scribe.knuckles.wtf](http://demo.scribe.knuckles.wtf).


To generate the main docs, run `php artisan scribe:generate`. Docs will be generated to the `docs/` folder, so you can simply open `docs/index.html` in your browser.

There's also a second set of docs, to test Scribe's multi-docs' feature. This uses the config file `config/scribe-alternate.php`, so the command is `php artisan scribe:generate --config scribe-alternate`. They use `laravel` type, so will be accessible at `/alternate/docs` when you start the server.
