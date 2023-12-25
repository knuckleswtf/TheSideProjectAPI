<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Knuckles\Scribe\Scribe;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if (class_exists(\Knuckles\Scribe\Scribe::class)) {
            Scribe::afterGenerating(function (array $paths) {
                if ($paths["html"]) {
                    // Scribe writes the URLs as "../docs/openapi.yaml"
                    // For GitHub Pages, we must remove the "../docs/"
                    $originalContent = file_get_contents($paths['html']);
                    $fixedContent = str_replace("../docs/openapi.yaml", "./openapi.yaml", $originalContent);
                    file_put_contents($paths['html'], $fixedContent);
                }
            });
        }
    }
}
