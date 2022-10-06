<?php

namespace App\Http\Controllers;

use App\Model_Lyodra;
use Illuminate\Http\Request;

class ControllerLyodra extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $lyodra = Model_Lyodra::paginate(3);
    return view('lyodra.lyodra',['lyodra' => $lyodra]);
    }

    public function flyodra()
    {
      $flyodra = Model_Lyodra::paginate(3);
      return view('frontend.flyodra',['flyodra' => $flyodra]);
    }

    public function cariflyodra(Request $request)
    {
      $keyword = $request->get('keyword');
            $flyodra = Model_Lyodra::paginate(10);

           if ($keyword) {
           $flyodra = Model_Lyodra::where("judul","LIKE","%$keyword%")->get();
        }
            return view ('frontend.cariflyodra', compact('flyodra'));
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('lyodra.tambah_lyodra');
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

    Model_Lyodra::create($input);

    return redirect('/lyodra');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Model_Lyodra $lyodra)
    {
        return view ('lyodra.lihat_lyodra', compact ('lyodra'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Model_Lyodra $lyodra)
    {
        return view('lyodra.edit_lyodra', compact('lyodra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model_Lyodra $lyodra)
    {
      Model_Lyodra::where('id', $lyodra->id)
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

 $lyodra->update($input);

return redirect('/lyodra');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_Lyodra $lyodra)
    {
      Model_Lyodra::destroy($lyodra->id);
    return redirect('/lyodra');
    }
}
