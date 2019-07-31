<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">&times;</button>
    <h4 class="modal-title" >Add Company</h4>
</div>
<div class="modal-body">
    <div id="infos">
        <div class="panel panel-default card-view" style="margin: 0;">
            <div class="panel-content">
                <div class="panel-body">

                    <div class="row">
                        <div class="col-md-12 mt-10 mb-5">
                            <label class="control-label">Qty</label>
                        </div>

                        <div class="col-sm-12 col-md-12">
                            <div class="input-counter input-group">
                                <div style="float: left;">
                                    <button type="button" class="btn-subtract btn btn-primary">
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div style="float: left;">
                                    <input type="text" class="form-control counter"
                                           data-default="1" data-min="1" data-max="999999"
                                           id="qty" name="qty"
                                           onkeypress="return integer_numbering(event,this)"
                                           style="text-align: center;" >
                                </div>
                                <div style="float: left;">
                                    <button type="button" class="btn-add btn btn-primary" id="plus_button">
                                        <i class="fa fa-plus"></i>
                                    </button>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-primary" id="save_new">OK</button>
</div>