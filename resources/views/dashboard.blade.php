@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<style>
    .ct-label.ct-horizontal.ct-end {
        display: block;
        text-align: center;
    }
</style>
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-info card-header-icon">
              <div class="card-icon">
                <i class="material-icons">paid</i>
              </div>
              <p class="card-category">Kerugian <br>Komersial</p>
              <h5 class="card-title">Rp421.329.286
              </h5>
            </div>
              <div class="card-footer">
                  <div class="stats">
                      <i class="material-icons">date_range</i> 2020
                  </div>
              </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-success card-header-icon">
              <div class="card-icon">
                <i class="material-icons">sentiment_neutral</i>
              </div>
              <p class="card-category">Korban <br>Luka Ringan</p>
              <h5 class="card-title">1348</h5>
            </div>
            <div class="card-footer">
              <div class="stats">
                  <i class="material-icons">date_range</i> 2020
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-warning card-header-icon">
              <div class="card-icon">
                <i class="material-icons">sentiment_dissatisfied</i>
              </div>
              <p class="card-category">Korban <br>Luka Berat</p>
              <h5 class="card-title">2</h5>
            </div>
              <div class="card-footer">
                  <div class="stats">
                      <i class="material-icons">date_range</i> 2020
                  </div>
              </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="card card-stats">
            <div class="card-header card-header-danger card-header-icon">
              <div class="card-icon">
                 <i class="material-icons">sentiment_very_dissatisfied</i>
              </div>
              <p class="card-category">Korban <br>Meninggal</p>
              <h5 class="card-title">100</h5>
            </div>
              <div class="card-footer">
                  <div class="stats">
                      <i class="material-icons">date_range</i> 2020
                  </div>
              </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-chart">
            <div class="card-header card-header-warning">
              <div class="ct-chart" id="websiteViewsChart" class="text-center"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Jumlah Korban Lakalantas</h4>
              <p class="card-category">Provinsi Jawa Tengah</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">date_range</i> 2020
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row" style="display: none;">
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-success">
              <div class="ct-chart" id="dailySalesChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Daily Sales</h4>
              <p class="card-category">
                <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in today sales.</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> updated 4 minutes ago
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card card-chart">
            <div class="card-header card-header-danger">
              <div class="ct-chart" id="completedTasksChart"></div>
            </div>
            <div class="card-body">
              <h4 class="card-title">Completed Tasks</h4>
              <p class="card-category">Last Campaign Performance</p>
            </div>
            <div class="card-footer">
              <div class="stats">
                <i class="material-icons">access_time</i> campaign sent 2 days ago
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush
