<?php

namespace Quickweb\Ui\Presets;

use Laravel\Ui\Presets\Preset as LaravelUiPreset;

class Preset extends LaravelUiPreset
{
    /**
     * Install the preset.
     *
     * @return void
     */
    public static function install()
    {
        static::updatePackages();
        static::updateSass();
        static::updateScripts();
        static::removeNodeModules();
        static::updateMix();
        static::updateViews();
    }

    /**
     * @param array $packages
     * @return array
     */
    protected static function updatePackageArray(array $packages)
    {
        return [
            'bootstrap' => '^4.0.0',
            'jquery' => '^3.2',
            'popper.js' => '^1.12',
            '@fortawesome/fontawesome-free' => '^5.12.0',
            'materialize-css' => '^1.0.0-rc.2',
            'material-icons' => '^0.3.1',
            '@neos21/bootstrap3-glyphicons' => '^1.0.4',
            'codemirror' => '^5.49.0',
            'jexcel' => '^3.6.2',
            'jquery-colorbox' => '^1.6.4',
            'jquery-contextmenu' => '^2.9.0',
            'jquery-slimscroll' => '^1.3.8',
            'select2' => '^4.0.12',
            'datatables.net' => '^1.10.20',
            'datatables.net-dt'  => '^1.10.20',
            'datatables.net-bs4' => '^1.10.20',
            'datatables.net-autofill'  => '^2.3.4',
            'datatables.net-autofill-dt' => '^2.3.4',
            'datatables.net-autofill-bs4' => '^2.3.4',
            'datatables.net-buttons' => '^1.6.1',
            'datatables.net-buttons-dt' => '^1.6.1',
            'datatables.net-colreorder' => '^1.5.2',
            'datatables.net-colreorder-dt'  => '^1.5.2',
            'datatables.net-colreorder-bs4'  => '^1.5.2',
            'datatables.net-fixedcolumns' => '^3.3.0',
            'datatables.net-fixedcolumns-dt' => '^3.3.0',
            'datatables.net-fixedcolumns-bs4' => '^3.3.0',
            'datatables.net-keytable' => '^2.5.1',
            'datatables.net-keytable-dt' => '^2.5.1',
            'datatables.net-keytable-bs4' => '^2.5.1',
            'datatables.net-rowgroup'  => '^1.1.1',
            'datatables.net-rowgroup-dt'  => '^1.1.1',
            'datatables.net-rowgroup-bs4'  => '^1.1.1',
            'datatables.net-responsive' => '^2.2.3',
            'datatables.net-responsive-dt' => '^2.2.3',
            'datatables.net-responsive-bs4' => '^2.2.3',
            'datatables.net-scroller' => '^2.0.1',
            'datatables.net-scroller-dt' => '^2.0.1',
            'datatables.net-scroller-bs4' => '^2.0.1',
            'datatables.net-searchpanes'  => '^1.0.1',
            'datatables.net-searchpanes-dt'  => '^1.0.1',
            'datatables.net-searchpanes-bs4'  => '^1.0.1',
            'datatables.net-select' => '^1.3.1',
            'datatables.net-select-dt' => '^1.3.1',
            'datatables.net-select-bs4' => '^1.3.1',
        ] + $packages;
    }

    /**
     * Update the Sass files for the application.
     *
     * @return void
     */
    protected static function updateSass()
    {
        copy(__DIR__ . '/stubs/_variables.scss.stub', resource_path('sass/_variables.scss'));
        copy(__DIR__ . '/stubs/_sidebar-layout.scss.stub', resource_path('sass/_sidebar-layout.scss'));
        copy(__DIR__ . '/stubs/bootstrap.scss.stub', resource_path('sass/bootstrap.scss'));
        copy(__DIR__ . '/stubs/materialize.scss.stub', resource_path('sass/materialize.scss'));
    }

    /**
     *Update the views files for the application.
     */
    protected static function updateViews()
    {
        copy(__DIR__ . '/stubs/main.blade.php.stub', resource_path('views/main.blade.php'));
        copy(__DIR__ . '/stubs/dev.blade.php.stub', resource_path('views/dev.blade.php'));
    }

    /**
     * Update webpack mix.
     */
    protected static function updateMix()
    {
        copy(__DIR__ . '/stubs/webpack.mix.js.stub', base_path('webpack.mix.js'));
    }

    /**
     * Update javascript files for the application
     */
    protected static function updateScripts()
    {
        copy(__DIR__ . '/stubs/app.js.stub', resource_path('js/app.js'));
        copy(__DIR__ . '/stubs/bootstrap.js.stub', resource_path('js/bootstrap.js'));
        copy(__DIR__ . '/stubs/bootstrap4.js.stub', resource_path('js/bootstrap4.js'));
        copy(__DIR__ . '/stubs/fontawesome-free.js.stub', resource_path('js/fontawesome-free.js'));
        copy(__DIR__ . '/stubs/materialize-css.js.stub', resource_path('js/materialize-css.js'));
    }
}
