<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\RegisterMUA;
use App\Models\MUA;
use App\Models\User;
use App\Http\Requests\MUA as MUARequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;

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

        $newUser = new User;
        $newUser->username = $mua->slug;
        $newUser->name = $request->get('name');
        $newUser->email = $request->get('email');
        $newUser->password = bcrypt('12345678');
        $newUser->invited_by = 1;
        $newUser->MUA()->associate($mua);
        $newUser->save();

        $newUser->activation_code = bcrypt($newUser->id . $newUser->email);
        $newUser->save();

        $fileName = str_pad($mua->id, 3, '0', STR_PAD_LEFT) . '-' . $mua->slug;
        File::put('json/'.$fileName.'.json', json_encode($mua));

        Mail::to($mua->email)->send(new RegisterMUA($newUser));

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
        $mua = MUA::find($id);

        foreach ($mua->users as $u) {
            dump($u);
        }
        exit;

        dd($mua->users);
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
