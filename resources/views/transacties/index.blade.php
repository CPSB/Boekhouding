@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- Include flash message view --}}

        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-list"></i> Transacties:

                        <div class="pull-right">
                            <a href="" class="btn btn-xs btn-default">
                                <i class="fa fa-search"></i> Zoek transactie
                            </a>

                            <a href="{{ route('transacties.create') }}" class="btn btn-xs btn-default">
                                <i class="fa fa-plus"></i> Transactie toevoegen.
                            </a>
                        </div>
                    </div>
                    <div class="panel-body">
                        @if (count($transacties) > 0) {{-- Er zijn transacties gevonden --}}
                            <div class="table-responsive">
                                <table class="table table-hover table-condensed">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Type:</th>
                                            <th>Datum transactie:</th>
                                            <th>Uitvoerder:</th>
                                            <th>Naam:</th>
                                            <th colspan="2">Bedrag:</th> {{-- Colspan 2 is nodig voor de functies --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transacties as $transactie) {{-- Loop door de transacties --}}
                                            <tr>
                                                <td><strong>#T{{ $transactie->id }}</strong></td>
                                                <td>
                                                    @if ($transactie->type == 'inkomsten')
                                                        <span class="label label-success">Inkomsten</span>
                                                    @elseif ($transactie->type == 'uitgaven')
                                                        <span class="label label-danger">Uitgaven</span>
                                                    @else
                                                        <span class="label label-warning">Onbekend</span>
                                                    @endif
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($transactie->transactie_datum)->format('d/m/Y') }}</td>
                                                <td><a href="mailto:{{ $transactie->author->name }}">{{ $transactie->author->name }}</a></td>
                                                <td>{{ $transactie->naam }}</td>
                                                <td>
                                                    @if ($transactie->type == 'inkomsten')
                                                        <span class="text-success">+{{ $transactie->bedrag }}€</span>
                                                    @elseif ($transactie->type == 'uitgaven')
                                                        <span class="text-danger">-{{ $transactie->bedrag }}€</span>
                                                    @else
                                                        <span class="text-warning">{{ $transactie->bedrag }}€</span>
                                                    @endif
                                                </td>

                                                <td class="text-right"> {{-- Options --}}
                                                    <a href="" class="text-muted">
                                                        <i class="fa fa-fw fa-info-circle"></i>
                                                    </a>

                                                    <a href="{{ route('transacties.edit', $transactie) }}" class="text-muted">
                                                        <i class="fa fa-fw fa-pencil"></i>
                                                    </a>

                                                    <a href="{{ route('transacties.destroy', $transactie) }}" class="text-muted">
                                                        <i class="fa fa-fw fa-close"></i>
                                                    </a>
                                                </td> {{-- /options --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            {{ $transacties->render() }} {{-- Pagination view instance --}}
                        @else {{-- Er zijn geen transacties gevonden. --}}
                            <div class="alert alert-info alert-imporant">
                                <strong><i class="fa fa-info-circle"></i> Info:</strong>
                                Er zijn geen transacties gevonden in het systeem.
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection