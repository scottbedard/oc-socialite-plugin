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
        'twitter_id',
        'twitter_secret',
    ];

    public static function isEnabled()
    {
        return self::get('is_enabled', false);
    }

    //
    // Facebook
    //
    public static function facebookId()
    {
        return Crypt::decrypt(self::get('facebook_id', ''));
    }

    public static function facebookSecret()
    {
        return Crypt::decrypt(self::get('facebook_secret', ''));
    }

    public static function facebookCallback()
    {
        return self::get('facebook_callback', '');
    }

    public static function facebookIsEnabled()
    {
        return self::get('facebook_is_enabled', false);
    }

    //
    // GitHub
    //
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

    //
    // Twitter
    //
    public static function twitterId()
    {
        return Crypt::decrypt(self::get('twitter_id', ''));
    }

    public static function twitterSecret()
    {
        return Crypt::decrypt(self::get('twitter_secret', ''));
    }

    public static function twitterCallback()
    {
        return self::get('twitter_callback', '');
    }

    public static function twitterIsEnabled()
    {
        return self::get('twitter_is_enabled', false);
    }
}
