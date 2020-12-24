<?php

namespace App\Http\Controllers;

use App\Forum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CreateForumRequest;

class ForumController extends Controller
{
    function __construct() {
        $this->middleware('auth');
        $this->middleware('permission:forum-list');
        $this->middleware('permission:forum-create',['only'=>['create','store']]);
        $this->middleware('permission:forum-edit',['only'=>['edit','update']]);
        $this->middleware('permission:forum-delete',['only'=>['destroy']]);
    }

    public function index()
    {

        $user=Auth::user();
        $forums= Forum::where('parent_id',0)->with('users')->get();

        return view('forums.index',compact('forums'));
    }


    public function create(Forum $forum)
    {
        $user = Auth::user();

        return view('forums.create',compact('user','forum'));
    }


    public function store(CreateForumRequest $request, Forum $forum)
    {
        $user=Auth::user();
        $fields=$request->validated();
        $fields['user_id'] = $user->id;

        $forum::create($fields);

        $message = 'El foro del participante"'. $user->full_name .'"fue registrado correctamente';
        return redirect()->route('forums.index')->with('success', $message);
    }


    public function show(Forum $forum)
    {
        $user = Auth::user();

        return view('forums.show',compact('user','forum'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
