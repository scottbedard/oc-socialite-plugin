<?php namespace Bedard\Socialite\Models;

use Crypt;
use Model;

/**
 * Settings Model
 */
class Settings extends Model
{
    use \October\Rain\Database\Traits\Encryptable;

    /**
     * @var array   Behaviors
     */
    public $implement = ['System.Behaviors.SettingsModel'];

    /**
     * @var string  Settings code
     */
    public $settingsCode = 'bedard_socialite_settings';

    /**
     * @var string  Settings fields
     */
    public $settingsFields = 'fields.yaml';

    /**
     * @var array List of attributes to encrypt.
     */
    protected $encryptable = [
        'facebook_id',
        'facebook_secret',
        'github_id',
        'github_secret',
    ];

    public static function isEnabled()
    {
        return self::get('is_enabled', false);
    }

    public static function githubId()
    {
        return Crypt::decrypt(self::get('github_id', ''));
    }

    public static function githubSecret()
    {
        return Crypt::decrypt(self::get('github_secret', ''));
    }

    public static function githubCallback()
    {
        return self::get('github_callback', '');
    }

    public static function githubIsEnabled()
    {
        return self::get('github_is_enabled', false);
    }
}
