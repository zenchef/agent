<?php namespace Jenssegers\Agent;

use Illuminate\Support\ServiceProvider;

class AgentServiceProvider extends ServiceProvider {

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        //
    }

    /*public function register()
    {
        $this->app['agent'] = $this->app->share(function ($app)
        {
            return new Agent($app['request']->server->all());
        });
    }*/

    public function register()
    {
        $this->app->singleton('agent', function ($app) {
            return new Agent($app['request']->server());
        });
        $this->app->alias('agent', Agent::class);
    }

}
