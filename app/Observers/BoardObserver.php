<?php

namespace GitScrum\Observers;

use GitScrum\Models\Board;
use Auth;
use GitScrum\Classes\Helper;
//use GitScrum\Config;
class BoardObserver
{
    public function creating(Board $board)
    {
    	/*$key=env('TRELLO_CLIENT_ID');
    	dd(Auth::user());
    	$token=Auth::user()->trelloUser()->token;
      	$url='https://api.trello.com/1/boards/?name=_NAME_&desc=_DESC_&key=_KEY_&token=_TOKEN_';
      	$url=str_replace(
      		['_NAME_','_DESC_','_KEY_','_TOKEN_'],
      		[$board->name,$board->desc,$key,$token],
      		$url);

      		dd($url);
    	//Helper::request();
*/
    }
}
 