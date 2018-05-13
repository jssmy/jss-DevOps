<?php

namespace GitScrum\Classes;

use Auth;

class Slack 
{
    public function tplUser($obj)
    {
            
        return [
            'provider_id' => $obj->id,
            'provider' => 'slack',
            'token' => isset($obj->token) ? $obj->token : null,
            'nickname' => isset($obj->nickname) ? $obj->nickname : null,
            'name' => isset($obj->name) ? $obj->name : nul,
            'email' => isset($obj->token) ? $obj->token : null,
            'avatar' => isset($obj->avatar) ? $obj->avatar : null,
            'email' => isset($obj->email) ? $obj->email : null,
            'main_user_id'=>Auth::guard('userAuth')->user()->id,
        ];
    }

    public function tplMessages(){
        return [
            'latest' => $hist->latest,
            'mesages' => $hist->messages,
            'has_more' => $hist->has_more
        ];
    }


    public function readMessages($count = 50, $obj)
    {
        //dd($repos);
        $channel_id;
        $channels = $this->readChannels($obj)['channels'];
        foreach($channels as $channel){
            if($channel->name == 'general')
                $channel_id = $channel->id;
        }

        $messages = collect(Helper::request('https://slack.com/api/channels.history?token='
            . $obj->token .'&channel='. $channel_id .'&count='. $count));

        foreach($messages["messages"] as $message){
            //$message->profile = $this->findProfile($obj, $message->user); 
        }
        
        //dd(array_reverse($messages["messages"]));
        return array_reverse($messages["messages"]);
    }

    public function readChannels($obj){
        $channels = collect(Helper::request('https://slack.com/api/channels.list?token='
        . $obj->token));

        return $channels;
    }

    public function readMembers($obj){
        $channels = collect(Helper::request('https://slack.com/api/channels.list?token='
        . $obj->token))["channels"];

        $members_team = null;
        foreach($channels as $channel){
            if($channel->name == 'general')
                $members_team = $channel->members;
        }

        $members_user = [];
        $members = $this->readUsers($obj);
        foreach($members as $member){
            foreach($members_team as $member_team){
                if($member->id == $member_team){
                    array_push($members_user, $member);
                }
            }
        }

        return $members_user;
    }

    public function sendMessage($obj, $text){
        $channel_id;
        $channels = $this->readChannels($obj)['channels'];
        foreach($channels as $channel){
            if($channel->name == 'general')
                $channel_id = $channel->id;
        }
       
        $params = [
            //'channel' => $channel_id,
            //'text' => $text
        ];
        
        //dd($params);

        $message = Helper::request('https://slack.com/api/chat.postMessage?token='. 
            $obj->token.'&channel='. $channel_id. '&text=' .$text, 
            true, 
            'POST',
            $params
        );

        //dd($message);
        return (object) $message;
    }

    public function readUsers($obj){
        $users = collect(Helper::request('https://slack.com/api/users.list?token='
        . $obj->token))["members"];

        return $users;
    }

    public function findProfile($obj, $id){
        $users = (object) $this->readMembers($obj);

        foreach($users as $user){
            if($id == $user->id){
                return $user->profile;
            }
        }

        return null;
    }
}
