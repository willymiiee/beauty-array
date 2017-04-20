<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MUA;
use App\Http\Requests\MUA as MUARequest;

class MUAController extends Controller
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
    public function create()
    {
        //
    }

    public function store(MUARequest $request)
    {
        $mua = new MUA;
        $mua->name = $request->get('name');
        $mua->slug = \Str::slug($request->get('name'));
        $mua->email = $request->get('email');
        $mua->save();

        return response()->json([], 201);
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
        //
    }

    public function update(MUARequest $request, $id)
    {
        try {
            $mua = MUA::find($id);
        } catch (NoResultException $e) {
            return response()->json([
                'errors'    => $e->getMessage()
            ]);
        }
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
