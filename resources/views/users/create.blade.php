@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- Flash message view instance --}}

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default"> {{-- Content panel --}}
                    <div class="panel-heading"> {{-- Panel title --}}
                        <i class="fa fa-users"></i> Gebruiker toevoegen.

                        <div class="pull-right">
                            <a class="btn btn-default btn-xs" href="">
                                <i class="fa fa-undo"></i> Ga terug
                            </a>
                        </div>
                    </div> {{-- /Panel title --}}

                    <div class="panel-body"> {{-- Panel body --}}
                        <form class="form-horizontal" method="POST" action="{{ route('users.store') }}">
                            {{ csrf_field() }} {{-- CSRF form field protection --}}

                            <div class="@error('name', 'has-error') form-group">
                                <label class="col-md-2 control-label">Naam: <span class="text-danger">*</span></label>

                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="De naam v/d gebruiker" @input('name')>
                                    @error('name')
                                </div>
                            </div>

                            <div class="@error('email', 'has-error') form-group">
                                <label class="col-md-2 control-label">E-mailadres: <span class="text-danger">*</span></label>

                                <div class="col-md-10">
                                    <input type="email" class="form-control" placeholder="E-mailadres v/dgebruiker" @input('email')>
                                    @error('email')
                                </div>
                            </div>

                            <div class="@error('password', 'has-error') form-group">
                                <label class="col-md-2 control-label">Wachtwoord: <span class="text-danger">*</span></label>

                                <div class="col-md-10">
                                    <input type="password" class="form-control" placeholder="Wachtwoord van de gebruiker" @input('password')>
                                    @error('password')
                                </div>
                            </div>

                            <div class="@error('password_confirmation') form-group">
                                <label class="col-md-2 control-label">Herhaal wachtwoord: <span class="text-danger">*</span></label>

                                <div class="col-md-10">
                                    <input type="password" class="form-control" placeholder="Herhaal het wachtwoord" @input('password_confirmation')>
                                    @error('password_confirmation')
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fa fa-check"></i> Aanmaken
                                    </button>

                                    <button type="reset" class="btn btn-sm btn-link">
                                        <i class="fa fa-undo"></i> Annuleren
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div> {{-- /Panel body --}}
                </div> {{-- /Content panel --}}
            </div>
        </div>
    </div>
@endsection