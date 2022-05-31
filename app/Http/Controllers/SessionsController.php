<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use PragmaRX\Google2FA\Google2FA;
use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\SocialAuth;
use Facebook\Facebook;

class SessionsController extends Controller
{
    public function create()
    {
        return view('sessions.create');
    }

    public function createlogin2FA()
    {
        return view('google2fa.index');
    }

    public function index()
    {
        if(auth()->guest()){
            abort(403);
        }
        return view('mainpage');
    }

    public function dashboard()
    {
        if(auth()->guest()){
            abort(403);
        }
        $twitter = SocialAuth::query()->where('user_id', auth()->user()->id)->first();
        return view('dashboard', compact('twitter'));
    }

    public function store()
    {
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('login2FA');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provided credentials could not be verified'
        ]);
    }

    public function loginCode2FA()
    {
        request()->validate(['google2fa_secret' => 'required']);

        if ((new Google2FA())->verifyKey(auth()->user()->google2fa_secret, request()->google2fa_secret)) {
            return redirect('mainpage')->with('success', 'Welcome Back!');
        }

        return redirect()->back()->withErrors(['error' => 'Código de verificación incorrecto']);
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Goodbye!');
    }

    public function get_facebook()
    {
        if(auth()->guest()){
            abort(403);
        }
        $fb = new Facebook([
            'app_id' => '417378169884340',
            'app_secret' => 'd5662706897f9cda908eb0810e59a6b4',
            'default_graph_version' => 'v2.10',
            ]);
          
          try {
            // Returns a `Facebook\FacebookResponse` object
            $response = $fb->get('/me/feed', 'EAAF7mm2NjrQBAGMI7VXNDCKaeoWqVXl39kDexgZBqnWGO6ZCvYb6dpkvnojXUmRrwcTZClMUO2cvDbL5lscmM5tnwZAOuZCZBBsjfbIIDRZBaAWp8VFqXqHqRJsZBFBaD82IoZApdJkYv4rLGwGy0wxOZAQITZAri0Mx5oEVBJWa9WRDPQgb2o8nwg8');
          } catch(Facebook\Exceptions\FacebookResponseException $e) {
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
          } catch(Facebook\Exceptions\FacebookSDKException $e) {
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
          }

          $number = count($response->getDecodedBody()['data']);
          $send = [];
          for ($i=0; $i < $number; $i++) { 
            array_push($send, $response->getDecodedBody()['data'][$i]);
          }
          return view('historyFacebook',['posts'=>$send]);
    }

    public function connect_twitter(Request $request)
    {
        $callback = redirect("media");

        // consumer key and consumer key secret below
        $connection = new TwitterOAuth("a3VgPmpJoOFAXaNyzXGkNiz3T", "Pp8aBMLplN7gzlDqxkvq8SaQRVCQXwMssY0ClADHp3AlvXjdwY");
        $access_token = $connection->oauth('oauth/request_token', ['oauth_callback'=>$callback]);

        $route = $connection->url('oauth/authorize', ['oauth_token'=>$access_token['oauth_token']]);
        return redirect($route);
    }

    public function media_cbk(Request $request)
    {
        $response = $request->all();

        $oauth_token = $response['oauth_token'];
        $oauth_verifier = $response['oauth_verifier'];

        $connection = new TwitterOAuth("a3VgPmpJoOFAXaNyzXGkNiz3T", 
        "Pp8aBMLplN7gzlDqxkvq8SaQRVCQXwMssY0ClADHp3AlvXjdwY", $oauth_token, $oauth_verifier);

        $token = $connection->oauth('oauth/access_token', ['oauth_verifier'=>$oauth_verifier]);

        $new_oauth_token = $token['oauth_token'];
        $screen_name = $token['screen_name'];
        $oauth_token_secrete = $token['oauth_token_secret'];

        $save = SocialAuth::query()->updateOrCreate(
            ['user_id'=>auth()->user()->id, 'twitter_screen_name'=>$screen_name],
            ['twitter_oauth_token'=>$new_oauth_token, 'twitter_oauth_token_secrete'=>$oauth_token_secrete]
        );

        return redirect('dashboard');
    }

    public function postToTwitter($oauth_token, $oauth_token_secrete)
    {
        $push = new TwitterOAuth("a3VgPmpJoOFAXaNyzXGkNiz3T", 
        "Pp8aBMLplN7gzlDqxkvq8SaQRVCQXwMssY0ClADHp3AlvXjdwY", $oauth_token, $oauth_token_secrete);
        $push->setTimeouts(10, 15);
        ddd($push->post("statuses/update", ['status'=>'Hello Twitter. Just testing my app']));

        return redirect("mainpage");
    }
}
