<?php

namespace Kalnoy\Cruddy\CKEditor;

use Illuminate\Support\ServiceProvider;

class CKEditorServiceProvider extends ServiceProvider {

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->package('cruddy/ckeditor', 'cruddy-ckeditor', realpath(__DIR__.'/../../../'));
    }

    /**
     * Register fields.
     */
    protected function registerFields($factory)
    {
        $factory->register('ckedit', 'Kalnoy\Cruddy\CKEditor\CKEditor');
    }

    /**
     * Register assets.
     */
    protected function registerAssets($assets, $baseDir)
    {
        $assets->js(asset($baseDir.'/ckeditor/ckeditor.js'));
        $assets->js(asset($baseDir.'/script.js'));
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
            $this->registerAssets($assets, 'packages/cruddy/ckeditor');
        });

        $this->app->resolving('cruddy.fields', function ($factory)
        {
            $this->registerFields($factory);
        });
    }

}