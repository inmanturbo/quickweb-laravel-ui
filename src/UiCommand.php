<?php

namespace Quickweb\Ui;

use Laravel\Ui\UiCommand as OriginalCommand;

use InvalidArgumentException;


class UiCommand extends OriginalCommand
{
    /**
     * The console command signature.
     *
     * @var string
     */
    protected $signature = 'qwui
                    { type : The preset type (bootstrap, vue, react) }
                    { --auth : Install authentication UI scaffolding }
                    { --option=* : Pass an option to the preset command }';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Swap the front-end scaffolding for the application';

    /**
     * Execute the console command.
     *
     * @return void
     *
     * @throws \InvalidArgumentException
     */
    public function handle()
    {
        if (static::hasMacro($this->argument('type'))) {
            return call_user_func(static::$macros[$this->argument('type')], $this);
        }

        if (!in_array($this->argument('type'), ['bootstrap', 'vue', 'react'])) {
            throw new InvalidArgumentException('Invalid preset.');
        }

        $this->{$this->argument('type')}();

        if ($this->option('auth')) {
            $this->call('ui:auth');
        }
    }

    /**
     * Install the "bootstrap" preset.
     *
     * @return void
     */
    protected function bootstrap()
    {
        Presets\Preset::install();

        $this->info('Bootstrap scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }

    /**
     * Install the "vue" preset.
     *
     * @return void
     */
    protected function vue()
    {
        Presets\Preset::install();
        \Laravel\Ui\Presets\Vue::install();
        copy(__DIR__ . '/Presets/stubs/webpack.mix.js.stub', base_path('webpack.mix.js'));

        $this->info('Vue scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }

    /**
     * Install the "react" preset.
     *
     * @return void
     */
    protected function react()
    {
        Presets\Preset::install();
        \Laravel\Ui\Presets\React::install();
        copy(__DIR__ . '/Presets/stubs/webpack.mix.js.stub', base_path('webpack.mix.js'));

        $this->info('React scaffolding installed successfully.');
        $this->comment('Please run "npm install && npm run dev" to compile your fresh scaffolding.');
    }
}
