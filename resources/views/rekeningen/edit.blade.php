@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- flash message view instance --}}

        <div class="row">
            <div class="col-md-12"> {{-- Content --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-plus"></i> Nieuwe rekening toevoegen.

                        <a class="pull-right btn btn-xs btn-default" href="{{ route('rekeningen.index') }}">
                            <i class="fa fa-undo"></i> Keer terug
                        </a>
                    </div>

                    <div class="panel-body">
                        <form method="POST" action="{{ route('rekeningen.update', $rekening) }}" class="form-horizontal">
                            {{ method_field('UPDATE') }}
                            {{ csrf_field() }} {{-- Form field protection --}}
                            @form($rekening)

                            <div class="form-group @error('rekening_naam', 'has-error')">
                                <label class="control-label col-md-2">Naam: <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Naam v/d rekening" @input('rekening_naam')>
                                    @error('rekening_naam')
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-md-2">Rekening nr:</label>
                                <div class="col-md-10">
                                    <input type="text" class="form-control" placeholder="Rekening nr." @input('rekening_nr')>
                                </div>
                            </div>

                            <div class="form-group @error('beschrijving', 'has-error')">
                                <label class="control-label col-md-2">Beschrijving: <span class="text-danger">*</span></label>
                                <div class="col-md-10">
                                    <textarea @input('beschrijving') class="form-control" placeholder="Beschrijving v/d rekening" rows="7">@text('beschrijving')</textarea>
                                    @error('beschrijving')
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-offset-2 col-md-10">
                                    <button type="submit" class="btn btn-sm btn-success">
                                        <i class="fa fa-check"></i> Opslaan
                                    </button>
                                    <button type="reset" class="btn btn-sm btn-link">
                                        <i class="fa fa-undo"></i> Annuleren
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div> {{-- /End content --}}
        </div>
    </div>
@endsection