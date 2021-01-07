<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ConsultationController extends Controller
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
    public function index()
    {
        return view('consultation');
    }

    public function store(Request $request)
    {
        $validasi = $this->validate($request, [
            'file' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=980,min_height=480|max:1024',
            'description' => 'required',
            'name' => 'required',
            'contact' => 'required',
            'price' => 'required'
        ]);

        $banner = new Project;
        $foto = $request->file('file');
        if($foto) {
            $banner_path = $foto->store('files', 'public');
            $banner->file = $banner_path;
        }
        $banner->name    = $request->name;
        $banner->description    = $request->description;
        $banner->price    = $request->price;
        $banner->contact  = $request->link;
        $banner->id_user = Auth::user()->id;
        $banner->save();

        return redirect()->back()->with('status', 'Berhasil menyimpan data konsultasi');
    }

    public function show($id)
    {
    
    }

    public function edit($id)
    {
        
    }

    public function update(Request $request, $id)
    {
        $validasi = $this->validate($request, [
            'file' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=980,min_height=480|max:1024',
            'description' => 'required',
            'name' => 'required',
            'contact' => 'required',
            'price' => 'required'
        ]);

        $banner = Project::findOrfail($id);

        $foto = $request->file('file');
        if($foto){
            if($banner->file && file_exists(storage_path('app/public/' . $banner->file))) { 
                Storage::delete('public/'. $banner->file);
            }
            $foto_path = $foto->store('files', 'public');
            $banner->file = $foto_path;
        }
        $banner->name    = $request->name;
        $banner->description    = $request->description;
        $banner->price    = $request->price;
        $banner->contact  = $request->link;
        $banner->id_user = Auth::user()->id;
        $banner->save();


        return redirect()->back()->with('status', 'Data konsultasi berhasil diubah');
    }


}
