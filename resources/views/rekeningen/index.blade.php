@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- Flash view instance. --}}

        <div class="row">
            <div class="col-md-12"> {{-- Content --}}
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-th-list"></i> Overzicht rekeningen:

                        <div class="pull-right">
                            @if (count($rekeningen) > 15)
                                <a class="btn btn-xs btn-default" href="">
                                    <i class="fa fa-search"></i> Zoek rekening
                                </a>
                            @endif

                            <a class="btn btn-xs btn-default" href="{{ route('rekeningen.create') }}">
                                <i class="fa fa-plus"></i> Rekening toevoegen
                            </a>
                        </div>
                    </div>

                    <div class="panel-body"> {{-- Overview content --}}
                        @if (count($rekeningen) > 0) {{-- Rekeningen in het systeem. --}}
                            <div class="table-responsive">
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Aangemaakt door:</th>
                                            <th>Naam:</th>
                                            <th>Rekening nr:</th>
                                            <th colspan="2">Aangemaakt op:</th> {{-- Nodig voor de functies --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rekeningen as $rekening) {{-- Loop door de rekeningen --}}
                                            <tr>
                                                <td><strong>#{{ $rekening->id }}</strong></td>
                                                <td>{{ $rekening->author->name }}</td>
                                                <td>{{ $rekening->rekening_naam }}</td>
                                                <td>
                                                    @if(! is_null($rekening->rekening_nr))
                                                        <span class="text-green">{{ $rekening->rekening_nr }}</span>
                                                    @else
                                                        <span class="text-danger">Niet opgegeven</span>
                                                    @endif
                                                </td>
                                                <td>{{ $rekening->created_at->diffForHumans() }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('rekeningen.edit', $rekening) }}" class="btn btn-xs btn-info">
                                                        <span class="fa fa-pencil"></span> Wijzig
                                                    </a>

                                                    <form id="delete" method="POST" action="{{ route('rekeningen.destroy', $rekening) }}" style="display: none;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                    </form>

                                                    <button type="submit" form="delete" class="btn btn-xs btn-danger">
                                                        <i class="fa fa-close"></i> Verwijder
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach {{-- END loop --}}
                                    </tbody>
                                </table>
                            </div>

                            {{ $rekeningen->render() }} {{-- Pagination instance --}}
                        @else {{-- Geen rekeningen in het systeem. --}}
                            <div class="alert alert-info alert-important" role="alert">
                                <strong><i class="fa fa-info-circle"></i> Info:</strong>
                                Er zijn geen rekeningen in het systeem.
                            </div>
                        @endif
                    </div> {{-- Overview content --}}
                </div>
            </div> {{-- /Content --}}
        </div>
    </div>
@endsection