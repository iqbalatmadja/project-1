@extends('layouts.dashboard')

@push('styles')
<link href="{{ asset('libs/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/DataTables/DataTables-1.10.18/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/DataTables/Responsive-2.2.2/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/DataTables/ColReorder-1.5.0/css/colReorder.dataTables.min.css') }}" rel="stylesheet">
<link href="{{ asset('libs/DataTables/KeyTable-2.4.0/css/keyTable.dataTables.min.css') }}" rel="stylesheet">
@endpush

@push('top_scripts')
@endpush

@section('content')

<div class="container-scroller">
    @include('dashboard.partials.topnav')
    <div class="container-fluid page-body-wrapper">
        @include('dashboard.partials.sidenav')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row" id="proBanner">
				    <div class="col-md-12 grid-margin">	
						@include('dashboard.partials.dashboardBanner')
                    </div>
                </div>
                <div class="row" style="margin-bottom: 10px;">
				    <div class="col-md-12">	
				    	<span style="float: left;">
	        				<h3>Company List</h3>
				    	</span>
				    	<span style="float: right;">
				    		<button type="button" class="btn btn-primary" id="add_company">
				    		<i class="mdi mdi-plus menu-icon"></i>
				    		Create New
				    		</button>
				    	</span>
    				</div>
    			</div>	
        		<div class="row">
				    <div class="col-md-12">	
        				<table id="dttable" class="display" style="width:100%">
        					<thead>
                                <tr>
                                	<th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
        				</table>
    				</div>
				</div>
            </div>
            @include('dashboard.partials.footer')
		</div>
	</div>
</div>
<div id="info-modal-conf" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-body edit-content">
        <div class="modal-content" id="form_content"></div>
      </div>
    </div>
</div>
@endsection



@push('bottom_scripts')
<script src="{{ asset('js/data-table.js') }}"></script>
<script src="{{ asset('js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
<script>
$('body').on('hidden.bs.modal', '.modal', function (event) {
    //$(".modal-content").html(""); //clearing it first, if necessary
    $(this).removeData('bs.modal');
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

(function($) {
	'use strict';
	$(function() {
		$(document).ready(function(){		
			var dttable = $("#dttable").DataTable({
				"keys":true,
		        "processing": true,
		        "colReorder": true,
		        "searching": true,
		        "ajax": {
		            "url":"{{ route('populateCompany') }}",
		            "type":"POST",
		            "dataSrc": "data",
		            "data":function(data){
		                //var filter1 = $("#filter1").val();
		                //var filter2 = $("#filter2").val();
		                //data.filter1 = filter1;
		                //data.filter2 = filter2;
		                //data._token = CSRF_TOKEN;
		            }
		        },
		        "deferRender": true,
		        "columns":[
		            { "data":"company_id" },
		            { "data":"company_name" },
		            { "data":"company_status_text" },
		            {
		                "className":"details-control",
		                "orderable": false,
		                "data": null,
		                "defaultContent": "<a href=\"#\" class=\"showInfo\">a</a>"+
		                "&nbsp;<button type='button' class='btn btn-warning showModal'><i class='mdi mdi-lead-pencil menu-icon'></i>Edit</button>"+
		                "&nbsp;<button type='button' class='btn btn-danger toggleStatus'><i class='mdi mdi-nintendo-switch menu-icon'></i>Toggle</button>"+
		                
		                ""
		            },
		            
		        ],
		        "order": [[0, "desc"]],
		        
		        
			})
			function format ( d ) {
                // d is the original data object for the row
                return "<table cellpadding=\"5\" cellspacing=\"0\" border=\"0\" style=\"padding-left:50px;\">"+
                    "<tr>"+
                        "<td>Full name:</td>"+
                        "<td>"+d.company_name+"</td>"+
                    "</tr>"+
                    "<tr>"+
                        "<td>Extra info:</td>"+
                        "<td>And any further details here (images etc)...</td>"+
                    "</tr>"+
                "</table>";
            }
        
        	$("#dttable tbody").on( "click", "tr td.details-control .showInfo", function () {
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

            $("#dttable tbody").on( "click", "tr td.details-control .showModal", function () {
                var tr = $(this).closest("tr");
                var row = dttable.row( tr );
                get_form("update_password",row.data().company_id);
                return false;
            })

            $("#dttable tbody").on( "click", "tr td.details-control .toggleStatus", function () {
                var tr = $(this).closest("tr");
                var row = dttable.row( tr );
                toggle_status(row.data().company_id);
                return false;
            })
            
            function get_form(action,id){
                var url = "{{ route('getCompanyEditForm') }}";
                var data = {"action":action,"id":id};
                $.ajax({async: true,cache: false,type: "POST",url: url,data: data,
                    success: function(response) {
                    	$("#form_content").html(response);
                        $("#info-modal-conf").modal("show");
                    },
                });
            }

            function toggle_status(id){
                var url = "{{ route('toggleCompanyStatus') }}";
                var data = {"id":id};
                $.ajax({async: true,cache: false,type: "POST",url: url,data: data,
                    success: function(response) {
	                	dttable.ajax.reload(null,false);
                    },
                });
            }
        	
    		$(document).on("click", "#save", function (e) {
    		    e.preventDefault();
    		    var frmdata = $("#mainfrm").serialize();
    		    update_company(frmdata);
    		});

    		$(document).on("click", "#add_company", function (e) {
    		    e.preventDefault();
        		get_form("create_company",0);
    		});
    		
    		
    		function update_company(frmdata){
    			var url = "{{ route('updateCompany') }}";
    		    var data = {"frmdata":frmdata};
    		    $.ajax({
    		        async: true,cache: false,type: "POST",url: url,data: data,
    		        success: function(response) {
        		    	if(response.result == 1){
        		    		$("#info-modal-conf").modal("toggle");
        		    		dttable.ajax.reload(null,false);
        		    	}else{
							alert("Something is wrong!");
        		    	}
    		        },
    			});
    		}
        	
        	
		}); //end $(document).ready(function(){

				
		
	});
})(jQuery);
</script>
@endpush
