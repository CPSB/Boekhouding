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

                            <a href="" class="btn btn-xs btn-default">
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
                                            <th>Uitvoerder</th>
                                            <th>Beschrijving</th>
                                            <td>Type:</td>
                                            <td>Bedrag</td>
                                        </tr>
                                    </thead>
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