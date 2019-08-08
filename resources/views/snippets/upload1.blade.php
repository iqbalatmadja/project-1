@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">UPLOAD1 <a href="{{ route('snippets') }}">BACK</a></div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="container">
                        <div class="row">
                        	<div class="col-12">
                        	<h3>using intervention and ajax</h3>
                        	</div>
                            <div class="col-12">
								
        						<form id="imageUploadForm" action="javascript:void(0)" enctype="multipart/form-data">
        							<div class="file-field">
        								<div class="row">
        									<div class=" col-md-8 mb-4">
        										<img id="original" src="" class=" z-depth-1-half avatar-pic" alt="">
        										<div class="d-flex justify-content-center mt-3">
            										<div class="btn btn-mdb-color btn-rounded float-left">
            											<input type="file" name="photo_name" id="photo_name" required=""> <br>
            												<button type="submit" class="btn btn-secondary d-flex justify-content-center mt-3">submit</button>
            										</div>
        										</div>
        									</div>
        									<div class=" col-md-4 mb-4">
        										<img id="thumbImg" src="" class=" z-depth-1-half thumb-pic" alt="">
        									</div>
        								</div>
        							</div>
        						</form>
                								
								
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
@endpush

@push('top_scripts')
@endpush

@push('bottom_scripts')
<script>
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

(function($) {
	'use strict';
	$(function() {
		$(document).ready(function(){		
			$('#imageUploadForm').on('submit',(function(e) {
				e.preventDefault();
				var formData = new FormData(this);
				$.ajax({
					type:'POST',
					url: "{{ route('upload1Save')}}",
					data:formData,
					cache:false,
					contentType: false,
					processData: false,
					success:function(data){
						var url1 = '{{ url("uploads/images/") }}/'+data.filename;
						var url2 = '{{ url("uploads/images/thumbs/") }}/'+data.filename;
					    $('#original').attr('src', url1);
					    $('#thumbImg').attr('src', url2);
					},
					error: function(data){
					    console.log(data);
					}
				});
			}));
        	
		}); //end $(document).ready(function(){

				
		
	});
})(jQuery);

</script>
@endpush
