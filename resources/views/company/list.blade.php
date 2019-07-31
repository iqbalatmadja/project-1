@extends('layouts.dashboard')

@push('styles')
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
				
            </div>
            @include('dashboard.partials.footer')
		</div>
	</div>
</div>
@endsection



@push('bottom_scripts')
<script>
(function($) {
	  'use strict';
	  $(function() {

	    


	  });
	})(jQuery);
</script>
@endpush
