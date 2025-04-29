<?php

namespace App\Http\Controllers;

use App\Models\Form;
use App\Models\User;
use Illuminate\Http\Request;

class FormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $forms = Form::all();

        return view('welcome', compact('forms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();

        return view('createform', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->merge([
            'Result' => $request->Result === 'on' ? true : false,
        ]);

        $valiadted = $request->validate([
            'name' => 'required',
            'email' => '',
            'phoneNumber' => 'required',
            'password'=>'',
            'status' => '',
            'personel' => '',
            'problem' => '',
            'Result' => 'boolean',
        ]);

        Form::create($valiadted);

        return redirect()->route('welcome');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $users = User::all();
        $form = Form::find($id);
        $personel = User::where("name",$form->personel)->first();
        if ($form["Result"]===1)
        {
            $form["Result"]=true;
        }else{
            $form["Result"]=false;
        }

        if (!$form) {
            return redirect()->route('welcome')->with('error', 'Gönderilen parametreyle Uyuşan Bir Form Nesnesi bulunamadı');
        }

        return view('editform', compact('form','users','personel'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request,$id)
    {
        $form = Form::findOrFail($id);

        $request->merge([
            'Result' => $request->Result === 'on' ? true : false,
        ]);

        $form->update($request->all());

        return redirect()->route('welcome')->with("Success","Form Güncellendi");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $form = Form::findOrFail($id);

        $form->delete($form);

        return redirect()->route('welcome');
    }
}
