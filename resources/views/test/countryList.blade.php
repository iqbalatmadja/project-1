@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
					COUNTRY<br/>
					
                    <input type="text" id="filter1" name="filter1" placeholder="Country Name"/><br/>
                    <input type="text" id="filter2" name="filter2" placeholder="Currency Code"/><br/>
                    <a href="#" onclick="return false;" id="filter">FILTER</a>
                    <table id="example" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Country Code</th>
                                <th>Country Name</th>
                                <th>Currency Code</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th></th>
                                <th>ID</th>
                                <th>Country Code</th>
                                <th>Country Name</th>
                                <th>Currency Code</th>
                            </tr>
                        </tfoot>
                    </table>
                    <a href="#" id="reload">reload</a>
                    <div id="info-modal-conf" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-body edit-content">
                            <div class="modal-content" id="form_content"></div>
                          </div>
                        </div>
                    </div>					
					
					
					
					
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link href="{{ asset('libs/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/DataTables/DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/DataTables/Responsive-2.2.2/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/DataTables/ColReorder-1.5.0/css/colReorder.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/DataTables/KeyTable-2.4.0/css/keyTable.dataTables.min.css') }}" rel="stylesheet">

@endpush

@push('top_scripts')
@endpush

@push('bottom_scripts')
<?php /*<script src="{{ asset('libs/BootstrapDetector.js') }}" ></script> */?>
<script>
// clearing modal data cache
$('body').on('hidden.bs.modal', '.modal', function (event) {
    //$(".modal-content").html(""); //clearing it first, if necessary
    $(this).removeData('bs.modal');
});
</script>
<script src="{{ asset('libs/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js') }}" ></script>
<script src="{{ asset('libs/DataTables/Responsive-2.2.2/js/dataTables.responsive.min.js') }}" ></script>
<script src="{{ asset('libs/DataTables/Responsive-2.2.2/js/responsive.bootstrap.min.js') }}" ></script>
<script src="{{ asset('libs/DataTables/ColReorder-1.5.0/js/dataTables.colReorder.min.js') }}" ></script>
<script src="{{ asset('libs/DataTables/KeyTable-2.4.0/js/dataTables.keyTable.min.js') }}" ></script>

<script>
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
$(document).ready(function(){
	var dttable = $("#example").DataTable({
		"keys":true,
        "processing": true,
        "colReorder": true,
        "searching": true,
        "ajax": {
            "url":"{{ route('populateCountry') }}",
            "type":"POST",
            "dataSrc": "data",
            "data":function(data){
                var filter1 = $("#filter1").val();
                var filter2 = $("#filter2").val();
                data.filter1 = filter1;
                data.filter2 = filter2;
                data._token = CSRF_TOKEN;
            }
        },
        "deferRender": true,
        "columns":[
            {
                "className":"details-control",
                "orderable": false,
                "data": null,
                "defaultContent": "<a href=\"#\" class=\"showInfo\">a</a>"+
                "&nbsp;<a href=\"#\" class=\"showModal\">b</a>"+
                ""
            },
            { "data":"id" },
            { "data":"countryCode" },
            { "data":"countryName" },
            { "data":"currencyCode" },
        ],
        "order": [[1, "desc"]],
        
        
	})

	function format ( d ) {
        // d is the original data object for the row
        return "<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">"+
            "<tr>"+
                "<td>Full name:</td>"+
                "<td>"+d.countryName+"</td>"+
            "</tr>"+
            "<tr>"+
                "<td>Extra info:</td>"+
                "<td>And any further details here (images etc)...</td>"+
            "</tr>"+
        "</table>";
    }

	$("#example tbody").on( "click", "tr td.details-control .showInfo", function () {
        var tr = $(this).closest("tr");
        var row = dttable.row( tr );
        //alert(row.data().id);
        
        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass("shown");
            return false;
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass("shown");
            return false;
        }
    })

    $("#reload").click(function(){
        dttable.ajax.reload(null, false );
        return false;
        // if no parameters given (.reload()), it will reload back with default 
        // params and to the first page
        // .reload(null,false) 
        // ==> null can be a function to execute after reload (try with alert())
        // ==> false means reload current page(not going back to first page)
    })

    $("#example tbody").on( "click", "tr td.details-control .showModal", function () {
        var tr = $(this).closest("tr");
        var row = dttable.row( tr );
        //alert(row.data().id);
        var form = get_form("update_password",row.data().id);
        $("#form_content").html(form);
        $("#info-modal-conf").modal("show");
        return false;
    })

    function get_form(action,id){
        // Do ajax here to get actual form based on provided parameters
        var form = "";
        
        form = action+id;
        return form;
    }

	$("#filter").click(function(){
        dttable.ajax.reload(null, false );
    });
})
</script>
@endpush
