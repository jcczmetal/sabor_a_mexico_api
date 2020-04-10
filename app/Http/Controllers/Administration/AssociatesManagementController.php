<?php

namespace App\Http\Controllers\Administration;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AssociatesManagementController extends Controller
{
    public function index()
    {
        $associates = User::role('associate')->get();

        return view('keymakers.associates.index',compact('associates'));
    }

    public function store(Request $request)
    {
    	$request->validate([
            'newassociate_firstname'  => 'required|max:20',
            'newassociate_lastname'   => 'required|max:20',
            'newassociate_email'      => ['required','unique:users,email','max:100'],
            'newassociate_password'   => 'required|min:10'
        ]);

        $newAssociate = User::create([
            'first_name' => $request->newassociate_firstname,
            'last_name'  => $request->newassociate_lastname,
            'email'      => $request->newassociate_email,
            'password'   => Hash::make($request->newassociate_password)
        ]);

        $newAssociate->assignRole('associate');

        return response()->json(
            ['success'],
            200
        );
    }

    public function update(Request $request, $id)
    {
    	$request->validate([
            'editassociate_id'        => 'required|numeric',
            'editassociate_firstname' => 'required|max:20',
            'editassociate_lastname'  => 'required|max:20',
            'editassociate_email'     => ['required','max:100'],
        ]);

        //manejar la respuesta tipo json, investigar.
        $associateToUpdate = User::findOrFail($request->editassociate_id);

        $associateToUpdate->first_name = $request->editassociate_firstname;
        $associateToUpdate->last_name  = $request->editassociate_lastname;
        $associateToUpdate->email      = $request->editassociate_email;

        $associateToUpdate->save();

        return response()->json(
            ['success'],
            200
        );
    }
}
