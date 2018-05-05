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
}
