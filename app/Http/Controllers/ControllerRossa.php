<?php

namespace App\Http\Controllers;

use App\Model_Rossa;
use Illuminate\Http\Request;

class ControllerRossa extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $rossa = Model_Rossa::paginate(3);
    return view('rossa.rossa',['rossa' => $rossa]);
    }

    public function frossa()
    {
      $frossa = Model_Rossa::paginate(3);
      return view('frontend.frossa',['frossa' => $frossa]);
    }

    public function carifrossa(Request $request)
    {
      $keyword = $request->get('keyword');
            $frossa = Model_Rossa::paginate(10);

           if ($keyword) {
           $frossa = Model_Rossa::where("judul","LIKE","%$keyword%")->get();
        }

            return view ('frontend.carifrossa', compact('frossa'));
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rossa.tambah_rossa');
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

    Model_Rossa::create($input);

    return redirect('/rossa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Model_Rossa $rossa)
    {
        return view ('rossa.lihat_rossa', compact ('rossa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Model_Rossa $rossa)
    {
        return view ('rossa.edit_rossa', compact ('rossa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model_Rossa $rossa)
    {
      Model_Rossa::where('id', $rossa->id)
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

 $rossa->update($input);

return redirect('/rossa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_Rossa $rossa)
    {
      Model_Rossa::destroy($rossa->id);
    return redirect('/rossa');
    }
}
