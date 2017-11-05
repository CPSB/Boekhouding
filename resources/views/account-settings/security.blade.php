<div class="panel panel-default">
    <div class="panel-heading">
        <i class="fa fa-key"></i> Account beveiliging
    </div>
    <div class="panel panel-body">
        <form class="form-horizontal" method="POST" action="">
            {{ csrf_field() }} {{-- FORM field protection --}}

            <div class="form-group">
                <button type="submit" class="btn btn-sm btn-success">
                    <i class="fa fa-check"></i> Aanpassen
                </button>
                <button type="reset" class="btn btn-sm btn-link">
                    <i class="fa fa-undo"></i> Annuleren
                </button>
            </div>
        </form>
    </div>
</div>