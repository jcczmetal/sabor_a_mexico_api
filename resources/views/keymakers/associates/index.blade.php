@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row mb-3">
            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        Asociados registrados
                    </div>

                    <div class="card-body">
                        <h2 class="card-title">{{ $associates->count() }}</h2>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#createAssociateModal">
                            Registrar asociado
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        Asociados inactivos
                    </div>

                    <div class="card-body">
                        <h2 class="card-title">1</h2>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Ver lista
                        </button>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-center">
                    <div class="card-header">
                        Something
                    </div>

                    <div class="card-body">
                        <h2 class="card-title">7</h2>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
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
                        @foreach($associates as $associate)
                            <tr>
                                <td>{{ $associate->FullName }}</td>
                                <td>{{ $associate->email }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown">
                                            Acciones
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a  class="dropdown-item"
                                                data-toggle="modal"
                                                data-target="#editassociate-modal"
                                                data-editassociate_id="{{ $associate->id }}"
                                                data-editassociate_firstname="{{ $associate->first_name }}"
                                                data-editassociate_lastname="{{ $associate->last_name }}"
                                                data-editassociate_email="{{ $associate->email }}"
                                                data-editassociate_profile="{{ $associate->getRoleNames()->first() }}"
                                                data-editassociate_active="{{ $associate->getAllPermissions()->first() }}">
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

@include('keymakers.modals.create-associate')
@include('keymakers.modals.edit-associate')

@endsection
