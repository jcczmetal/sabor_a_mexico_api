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
            'profileNewAdmin'    => ['required', Rule::in(['admin', 'associate'])],
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
            'edit_first_name'  => 'required|max:20',
            'lastNameNewAdmin'   => 'required|max:20',
            'emailNewAdmin'      => ['required','unique:users,email','max:100'],
            'profileNewAdmin'    => ['required', Rule::in(['admin', 'associate'])],
            'passwordNewAdmin'   => 'required|min:10'
        ]);
    }

    
    public function destroy($id)
    {
        //
    }
}
