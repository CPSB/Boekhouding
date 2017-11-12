<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-key"></i> Account beveiliging
    </div>
    <div class="panel-body">
        <form class="form-horizontal" method="POST" action="{{ route('account.settings.security') }}">
            {{ csrf_field() }} {{-- FORM field protection --}}

            <div class="form-group @error('password', 'has-error')">
                <label class="control-label col-md-3">Wachtwoord: <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <input type="password" class="form-control" placeholder="Nieuw wachtwoord." @input('password')>
                    @error('password')
                </div>
            </div>

            <div class="form-group @error('password_confirmation', 'has-error')">
                <label class="control-label col-md-3">Bevestig wachtwoord: <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <input type="password" class="form-control" placeholder="Bevestig nieuw wachtwoord." @input('password_confirmation')>
                    @error('password_confirmation')
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-offset-3 col-md-10">
                    <button type="submit" class="btn btn-sm btn-success">
                        <i class="fa fa-check"></i> Aanpassen
                    </button>
                    <button type="reset" class="btn btn-sm btn-link">
                        <i class="fa fa-undo"></i> Annuleren
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>