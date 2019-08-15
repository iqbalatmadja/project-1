@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    THEME1
                    @if (Auth::check())
                        You are logged in
                    @else
                        You are not logged in
                    @endif
                    <div>
                    {{ trans("messages.trythis") }}
                    </div>
                    <div>
                    <i class="mdi mdi-car-brake-parking"></i>
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
<?php /*<script src="{{ asset('libs/BootstrapDetector.js') }}" ></script> */?>
<script>

</script>
@endpush
