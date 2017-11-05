@extends('layouts.app')

@section('content')
    <div class="container">
        @include('flash::message') {{-- Flash messafe view instance. --}}

        <div class="row">
            <div class="col-md-3"> {{-- Sidebar --}}
                <div class="list-group">
                    <a href="#info" aria-controls="profile" role="tab" data-toggle="tab" class="list-group-item">
                        <i class="fa fa-fw fa-info-circle"></i> Account informatie
                    </a>

                    <a href="#security" aria-controls="security" role="tab" data-toggle="tab" class="list-group-item">
                        <i class="fa fa-fw fa-key"></i> Account beveiliging
                    </a>
                </div>
            </div> {{-- End sidebar --}}

            <div class="col-md-9"> {{-- Content --}}
                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="info">
                        @include('account-settings.info')
                    </div>
                    <div role="tabpanel" class="tab-pane" id="security">
                        @include('account-settings.security')
                    </div>
                </div>
            </div> {{-- /Content --}}
        </div>
    </div>
@endsection