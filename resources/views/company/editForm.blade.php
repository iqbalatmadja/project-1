<div class="modal-header">
    <h4 class="modal-title" >Edit Company</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
</div>
<div class="modal-body">
    <div id="infos">
        <div class="panel panel-default card-view" style="margin: 0;">
            <div class="panel-content">
                <div class="panel-body">
					<form id="mainfrm" name="mainfrm" method="post" action="#">
						<input type="text" class="form-control" id="cid" name="cid" value="{{ $company->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <label class="control-label">Name</label>
                            </div>
    
                            <div class="col-sm-12 col-md-12">
                                <div class="input-counter input-group">
                                    <div style="float: left;">
                                        <input type="text" class="form-control" id="n" name="n" value="{{ $company->name }}">
                                    </div>
                                    
                                </div>
    
                            </div>
    
                        </div>
					</form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" id="save" name="save">Save</button>
</div>
