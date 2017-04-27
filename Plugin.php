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
            'bedard.socialite.api.manage' => [
                'tab' => 'rainlab.user::lang.plugin.tab',
                'label' => 'bedard.socialite::lang.plugin.permissions.api',
            ],
            'bedard.socialite.thirdparty.manage' => [
                'tab' => 'rainlab.user::lang.plugin.tab',
                'label' => 'bedard.socialite::lang.plugin.permissions.thirdparty',
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
            'api' => [
                'category'      => SettingsManager::CATEGORY_USERS,
                'class'         => 'Bedard\Socialite\Models\ApiSettings',
                'description'   => 'bedard.socialite::lang.api.description',
                'icon'          => 'icon-code',
                'label'         => 'bedard.socialite::lang.api.label',
                'order'         => 600,
                'permissions' => [
                    'bedard.socialite.api.manage',
                    'rainlab.users.access_settings',
                ],
            ],
            'thirdparty' => [
                'category'    => SettingsManager::CATEGORY_USERS,
                'class'       => 'Bedard\Socialite\Models\Settings',
                'description' => 'bedard.socialite::lang.settings.description',
                'icon'        => 'icon-key',
                'label'       => 'bedard.socialite::lang.settings.label',
                'order'       => 700,
                'permissions' => [
                    'bedard.socialite.thirdparty.manage',
                    'rainlab.users.access_settings',
                ],
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
