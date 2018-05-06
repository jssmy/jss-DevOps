<?php

namespace GitScrum\Observers;

use GitScrum\Models\Board;
use Auth;
use Stevenmaguire\Services\Trello\Client as TrelloClient;


class BoardObserver
{

    private $trello_client;


    public function creating(Board $board)
    {
    	      	
    	$b= $this->post_createBoardTrello($board->name,$board->desc);
    	dd($b);
    }

    


    private function post_createBoardTrello($project_name,$project_desc){
        $result= $this->connect_trello();
        if(!$result){
            return [];
        }
        $attributes = ['name'=>$project_name,'desc'=>$project_desc];
        $board = $this->trello_client->addBoard($attributes);
        return $board;
    }


    /*******/
    public function connect_trello(){
	    $user= Auth::user()->trelloUser();
	    $this->trello_client = new TrelloClient([
	        'domain' => 'https://trello.com',
	        'key' =>env('TRELLO_CLIENT_ID'),
	        'scope' => 'read,write',
	        'token'  =>$user->token,
	        'version' => '1',
	        ]);
	    return true;
    }





}
 