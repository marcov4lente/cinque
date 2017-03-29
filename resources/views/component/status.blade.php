@if(Session::has('status') && Session::get('status') == 'success' )
    <div class="dialog dialog-status z-depth-3">
        <div class="col sm12 green white-text">
            <p><i class="fa fa-check" aria-hidden="true"></i> {{ Session::get('message') }}</p>
        </div>
        <div class="dismiss white-text">
            <i class="fa fa-times" aria-hidden="true" onclick="dismissDialog(this)"></i>
        </div>
    </div>
@endif

@if(Session::has('status') && Session::get('status') == 'warning' )
    <div class="dialog dialog-status z-depth-3">
        <div class="col sm12 orange white-text">
            <p><i class="fa fa-exclamation" aria-hidden="true"></i> {{ Session::get('message') }}</p>
        </div>
        <div class="dismiss white-text">
            <i class="fa fa-times" aria-hidden="true" onclick="dismissDialog(this)"></i>
        </div>
    </div>
@endif

@if(Session::has('status') && Session::get('status') == 'error' )
    <div class="dialog dialog-status z-depth-3">
        <div class="col sm12 red white-text">
            <p><i class="fa fa-times" aria-hidden="true"></i> {{ Session::get('message') }}</p>
        </div>
        <div class="dismiss white-text">
            <i class="fa fa-times" aria-hidden="true" onclick="dismissDialog(this)"></i>
        </div>
    </div>
@endif

@if(Session::has('status') && Session::get('status') == 'notice' )
    <div class="dialog dialog-status z-depth-3">
        <div class="col sm12 purple white-text">
            <p><i class="fa fa-info" aria-hidden="true"></i> {{ Session::get('message') }}</p>
        </div>
        <div class="dismiss white-text">
            <i class="fa fa-times" aria-hidden="true" onclick="dismissDialog(this)"></i>
        </div>
    </div>
@endif


<div class="dialog dialog-delete z-depth-3">
    <div class="col sm12 red white-text">
        <p><i class="fa fa-trash" aria-hidden="true"></i> Are you sure that you wish to delete this item?</p>
        <a href="#" class="dialog-delete-url btn red" >Yes, I'm sure!</a>
        <a href="javascript:void(0)" class="btn red" onclick="dismissDialog(this)">Cancel</a>
    </div>
    <div class="dismiss white-text">
        <i class="fa fa-times" aria-hidden="true" onclick="dismissDialog(this)"></i>
    </div>
</div>
