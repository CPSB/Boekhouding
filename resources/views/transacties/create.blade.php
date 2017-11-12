@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- Flash message view instance. --}}

        <div class="row">
            <div class="col-md-12"> {{-- Content --}}
                <form action="{{ route('transacties.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }} {{-- Form field protection --}}

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <i class="fa fa-th-list"></i> Transacties:

                            <a class="btn btn-xs btn-default pull-right" href="{{ route('transacties.index') }}">
                                <i class="fa fa-undo"></i> Ga terug
                            </a>
                        </div>


                        <ul class="list-group">

                            <li class="list-group-item"> {{-- Algemen informatie --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Algemene informatie:</h4>
                                        <small>Algemen informatie zoals, naam, type, enz....</small>
                                    </div>

                                    <div class="col-md-4 @error('naam', 'has-error')" style="margin-bottom: 8px;">
                                        <label>Naam: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="Naam v/d transactie" @input('naam')>
                                        @error('naam')
                                    </div>

                                    <div class="col-md-4 @error('rekening', 'hass-error')" style="margin-bottom: 8px;">
                                        <label>Rekening <span class="text-danger">*</span></label>
                                        <select class="form-control" @input('rekening')>
                                            <option value="">-- Selecteeer de rekening van de transactie --</option>
                                            @foreach ($rekeningen as $rekening)
                                            @endforeach
                                        </select>
                                        @error('rekening')
                                    </div>

                                    <div class="col-md-offset-4 col-md-4 @error('type', 'has-error')" style="margin-bottom: 8px;">
                                        <label>Type: <span class="text-danger">*</span></label>
                                        <select class="form-control" @input('type')>
                                            <option value="">-- Selecteer het type van de transactie --</option>
                                            <option value="inkomsten">Inkomsten</option>
                                            <option value="uitgaven">Uitgaven</option>
                                        </select>
                                        @error('type')
                                    </div>

                                    <div class="col-md-4 @error('bedrag', 'has-error')" style="margin-bottom: 8px;">
                                        <label>Bedrag: <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" placeholder="bv: 3,50" @input('bedrag')>
                                        @error('bedrag')
                                    </div>
                                </div>
                            </li> {{-- /Algemene informatie --}}

                            <li class="list-group-item"> {{-- File upload and data --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Overige informatie:</h4>
                                        <small>
                                            Scan en datum transactie.
                                            Datum formaat = <strong>DD/MM/YY</strong>
                                        </small>
                                    </div>
                                    <div class="col-md-4 @error('factuur', 'has-error')" style="margin-bottom: 8px;">
                                        <label>Scan van het factuur: <span class="text-danger">*</span></label>
                                        <input type="file" class="form-control" @input('factuur')>
                                        @error('factuur')
                                    </div>
                                    <div class="col-md-4 @error('transactie_datum', 'has-error')" style="margin-bottom: 8px;">
                                        <label>Datum van het factuur: <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" @input('transactie_datum')>
                                        @error('transactie_datum')
                                    </div>
                                </div>
                            </li> {{-- /File upload and date --}}

                            <li class="list-group-item"> {{-- Beschrijving van de inkomsten/uitgaven --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4>Beschrijving van de transactie:</h4>
                                    </div>

                                    <div class="col-md-8 @error('beschrijving', 'has-error')" style="margin-bottom: 8px;">
                                        <label>Beschrijving: <span class="text-danger">*</span></label>
                                        <textarea placeholder="Beschrijving van de transactie. Bv: waarom is deze gemaakt" class="form-control" rows="7" @input('beschrijving')>@text('beschrijving')</textarea>
                                        @error('beschrijving')
                                    </div>
                                </div>
                            </li> {{-- Beschrijving van de inkomsten/uitgaven --}}

                        </ul>

                        <div class="panel-footer text-right"> {{-- Buttons --}}
                            <button type="reset" class="btn btn-link btn-xs">
                                <i class="fa fa-undo"></i> Annuleren
                            </button>

                            <button type="submit" class="btn btn-xs btn-success">
                                <i class="fa fa-check"></i> Opslaan
                            </button>
                        </div> {{-- END buttons --}}
                    </div>

                </form>
            </div> {{-- END content --}}
        </div>
    </div>
@endsection