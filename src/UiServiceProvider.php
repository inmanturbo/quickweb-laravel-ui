<?php

namespace Quickweb\Ui;

use Illuminate\Foundation\Console\PresetCommand;
use Illuminate\Support\ServiceProvider;
use Laravel\Ui\Presets\React;
use Laravel\Ui\Presets\Vue;

class UiServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                UiCommand::class,
            ]);
        }


        PresetCommand::macro('quickweb-bootstrap', function ($command) {

            Presets\Preset::install();
        });

        PresetCommand::macro('quickweb-vue', function ($command) {

            Presets\Preset::install();
            Vue::install();
            copy(__DIR__ . '/Presets/stubs/webpack.mix.js.stub', base_path('webpack.mix.js'));
        });

        PresetCommand::macro('quickweb-react', function ($command) {

            Presets\Preset::install();
            React::install();
            copy(__DIR__ . '/Presets/stubs/webpack.mix.js.stub', base_path('webpack.mix.js'));
        });
    }
}
