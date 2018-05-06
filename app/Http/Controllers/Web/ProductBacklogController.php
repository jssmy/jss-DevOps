<?php

namespace GitScrum\Http\Controllers\Web;

use Illuminate\Http\Request;
use GitScrum\Http\Requests\ProductBacklogRequest;
use GitScrum\Models\ProductBacklog;
use Auth;
 use GitScrum\Models\Board;
class ProductBacklogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $mode = 'default')
    {

        $backlogs = ProductBacklog::where('user_id',Auth::user()->githubUser()->id)
        ->paginate(env('APP_PAGINATE'));
        return view('product_backlogs.index-'.$mode)
            ->with('backlogs', $backlogs);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product_backlogs.create')
            ->with('action', 'Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ProductBacklogRequest $request)
    {
        //dd($request->all());
        $data= $request->all();
        $productBacklog = ProductBacklog::create($data);
        /*
        Board::create([
            'name'=>'sdsds',
            'desc'=>'asdfdf',
        ]);*/
        return redirect()->route('product_backlogs.show', ['slug' => $productBacklog->slug])
            ->with('success','Se ha agregado a favoritos');
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
        $productBacklog = ProductBacklog::slug($slug)
            ->with('sprints')
            ->with('userStories')
            ->first();

        return view('product_backlogs.show')
            ->with('productBacklog', $productBacklog)
            ->with('search', (!isset($search)) ? null : $search);
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
        $productBacklog = ProductBacklog::slug($slug)->first();

        return view('product_backlogs.edit')
            ->with('productBacklog', $productBacklog)
            ->with('action', 'Edit');
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
        $productBacklog = ProductBacklog::slug($slug)->first();
        $productBacklog->update($request->all());

        return back()
            ->with('success','Se ha actualizado sin problemas');
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
