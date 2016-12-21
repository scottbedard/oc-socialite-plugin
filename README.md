# oc-socialite-plugin

Simple authentication for [RainLab.User](https://github.com/rainlab/user-plugin) via [Facebook](#facebook), [GitHub](#github), [Google](#google), and [Twitter](#twitter).

<a name="facebook"></a>
### Facebook authentication

No documentation yet.

<a name="github"></a>
### GitHub authentication

1. Navigate to `/backend/system/settings/update/bedard/socialite/socialite` and click the `GitHub` tab.
2. Click `Use default callback` and copy it to your clipboard.
3. In a new window, [register a new GitHub application](https://github.com/settings/applications/new).
4. Fill out the form in paste in your callback url from step 2.
5. Copy your GitHub `Client ID` and `Client Secret`, and paste them into your socialite settings.
6. Set both `Socialite authentication` and `GitHub authentication` fields to `on`, and click `Save`.
7. Navigate to `/api/bedard/socialite/github` to authenticate via GitHub.

<a name="google"></a>
### Google authentication

No documentation yet.

<a name="twitter"></a>
### Twitter authentication

No documentation yet.
