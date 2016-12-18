<?php namespace Bedard\Socialite;

use App;
use Backend;
use Illuminate\Foundation\AliasLoader;
use System\Classes\PluginBase;
use System\Classes\SettingsManager;

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
     * Register form widgets.
     *
     * @return array
     */
    public function registerFormWidgets()
    {
        return [
            'Bedard\Socialite\FormWidgets\Callback' => 'callback',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return [
            'bedard.socialite.manage' => [
                'tab' => 'rainlab.user::lang.plugin.tab',
                'label' => 'bedard.socialite::lang.plugin.permissions.socialite',
            ],
        ];
    }

    /**
     * Register settings models.
     *
     * @return array
     */
    public function registerSettings()
    {
        return [
            'socialite' => [
                'label'       => 'bedard.socialite::lang.settings.label',
                'description' => 'bedard.socialite::lang.settings.description',
                'category'    => SettingsManager::CATEGORY_USERS,
                'icon'        => 'icon-key',
                'class'       => 'Bedard\Socialite\Models\Settings',
                'order'       => 600,
                'permissions' => ['rainlab.users.access_settings', 'bedard.socialite.manage'],
            ]
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
