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
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="d-flex justify-content-between flex-wrap">
                            <div class="d-flex align-items-end flex-wrap">
                                <div class="mr-md-3 mr-xl-5">
                                    <h2>Welcome back,</h2>
                                    <p class="mb-md-0">Your analytics dashboard template.</p>
                                </div>
                                <div class="d-flex">
                                    <i class="mdi mdi-home text-muted hover-cursor"></i>
                                    <p class="text-muted mb-0 hover-cursor">&nbsp;/&nbsp;Dashboard&nbsp;/&nbsp;</p>
                                    <p class="text-primary mb-0 hover-cursor">Analytics</p>
                                </div>
                            </div>
                            <div class="d-flex justify-content-between align-items-end flex-wrap">
                                <button type="button" class="btn btn-light bg-white btn-icon mr-3 d-none d-md-block ">
                                  <i class="mdi mdi-download text-muted"></i>
                                </button>
                                <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                                  <i class="mdi mdi-clock-outline text-muted"></i>
                                </button>
                                <button type="button" class="btn btn-light bg-white btn-icon mr-3 mt-2 mt-xl-0">
                                  <i class="mdi mdi-plus text-muted"></i>
                                </button>
                                <button class="btn btn-primary mt-2 mt-xl-0">Generate report</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="proBanner">
                    <div class="col-md-12 grid-margin">
                        <div class="card bg-gradient-primary border-0">
                            <div class="card-body py-3 px-4 d-flex align-items-center justify-content-between flex-wrap">
                                <p class="mb-0 text-white font-weight-medium">Like what you see? Checkout our premium version for more.</p>
                                <div class="d-flex">
                                    <a href="https://github.com/Urbanui/MajesticAdmin-Free-Bootstrap-Admin-Template" target="_blank" class="btn btn-outline-light mr-2">Download free version</a>
                                    <a href="http://www.urbanui.com/majestic-admin-pro/template/" target="_blank" class="btn btn-outline-light mr-2 bg-gradient-danger border-0">Upgrade to Pro</a>
                                    <button id="bannerClose" class="btn border-0 p-0">
                                        <i class="mdi mdi-close text-white"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        @include('dashboard.partials.statReview')
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-7 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Cash deposits</p>
                                <p class="mb-4">To start a blog, think of a topic about and first brainstorm party is ways to write details</p>
                                <div id="cash-deposits-chart-legend" class="d-flex justify-content-center pt-3"></div>
                                <canvas id="cash-deposits-chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-5 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Total sales</p>
                                <h1>$ 28835</h1>
                                <h4>Gross sales over the years</h4>
                                <p class="text-muted">Today, many people rely on computers to do homework, work, and create or store useful information. Therefore, it is important </p>
                                <div id="total-sales-chart-legend"></div>                  
                            </div>
                            <canvas id="total-sales-chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 stretch-card">
                        @include('dashboard.partials.tableReview')
                    </div>
                </div>
      </div>
      <!-- content-wrapper ends -->
      <!-- partial:partials/_footer.html -->
      <footer class="footer">
        <div class="d-sm-flex justify-content-center justify-content-sm-between">
          <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2018 <a href="https://www.urbanui.com/" target="_blank">Urbanui</a>. All rights reserved.</span>
          <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart text-danger"></i></span>
        </div>
      </footer>
      <!-- partial -->
    </div>
    <!-- main-panel ends -->
  </div>
  <!-- page-body-wrapper ends -->
</div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{ asset('libs/base/vendor.bundle.base.js') }}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="{{ asset('libs/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('libs/datatables.net/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('libs/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="{{ asset('js/off-canvas.js') }}"></script>
  <script src="{{ asset('js/hoverable-collapse.js') }}"></script>
  <script src="{{ asset('js/template.js') }}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="{{ asset('js/dashboard.js') }}"></script>
  <script src="{{ asset('js/data-table.js') }}"></script>
  <script src="{{ asset('js/jquery.dataTables.js') }}"></script>
  <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
  <!-- End custom js for this page-->


@endsection



@push('bottom_scripts')
@endpush
