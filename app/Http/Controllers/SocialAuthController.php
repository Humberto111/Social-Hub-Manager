<?php

namespace App\Http\Controllers;

use Abraham\TwitterOAuth\TwitterOAuth;
use App\Models\SocialAuth;
use App\Models\SocialPost;
use Facebook\Facebook;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    public function create()
    {
        if(auth()->guest()){
            abort(403);
        }
        return view('publishing', ['post' => SocialPost::all()->where('user_id', auth()->user()->id)->sortBy('hour')->sortBy('date')]);
    }

    public function postToTwitter($post)
    {
        
        if($post->twitter === "on"){
            echo $post->twitter_oauth_token . '\n';
            $push = new TwitterOAuth("a3VgPmpJoOFAXaNyzXGkNiz3T", 
            "Pp8aBMLplN7gzlDqxkvq8SaQRVCQXwMssY0ClADHp3AlvXjdwY", $post->twitter_oauth_token, $post->twitter_oauth_token_secrete);
            $push->setTimeouts(10, 15);
            
            if(!empty(request()->attachment)){
                ddd($media = $push->upload('media/upload', ['media' => request()->attachment]));
                $parameters = [
                    'status' => request()->comment,
                    'media_ids' => $media->media_id_string
                ];
                $push->post("statuses/update", $parameters);
            }else{
                $push->post("statuses/update", ['status'=>$post->comment]);
            }
        }if($post->facebook === "on"){
            $fb = new Facebook([
                'app_id' => '417378169884340',
                'app_secret' => 'd5662706897f9cda908eb0810e59a6b4',
                'default_graph_version' => 'v2.10',
                ]);
              
              $linkData = [
                'link' => 'http://www.example.com',
                'message' => $post->comment,
                ];
              
              try {
                // Returns a `Facebook\FacebookResponse` object
                $response = $fb->post('/me/feed', $linkData, 'EAAF7mm2NjrQBAGMI7VXNDCKaeoWqVXl39kDexgZBqnWGO6ZCvYb6dpkvnojXUmRrwcTZClMUO2cvDbL5lscmM5tnwZAOuZCZBBsjfbIIDRZBaAWp8VFqXqHqRJsZBFBaD82IoZApdJkYv4rLGwGy0wxOZAQITZAri0Mx5oEVBJWa9WRDPQgb2o8nwg8');
              } catch(Facebook\Exceptions\FacebookResponseException $e) {
                echo 'Graph returned an error: ' . $e->getMessage();
                exit;
              } catch(Facebook\Exceptions\FacebookSDKException $e) {
                echo 'Facebook SDK returned an error: ' . $e->getMessage();
                exit;
              }
              
              $graphNode = $response->getGraphNode();     
        }
    }

    public function getTweets()
    {
        if(auth()->guest()){
            abort(403);
        }
        $twitter = SocialAuth::query()->where('user_id', auth()->user()->id)->first();
        $tweets = new TwitterOAuth("a3VgPmpJoOFAXaNyzXGkNiz3T", 
        "Pp8aBMLplN7gzlDqxkvq8SaQRVCQXwMssY0ClADHp3AlvXjdwY", $twitter->twitter_oauth_token, $twitter->twitter_oauth_token_secrete);
        $tweets->setTimeouts(10, 15); 

        return view('history',['tweets'=>$tweets->get("statuses/home_timeline", ['count' => 200, "exclude_replies" => true])]);
    }

    public function SavepostToTwitter()
    {
        $twitter = SocialAuth::query()->where('user_id', auth()->user()->id)->first();
        $save = SocialPost::query()->updateOrCreate(
            ['social_auth_id'=>$twitter->id, 'user_id'=>auth()->user()->id, 'comment'=>request()->comment, 'date'=>request()->date]);
       ddd($save);
        return redirect('mainpage')->with('success', 'Your account has been created');
    }

    public function typePost()
    {
        if(request()->select  === "now"){
            if(request()->twitter === "on"){
                $twitter = SocialAuth::query()->where('user_id', auth()->user()->id)->first();
                $push = new TwitterOAuth("a3VgPmpJoOFAXaNyzXGkNiz3T", 
                "Pp8aBMLplN7gzlDqxkvq8SaQRVCQXwMssY0ClADHp3AlvXjdwY", $twitter->twitter_oauth_token, $twitter->twitter_oauth_token_secrete);
                $push->setTimeouts(10, 15);
                
                if(!empty(request()->attachment)){
                    ddd($media = $push->upload('media/upload', ['media' => request()->attachment]));
                    $parameters = [
                        'status' => request()->comment,
                        'media_ids' => $media->media_id_string
                    ];
                    $push->post("statuses/update", $parameters);
                }else{
                    $push->post("statuses/update", ['status'=>request()->comment]);
                }
            }if(request()->facebook === "on"){
                $fb = new Facebook([
                    'app_id' => '417378169884340',
                    'app_secret' => 'd5662706897f9cda908eb0810e59a6b4',
                    'default_graph_version' => 'v2.10',
                    ]);
                  
                  $linkData = [
                    'link' => 'http://www.example.com',
                    'message' => request()->comment,
                    ];
                  
                  try {
                    // Returns a `Facebook\FacebookResponse` object
                    $response = $fb->post('/me/feed', $linkData, 'EAAF7mm2NjrQBAGMI7VXNDCKaeoWqVXl39kDexgZBqnWGO6ZCvYb6dpkvnojXUmRrwcTZClMUO2cvDbL5lscmM5tnwZAOuZCZBBsjfbIIDRZBaAWp8VFqXqHqRJsZBFBaD82IoZApdJkYv4rLGwGy0wxOZAQITZAri0Mx5oEVBJWa9WRDPQgb2o8nwg8');
                  } catch(Facebook\Exceptions\FacebookResponseException $e) {
                    echo 'Graph returned an error: ' . $e->getMessage();
                    exit;
                  } catch(Facebook\Exceptions\FacebookSDKException $e) {
                    echo 'Facebook SDK returned an error: ' . $e->getMessage();
                    exit;
                  }
                  
                  $graphNode = $response->getGraphNode();
                  
            }
            return redirect("/publishing");
        }else {
            $twitter = SocialAuth::query()->where('user_id', auth()->user()->id)->first();
            $save = SocialPost::query()->updateOrCreate(
                ['social_auth_id'=>$twitter->id, 'user_id'=>auth()->user()->id, 'comment'=>request()->comment, 'facebook'=>request()->facebook, 'twitter'=>request()->twitter, 'hour'=>request()->hour, 'date'=>request()->date]);
        }

        return redirect("/publishing");
    }

    public function delete($id)
    {
        $post = SocialPost::query()->where('id', $id)->first();
        $post->delete();
        return redirect('/publishing')->with('success', 'Your post has been deleted');
    }

    public function edit($id)
    {
        $post = SocialPost::query()->where('id', $id)->first();
        return view('edit', ['post'=>$post]);
    }

    public function update($id)
    {
        $post = SocialPost::query()->where('id', $id)->first();
        $post->comment = request()->comment;
        $post->date = request()->date;
        $post->hour = request()->hour;
        $post->facebook = request()->facebook;
        $post->twitter = request()->twitter;
        $post->save();
        return redirect('/publishing')->with('success', 'Your post has been updated');
    }

    public function cronjob()
    {
        echo date("Y-m-d H:i:s")."\n";
        $posts = SocialPost::join('social_auths', 'social_auths.id', '=', 'social_posts.social_auth_id')->select(
            'social_posts.id',
            'social_posts.comment',
            'social_posts.date',
            'social_posts.hour',
            'social_posts.facebook',
            'social_posts.twitter',
            'social_auths.twitter_oauth_token',
            'social_auths.twitter_oauth_token_secrete',
        )->where('status', "pending")->get();
       
        foreach ($posts as $post) {
            
            if($post->date === date("Y-m-d") && $post->hour === date("H:i")){

                $post->update(['status'=>'published']);
                $this->postToTwitter($post);
            }else if ($post->date === null && $post->hour === null){
                $post->update(['status'=>'published']);
                $this->postToTwitter($post);
            }
        }
    }
}
