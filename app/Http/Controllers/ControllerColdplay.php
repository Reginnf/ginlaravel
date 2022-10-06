<?php

namespace App\Http\Controllers;

use App\Model_Coldplay;
use Illuminate\Http\Request;

class ControllerColdplay extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $coldplay = Model_Coldplay::paginate(3);
    return view('coldplay.coldplay',['coldplay' => $coldplay]);
    }

    public function fcoldplay()
    {
      $fcoldplay = Model_Coldplay::paginate(3);
      return view('frontend.fcoldplay',['fcoldplay' => $fcoldplay]);
    }

    public function carifcoldplay(Request $request)
    {
      $keyword = $request->get('keyword');
            $fcoldplay = Model_Coldplay::paginate(10);

           if ($keyword) {
           $fcoldplay = Model_Coldplay::where("judul","LIKE","%$keyword%")->get();
        }
            return view ('frontend.carifcoldplay', compact('fcoldplay'));
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('coldplay.tambah_coldplay');
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

    Model_Coldplay::create($input);

    return redirect('/coldplay');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Model_Coldplay $coldplay)
    {
        return view ('coldplay.lihat_coldplay', compact ('coldplay'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Model_Coldplay $coldplay)
    {
        return view('coldplay.edit_coldplay', compact('coldplay'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model_Coldplay $coldplay)
    {
      Model_Coldplay::where('id', $coldplay->id)
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

 $coldplay->update($input);

return redirect('/coldplay');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_Coldplay $coldplay)
    {
      Model_Coldplay::destroy($coldplay->id);
    return redirect('/coldplay');
    }
}
