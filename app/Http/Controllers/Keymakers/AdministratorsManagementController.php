<?php

namespace App\Http\Controllers\Keymakers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AdministratorsManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = User::role('admin')->get();

        return view('keymakers.admins.index',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('keymakers.admins.create');
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
            'newadmin_firstname'  => 'required|max:20',
            'newadmin_lastname'   => 'required|max:20',
            'newadmin_email'      => ['required','unique:users,email','max:100'],
            'newadmin_password'   => 'required|min:10'
        ]);

        $newAdmin = User::create([
            'first_name' => $request->newadmin_firstname,
            'last_name'  => $request->newadmin_lastname,
            'email'      => $request->newadmin_email,
            'password'   => Hash::make($request->newadmin_password)
        ]);

        $newAdmin->assignRole('admin');

        return response()->json(
            ['success'],
            200
        );
    }

    public function show($id)
    {
        //Después podríamos tener una página completa con el perfil del administrador.
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'editadmin_id'        => 'required|numeric',
            'editadmin_firstname' => 'required|max:20',
            'editadmin_lastname'  => 'required|max:20',
            'editadmin_email'     => ['required','max:100'],
        ]);

        //manejar la respuesta tipo json, investigar.
        $adminToUpdate = User::findOrFail($request->editadmin_id);

        $adminToUpdate->first_name = $request->editadmin_firstname;
        $adminToUpdate->last_name  = $request->editadmin_lastname;
        $adminToUpdate->email      = $request->editadmin_email;

        $adminToUpdate->save();

        return response()->json(
            ['success'],
            200
        );
    }

    public function destroy($id)
    {
        // Después haremos un soft delete
    }
}
