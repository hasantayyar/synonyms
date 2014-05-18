<?php

namespace Hasantayyar\Synonyms;

use Illuminate\Support\ServiceProvider;

class SynonymsServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot() {
        $this->package('hasantayyar/synonyms');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register() {
        $this->app['synonyms'] = $this->app->share(function($app) {
            return new Synonyms;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides() {
        return array();
    }

}
