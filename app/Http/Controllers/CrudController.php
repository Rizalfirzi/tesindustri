<?php

namespace App\Http\Controllers;

use App\Models\crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $crud = Crud::all();
        return view('crud.index', compact('crud'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('crud.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validasi
        $validated = $request->validate([
            'nama' => 'required',
            'nis' => 'required  |max:255',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
        ]);

        $crud = new Crud();
        $crud->nama = $request->nama;
        $crud->nis = $request->nis;
        $crud->jenis_kelamin = $request->jenis_kelamin;
        $crud->agama = $request->agama;
        $crud->tgl_lahir = $request->tgl_lahir;
        $crud->alamat = $request->alamat;
        $crud->asal_sekolah = $request->asal_sekolah;
        $crud->save();
        return redirect()
            ->route('crud.index')
            ->with('success', 'Data berhasil dibuat!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show(crud $crud)
    {
        $crud = Crud::findOrFail($id);
        return view('crud.show', compact('crud'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit(crud $crud)
    {
        $crud = Crud::findOrFail($id);
        return view('crud.edit', compact('crud'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crud $crud)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nis' => 'required|max:255',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'tgl_lahir' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
        ]);

        $crud = Crud::findOrFail($id);
        $crud->nama = $request->nama;
        $crud->nis = $request->nis;
        $crud->jenis_kelamin = $request->jenis_kelamin;
        $crud->agama = $request->agama;
        $crud->tgl_lahir = $request->tgl_lahir;
        $crud->alamat = $request->alamat;
        $crud->asal_sekolah = $request->asal_sekolah;
        $crud->save();
        return redirect()->route('crud.index')
            ->with('success', 'Data berhasil diedit!');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy(crud $crud)
    {
        $crud = Crud::findOrFail($id);
        $crud->delete();
        return redirect()->route('crud.index')
            ->with('success', 'Data berhasil dihapus!');

    }
}

// <?php

// namespace App\Http\Controllers;

// use Illuminate\Http\Request;

// class CrudController extends Controller
// {
//     public function __construct()
//     {
//         $this->middleware('auth');
//     }
//     /**
//      * Display a listing of the resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function index()
//     {
//         //menampilkan semua data dari model crud
//         $crud = Crud::all();
//         return view('crud.index', compact('crud'));
//     }

//     /**
//      * Show the form for creating a new resource.
//      *
//      * @return \Illuminate\Http\Response
//      */
//     public function create()
//     {
//         //
//         return view('crud.create');

//     }

//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Request $request)
//     {
//         //validasi
//         $validated = $request->validate([
//             'nama' => 'required',
//             'nis' => 'required|unique:siswas|max:255',
//             'jenis_kelamin' => 'required',
//             'agama' => 'required',
//             'tgl_lahir' => 'required',
//             'alamat' => 'required',
//             'asal_sekolah' => 'required',
//         ]);

//         $crud = new Crud();
//         $crud->nama = $request->nama;
//         $crud->nis = $request->nis;
//         $crud->jenis_kelamin = $request->jenis_kelamin;
//         $crud->agama = $request->agama;
//         $crud->tgl_lahir = $request->tgl_lahir;
//         $crud->alamat = $request->alamat;
//         $crud->asal_sekolah = $request->asal_sekolah;
//         $crud->save();
//         return redirect()->route('crud.index')
//             ->with('success', 'Data berhasil dibuat!');
//     }

//     /**
//      * Display the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function show($id)
//     {
//         $crud = Crud::findOrFail($id);
//         return view('crud.show', compact('crud'));
//     }

//     /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function edit($id)
//     {
//         $crud = Crud::findOrFail($id);
//         return view('crud.edit', compact('crud'));

//     }

//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, $id)
//     {
//         // Validasi
//         $validated = $request->validate([
//             'nama' => 'required',
//             'nis' => 'required|max:255',
//             'jenis_kelamin' => 'required',
//             'agama' => 'required',
//             'tgl_lahir' => 'required',
//             'alamat' => 'required',
//             'asal_sekolah' => 'required',
//         ]);

//         $crud = Crud::findOrFail($id);
//         $crud->nama = $request->nama;
//         $crud->nis = $request->nis;
//         $crud->jenis_kelamin = $request->jenis_kelamin;
//         $crud->agama = $request->agama;
//         $crud->tgl_lahir = $request->tgl_lahir;
//         $crud->alamat = $request->alamat;
//         $crud->asal_sekolah = $request->asal_sekolah;
//         $crud->save();
//         return redirect()->route('crud.index')
//             ->with('success', 'Data berhasil diedit!');
//     }

//     /**
//      * Remove the specified resource from storage.
//      *
//      * @param  int  $id
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy($id)
//     {
//         $crud = Crud::findOrFail($id);
//         $crud->delete();
//         return redirect()->route('crud.index')
//             ->with('success', 'Data berhasil dihapus!');
//     }
// }
