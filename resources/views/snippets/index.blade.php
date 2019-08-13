@extends('layouts.app')

@section('content')
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Snippets</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
									<ul>
										<li><a href="{{ route('snippetsUpload1') }}">Upload1 (Intervention + Ajax)</a></li>
										<li><a href="{{ route('snippetsCkeditor') }}">CKEditor</a></li>
										<li><a href="{{ route('snippetsEcharts') }}">Echarts</a></li>
										<li><a href="{{ route('snippetsCaptcha') }}">Captcha</a></li>
									</ul>
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
<script src="{{ asset('libs/BootstrapDetector.js') }}" ></script>
<script>

</script>
@endpush
