# oc-socialite-plugin

Simple authentication for [RainLab.User](https://github.com/rainlab/user-plugin) via [Facebook](#facebook), [GitHub](#github), [Google](#google), and [Twitter](#twitter).

<a name="facebook"></a>
### Facebook authentication

1. Navigate to `/backend/system/settings/update/bedard/socialite/socialite` and click the `Facebook` tab.
2. Click `Use default callback` and copy it to your clipboard.
3. In a new window, [navigate to your Facebook developer apps](https://developers.facebook.com/apps) and click `Add a New App`.
4. Fill out the form and click `Create App ID`.
5. Under `Facebook login` click `Get Started`.
6. Click `Facebook login` in the menu on the left under `Products`.
7. Paste your callback url from step 2 into the `Valid OAuth redirect URIs` field, and click `Save`.
8. Click `Dashboard` in the menu on the left.
9. Copy your Facebook `App ID` and `App Secret`, and paste them into your October socialite settings.
10. Set both `Socialite authentication` and `Facebook authentication` fields to `on`, and click `Save`.

To authenticate with Facebook, navigate users to `/api/bedard/socialite/facebook`.

<a name="github"></a>
### GitHub authentication

1. Navigate to `/backend/system/settings/update/bedard/socialite/socialite` and click the `GitHub` tab.
2. Click `Use default callback` and copy it to your clipboard.
3. In a new window, [register a new GitHub application](https://github.com/settings/applications/new).
4. Fill out the form in paste in your callback url from step 2.
5. Copy your GitHub `Client ID` and `Client Secret`, and paste them into your October socialite settings.
6. Set both `Socialite authentication` and `GitHub authentication` fields to `on`, and click `Save`.

To authenticate with GitHub, navigate users to `/api/bedard/socialite/github`.

<a name="google"></a>
### Google authentication

No documentation yet.

<a name="twitter"></a>
### Twitter authentication

No documentation yet.
