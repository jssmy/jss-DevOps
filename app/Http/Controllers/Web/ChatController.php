<?php

namespace GitScrum\Http\Controllers\web;

//use GitScrum\Http\Controllers\Controller;

use Illuminate\Http\Request;
use GitScrum\Models\User;
use Auth;
use Socialite;
use SocialiteProviders\Manager\Exception\InvalidArgumentException;


class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //dd($request);
        //$backlogs = ProductBacklog::where('user_id',Auth::user()->githubUser()->id)
        //->paginate(env('APP_PAGINATE'));
        //dd($backlogs); jaja que haces oe
        //return view('chat.index');
        //    ->with('backlogs', $backlogs);
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductBacklogRequest $request, $mode='default')
    {
                
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $slug)
    {   
        $messages = (object) app(User::find($slug)->provider)->readMessages(50, User::find($slug));
        $members = (object) app(User::find($slug)->provider)->readMembers(User::find($slug));
        //dd($members);
        return view('chat.show', ['messages' => $messages], ['chat_id' => $slug, 'members' => $members]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ProductBacklogRequest $request, $slug)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
