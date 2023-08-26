<?php

namespace App\Http\Controllers;

use App\Models\Dataset;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DatasetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $kecamatan = Kecamatan::all();
        return view('admin.dataset.index', compact('kecamatan'));
    }

    public function data($id)
    {
        $dataset = Dataset::where('kecamatan_id', $id)->get();
        return view('admin.dataset.data', compact('dataset', 'id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $kecamatan = Kecamatan::all();
        return view('admin.dataset.create', compact('kecamatan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
            Dataset::create($request->all());
     
        return redirect()->route('dataset.data', $request->kecamatan_id)
            ->with('success', 'Dataset created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $data_id)
    {
        $data = Dataset::find($data_id);
        $kecamatan = Kecamatan::all();
        return view('admin.dataset.edit', compact('data', 'kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, $data_id)
    {
        $data = Dataset::find($data_id);
        $data->update($request->all());


        return redirect()->route('dataset.data', $id)
            ->with('success', 'Dataset updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Dataset::destroy($id);

        return redirect()->route('dataset.index')
            ->with('success', 'Dataset deleted successfully');
    }
}
