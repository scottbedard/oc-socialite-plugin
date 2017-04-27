<?php namespace Bedard\Socialite\Models;

use Model;

/**
 * ApiSettings Model
 */
class ApiSettings extends Model
{
    /**
     * @var array   Behaviors
     */
    public $implement = ['System.Behaviors.SettingsModel'];

    /**
     * @var string  Settings code
     */
    public $settingsCode = 'bedard_socialite_api_settings';

    /**
     * @var string  Settings fields
     */
    public $settingsFields = 'fields.yaml';

    public static function isEnabled()
    {
        return self::get('is_enabled', false);
    }
}
