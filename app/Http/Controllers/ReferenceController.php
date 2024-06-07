<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReferenceRequest;
use App\Models\Loi;
use App\Models\Reference;
use Illuminate\Http\Request;

class ReferenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $loi = Loi::findOrFail($id);

        return view('references.create', compact('loi'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReferenceRequest $request)
    {
        $reference = Reference::create([
            'lois_id' => $request->input('lois_id'),
            'code' => $request->input('code'),
            'typeTexte' => $request->input('typeTexte'),
        ]);

        return redirect()->back()->with('success', 'Ajout avec succès');
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
    public function edit($id)
    {
        $loi = Loi::findOrFail($id);
        return view('references.edit', compact('loi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reference = Reference::findOrFail($id);

        $request->validate([
            'lois_id' => 'required',
            'code' => 'required',

        ]);

        $reference->lois_id = $request->input('lois_id');
        $reference->code = $request->input('code');

        $reference->save();

        return redirect()->route('index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
