<?php

namespace Kalnoy\Cruddy\CKEditor;

use Illuminate\Support\ServiceProvider;
use Kalnoy\Cruddy\Assets;
use Kalnoy\Cruddy\Schema\Fields\Factory;

class CKEditorServiceProvider extends ServiceProvider {

    /**
     * The directory to put assets to.
     *
     * @var string
     */
    protected $assets = 'cruddy/ckeditor';

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../public' => public_path($this->assets),
            __DIR__.'/../assets/vendor/ckeditor' => public_path($this->assets.'/ckeditor'),

        ], 'assets');
    }

    /**
     * Register fields.
     *
     * @param Factory $factory
     */
    protected function registerFields(Factory $factory)
    {
        $factory->register('ckedit', 'Kalnoy\Cruddy\CKEditor\CKEditor');
    }

    /**
     * Register assets.
     *
     * @param Assets $assets
     * @param string $baseDir
     */
    protected function registerAssets(Assets $assets, $baseDir)
    {
        $assets->js(asset($baseDir.'/ckeditor/ckeditor.js'));
        $assets->js(asset($baseDir.'/js/script.min.js'));
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->resolving('cruddy.assets', function ($assets)
        {
            $this->registerAssets($assets, $this->assets);
        });

        $this->app->resolving('cruddy.fields', function ($factory)
        {
            $this->registerFields($factory);
        });
    }

}