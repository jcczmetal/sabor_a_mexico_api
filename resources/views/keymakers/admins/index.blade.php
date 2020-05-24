@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        Administradores registrados
                    </div>

                    <div class="card-body">
                        <h2 class="card-title">{{ $admins->count() }}</h2>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createAdminModal">
                            Registrar administrador
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <table id="table_id" class="display">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->FullName }}</td>
                                <td>{{ $admin->email }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a  class="dropdown-item"
                                                data-toggle="modal"
                                                data-target="#editadmin-modal"
                                                data-editadmin_id="{{ $admin->id }}"
                                                data-editadmin_firstname="{{ $admin->first_name }}"
                                                data-editadmin_lastname="{{ $admin->last_name }}"
                                                data-editadmin_email="{{ $admin->email }}"
                                                data-editadmin_profile="{{ $admin->getRoleNames()->first() }}"
                                                data-editadmin_active="{{ $admin->getAllPermissions()->first() }}">
                                            Editar
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@include('keymakers.modals.create-admin')
@include('keymakers.modals.edit-admin')

@endsection
