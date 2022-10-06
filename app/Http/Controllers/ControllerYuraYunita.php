<?php

namespace App\Http\Controllers;

use App\Model_YuraYunita;
use Illuminate\Http\Request;

class ControllerYuraYunita extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $yurayunita = Model_YuraYunita::paginate(3);
    return view('yurayunita.yurayunita',['yurayunita' => $yurayunita]);
    }

    public function fyurayunita()
    {
      $fyurayunita = Model_YuraYunita::paginate(3);
      return view('frontend.fyurayunita',['fyurayunita' => $fyurayunita]);
    }

    public function carifyurayunita(Request $request)
    {
      $keyword = $request->get('keyword');
            $fyurayunita = Model_YuraYunita::paginate(10);

           if ($keyword) {
           $fyurayunita = Model_YuraYunita::where("judul","LIKE","%$keyword%")->get();
        }

            return view ('frontend.carifyurayunita', compact('fyurayunita'));
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('yurayunita.tambah_yurayunita');
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

    Model_Yurayunita::create($input);

    return redirect('/yurayunita');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Model_YuraYunita $yurayunita)
    {
        return view ('yurayunita.lihat_yurayunita', compact ('yurayunita'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Model_YuraYunita $yurayunita)
    {
        return view('yurayunita.edit_yurayunita', compact('yurayunita'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Model_YuraYunita $yurayunita)
    {
      Model_YuraYunita::where('id', $yurayunita->id)
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

 $yurayunita->update($input);

return redirect('/yurayunita');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Model_YuraYunita $yurayunita)
    {
      Model_Yurayunita::destroy($yurayunita->id);
    return redirect('/yurayunita');
    }
}
