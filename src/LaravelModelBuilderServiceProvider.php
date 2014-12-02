<?php
namespace Fruty\LaravelModelBuilder;

use Illuminate\Support\ServiceProvider;
use Config;

/**
 * Class LaravelModelBuilderServiceProvider
 * @package Fruty\LaravelModelBuilder
 * @author Fruty <ed.fruty@gmail.com>
 */
class LaravelModelBuilderServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->package('ed-fruty/custom-model-builder', 'ed-fruty/custom-model-builder', __DIR__);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
} 