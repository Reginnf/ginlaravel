<?php

namespace App\Http\Controllers;

use App\Model_AvaMax;
use Illuminate\Http\Request;

class ControllerAvaMax extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $avamax = Model_AvaMax::paginate(3);
    return view('avamax.avamax',['avamax' => $avamax]);
    }

    public function favamax()
    {
      $favamax = Model_AvaMax::paginate(3);
      return view('frontend.favamax',['favamax' => $favamax]);
    }

    public function carifavamax(Request $request)
    {
      $keyword = $request->get('keyword');
            $favamax = Model_AvaMax::paginate(10);

           if ($keyword) {
           $favamax = Model_Avamax::where("judul","LIKE","%$keyword%")->get();
        }
            return view ('frontend.carifavamax', compact('favamax'));
      }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('avamax.tambah_avamax');
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

    Model_Avamax::create($input);

    return redirect('/avamax');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Model_AvaMax $avamax)
    {
        return view ('avamax.lihat_avamax', compact ('avamax'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Model_AvaMax $avamax)
    {
        return view('avamax.edit_avamax', compact('avamax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model_AvaMax $avamax)
    {
      Model_AvaMax::where('id', $avamax->id)
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

 $avamax->update($input);

return redirect('/avamax');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_AvaMax $avamax)
    {
      Model_AvaMax::destroy($avamax->id);
    return redirect('/avamax');
    }
}
