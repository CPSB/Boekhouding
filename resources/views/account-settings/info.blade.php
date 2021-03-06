<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-info-circle"></i> Account informatie:
    </div>

    <div class="panel-body">
        <form method="POST" action="{{ route('account.settings.info') }}" class="form-horizontal">
            {{ csrf_field() }}
            @form($user)

            <div class="form-group @error('name', 'has-error')">
                <label class="control-label col-md-3">Uw naam: <span class="text-danger">*</span></label>
                <div class="col-md-9">
                    <input type="text" class="form-control" placeholder="Uw gebruikersnaam" @input('name')>
                    @error('name')
                </div>
            </div>

            <div class="form-group @error('email', 'has-error')">
                <label class="control-label col-md-3">Uw e-mailadres: <span class="text-danger">*</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" placeholder="Uw email adres" @input('email')>
                    @error('email')
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