<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\MessageEvent;
use App\Http\Resources\MessageResource;
use App\Http\Resources\UserResource;
use App\Message;
use App\Project;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request, $id = null)
    {
        $id = $request->query('id');
        $project = Project::with('files')->where('id',$id)->first();

        return view('home', compact('id','project'));
    }

    public function first(Request $request, $id = null)
    {
        $id = $request->query('id');
        $project = Project::with('files')->where('id',$id)->first();

        $this->firstConsult($id);
        return view('home', compact('id','project'));
    }

    public function firstConsult($id)
    {

        $data = array();

        $project = Project::with('files')->where('id',$id)->first();
        $data['to_id'] = 3;
        $data['id_project'] = $id;
        $data['content'] = '#'.$id.' '.$project->description;
        $data['from_id'] = Auth::user()->id;

        $message = Message::create($data);

        event(new MessageEvent($message));

        $message = new MessageResource($message);

        //return response()->json($message);
    }

    public function consultation()
    {
        return view('consultation');
    }
}
