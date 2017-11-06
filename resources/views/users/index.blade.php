@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- View flash session instance --}}

        <div class="row">
            <div class="col-md-12"> {{-- Content --}}
                <div class="panel panel-default">
                    <div class="panel-heading"> {{-- Content heading --}}
                        <i class="fa fa-users"></i> Gebruikersbeheer:

                        <div class="pull-right">
                            @if (count($users) > 15) {{-- More then 15 users found in the system. --}}
                                <a href="" class="btn btn-xs btn-default">
                                    <i class="fa fa-search"></i> Gebruiker zoeken
                                </a>
                            @endif

                            <a href="{{ route('users.create') }}" class="btn btn-xs btn-default">
                                <i class="fa fa-plus"></i> Gebruiker toevoegen.
                            </a>
                        </div>
                    </div> {{-- /Content heading --}}

                    <div class="panel-body"> {{-- Content body --}}
                        @if (count($users) > 0) {{-- There are users found --}}
                            <div class="table-responsive">
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Status:</th>
                                            <th>Naam:</th>
                                            <th>Email:</th>
                                            <th colspan="2">Geregistreerd op:</th> {{-- Colspan 2 nodig voor de functies. --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user) {{-- Loop through the users --}}
                                            <tr>
                                                <td><strong>#{{ $user->id }}</strong></td>

                                                <td>
                                                    <span class="label label-success">
                                                        <i class="fa fa-check"></i> Actief
                                                    </span>
                                                </td>

                                                <td>{{ $user->name }}</td>
                                                <td><a href="mailto:{{ $user->email }}">{{ $user->email }}</a></td>
                                                <td>{{ $user->created_at->diffforHumans() }}</td>
                                                <td class="text-center"> {{-- Options --}}
                                                    <a href="" class="btn btn-xs btn-default">
                                                        <i class="fa fa-ban"></i> Blokkeer
                                                    </a>

                                                    <a href="" class="btn btn-xs btn-danger">
                                                        <i class="fa fa-trash"></i> Verwijder
                                                    </a>
                                                </td> {{-- Options --}}
                                            </tr>
                                        @endforeach {{-- END loop --}}
                                    </tbody>
                                </table>
                            </div>

                            {{ $users->render() }} {{-- User pagination instance --}}
                        @else  {{-- There are no users found. --}}
                            <div class="alert alert-info alert-important">
                                <strong><i class="fa fa-users-circle"></i> Info:</strong>
                                Er zijn geen gebruikers gevonden in het systeem.
                            </div>
                        @endif
                    </div> {{-- /END content body --}}
                </div>
            </div> {{-- /END content --}}
        </div>
    </div>
@endsection