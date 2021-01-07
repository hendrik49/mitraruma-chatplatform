<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
            'file' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=980,min_height=480|max:1024'
        ]);

        $banner = new \App\Banner;
        $foto = $request->file('dokumentasi');
        if($foto) {
            $banner_path = $foto->store('fotobanner', 'public');
            $banner->dokumentasi = $banner_path;
        }
        $banner->nama    = $request->nama;
        $banner->link  = $request->link;
        $banner->created_by = Auth::user()->id;
        $banner->save();
        Cache::flush();

        return redirect()->back()->with('status', 'Berhasil Menambahkan banner');
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
            'dokumentasi' => 'image|mimes:jpeg,png,jpg|dimensions:min_width=980,min_height=480|max:1024'
        ]);

        $banner = \App\Banner::findOrfail($id);

        $foto = $request->file('dokumentasi');
        if($foto){
            if($banner->dokumentasi && file_exists(storage_path('app/public/' . $banner->dokumentasi))) { 
                \Storage::delete('public/'. $banner->dokumentasi);
            }
            $foto_path = $foto->store('fotobanner', 'public');
            $banner->dokumentasi = $foto_path;
        }
        $banner->nama    = $request->nama;
        $banner->link  = $request->link;
        $banner->updated_by    = Auth::user()->name;
        $banner->save();
        Cache::flush();

        return redirect()->back()->with('status', 'Data banner Telah Diedit');
    }


}
