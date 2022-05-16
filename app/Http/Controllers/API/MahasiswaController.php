<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Exception;
use App\Helpers\ApiFormatter;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Mahasiswa::all();

        if($data){
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            // cara tutor
            // $request->validate([
            //     'name' => 'required',
            //     'address' => 'required',
            // ]);

            // $mahasiswa = Mahasiswa::create([
            //     'name' => $request->name,
            //     'address' => $request->address,
            // ]);

            // $data = Mahasiswa::where('id','=', $mahasiswa->id)->get();

            // if($data){
            //     return ApiFormatter::createApi(200, 'success', $data);
            // } else {
            //     return ApiFormatter::createApi(400, 'failed');
            // }

            // caraku
            $validatedData = $request->validate([
                'name' => 'required',
                'address' => 'required',
            ]);

            $data = Mahasiswa::create($validatedData);

            if($data){
                return ApiFormatter::createApi(200, 'success', $data);
            } else {
                return ApiFormatter::createApi(400, 'failed');
            }

        } catch(Exception $error) {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Mahasiswa::where('id',$id)->get();

        if($data){
            return ApiFormatter::createApi(200, 'success', $data);
        } else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            // cara tutor
            // $request->validate([
            //     'name' => 'required',
            //     'address' => 'required',
            // ]);

            // $mahasiswa = Mahasiswa::findOrFail($id);

            // $mahasiswa = Mahasiswa::update([
            //     'name' => $request->name,
            //     'address' => $request->address,
            // ]);

            // $data = Mahasiswa::where('id','=', $mahasiswa->id)->get();

            // if($data){
            //     return ApiFormatter::createApi(200, 'success', $data);
            // } else {
            //     return ApiFormatter::createApi(400, 'failed');
            // }

            // caraku
            $validatedData = $request->validate([
                'name' => 'required',
                'address' => 'required',
            ]);

            // $validatedData = Mahasiswa::findOrFail($id);

            $data = Mahasiswa::where('id', $id)->update($validatedData);

            if($data){
                return ApiFormatter::createApi(200, 'success', $data);
            } else {
                return ApiFormatter::createApi(400, 'failed');
            }

        } catch(Exception $error) {
            return ApiFormatter::createApi(400, 'failed');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrfail($id);

        $data = $mahasiswa->delete();

        if($data){
            return ApiFormatter::createApi(200, 'success Destroy data');
        } else {
            return ApiFormatter::createApi(400, 'failed');
        }
    }
}
