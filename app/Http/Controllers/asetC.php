<?php

namespace App\Http\Controllers;

use App\Models\asetM;
use Illuminate\Http\Request;

class asetC extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inventaris(Request $request) {

        $keyword = empty($request->keyword)?'':$request->keyword;

        $data = asetM::where("namaaset", "like", "%$keyword%")
        ->paginate(20);
        $data->appends($request->all());
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try{
            $data = $request->all();

            asetM::create($data);

            return response()->json([
                "status" => "success",
                "message" => "Data berhasil ditambahkan"
            ]);
        }catch(\Throwable $th){
            return response()->json([
                "status" => "error",
                "message" => ""
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\asetM  $asetM
     * @return \Illuminate\Http\Response
     */
    public function show(asetM $asetM)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\asetM  $asetM
     * @return \Illuminate\Http\Response
     */
    public function edit(asetM $asetM)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\asetM  $asetM
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, asetM $asetM)
    {
        try{
            $data = $request->all();

            asetM::findOrFail($data["idaset"])->update($data);

            return response()->json([
                "status" => "success",
                "message" => "Data berhasil ditambahkan"
            ]);
        }catch(\Throwable $th){
            return response()->json([
                "status" => "error",
                "message" => ""
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\asetM  $asetM
     * @return \Illuminate\Http\Response
     */
    public function destroy(asetM $asetM)
    {
        //
    }
}
