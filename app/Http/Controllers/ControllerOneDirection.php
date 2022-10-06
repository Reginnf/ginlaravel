<?php

namespace App\Http\Controllers;

use App\Model_OneDirection;
use Illuminate\Http\Request;

class ControllerOneDirection extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $onedirection = Model_OneDirection::paginate(3);
    return view('onedirection.onedirection',['onedirection' => $onedirection]);
    }

    public function fonedirection()
    {
      $fonedirection = Model_OneDirection::paginate(3);
      return view('frontend.fonedirection',['fonedirection' => $fonedirection]);
    }

    public function carifonedirection(Request $request)
    {
      $keyword = $request->get('keyword');
            $fonedirection = Model_OneDirection::paginate(10);

           if ($keyword) {
           $fonedirection = Model_OneDirection::where("judul","LIKE","%$keyword%")->get();
        }

            return view ('frontend.carifonedirection', compact('fonedirection'));
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('onedirection.tambah_onedirection');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
      'judul' => 'required',
      'pencipta' => 'required',
      'durasi' => 'required',
      'rilis' => 'required',
      'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
      ]);

      $input = $request->all();

      if ($image = $request->file('image')) {
      $destinationPath = 'image/';
      $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
      $image->move($destinationPath, $profileImage);
      $input['image'] = "$profileImage";
      }

      Model_OneDirection::create($input);

      return redirect('/onedirection');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Model_OneDirection $onedirection)
    {
        return view ('onedirection.lihat_onedirection', compact ('onedirection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Model_OneDirection $onedirection)
    {
        return view('onedirection.edit_onedirection', compact('onedirection'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model_OneDirection $onedirection)
    {
      Model_OneDirection::where('id', $onedirection->id)
  ->update([
      'judul' => $request->judul,
      'pencipta' => $request->pencipta,
      'durasi' => $request->durasi,
      'rilis' => $request->rilis,
      'image' => $request->image
  ]);

  $input = $request->all();

 if ($image = $request->file('image')) {
     $destinationPath = 'image/';
     $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
     $image->move($destinationPath, $profileImage);
     $input['image'] = "$profileImage";
 }else{
     unset($input['image']);
 }

 $onedirection->update($input);

return redirect('/onedirection');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_OneDirection $onedirection)
    {
      Model_OneDirection::destroy($onedirection->id);
    return redirect('/onedirection');
    }
}
