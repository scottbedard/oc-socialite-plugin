<?php namespace Bedard\Socialite;

use App;
use Illuminate\Foundation\AliasLoader;
use System\Classes\PluginBase;

/**
 * Socialite Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * @var array Plugin dependencies
     */
    public $require = ['RainLab.User'];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Socialite',
            'description' => 'Socialite API for RainLab.User',
            'author'      => 'Scott Bedard',
            'icon'        => 'icon-key',
        ];
    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {
        $this->registerSocialite();
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'bedard.socialite.some_permission' => [
                'tab' => 'Socialite',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Register socialite.
     *
     * @return void
     */
    protected function registerSocialite()
    {
        App::register('\Laravel\Socialite\SocialiteServiceProvider');

        $alias = AliasLoader::getInstance();
        $alias->alias('Socialite', '\Laravel\Socialite\Facades\Socialite');
    }
}
