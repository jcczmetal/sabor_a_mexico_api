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
            'firstNameNewAdmin'  => 'required|max:20',
            'lastNameNewAdmin'   => 'required|max:20',
            'emailNewAdmin'      => ['required','unique:users,email','max:100'],
            'profileNewAdmin'    => ['required','array', Rule::in(['admin', 'associate'])],
            'profileNewAdmin.*'  => Rule::in(['admin', 'associate']),
            'passwordNewAdmin'   => 'required|min:10'
        ]);

        $newAdmin = User::create([
            'first_name' => $request->firstNameNewAdmin,
            'last_name'  => $request->lastNameNewAdmin,
            'email'      => $request->emailNewAdmin,
            'password'   => Hash::make($request->passwordNewAdmin)
        ]);

        $newAdmin->assignRole($request->profileNewAdmin);

        return response()->json(
            ['success'],
            200
        );
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'edit_admin_id'   => 'required|numeric',
            'edit_first_name' => 'required|max:20',
            'edit_last_name'  => 'required|max:20',
            'edit_email'      => ['required','max:100'],
            'edit_profile'    => ['required', Rule::in(['admin', 'associate'])],
            'edit_password'   => 'required|min:10'
        ]);

        $adminUpdated = User::findOrFail($request->edit_admin_id);

        $roles = $adminUpdated->getRoleNames();



        $adminUpdated->first_name = $request->edit_first_name;
        $adminUpdated->last_name = $request->edit_last_name;
        $adminUpdated->email = $request->edit_email;



        $adminUpdated->save();

        return response()->json(
            ['success'],
            200
        );
    }

    
    public function destroy($id)
    {
        //
    }
}
