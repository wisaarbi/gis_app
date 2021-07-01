<div class="sidebar" data-color="orange" data-background-color="white"
     data-image="{{ asset('material') }}/img/sidebar-1.jpg">
    <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

        Tip 2: you can also add an image using data-image tag
    -->
    <div class="logo">
        <a href="https://creative-tim.com/" class="simple-text logo-normal">
            Pemetaan Korban
            <br>
            Lakalantas di
            <br>
            Jawa Tengah
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="material-icons">dashboard</i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('map') }}">
                    <i class="material-icons">location_ons</i>
                    <p>{{ __('Maps') }}</p>
                </a>
            </li>
            <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#infoModal">
                    <i class="material-icons">info</i>
                    <p>{{ __('Info') }}</p>
                </a>
            </li>
        </ul>
    </div>
</div>
 <!-- Modal -->
 <div class="modal fade" id="infoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-light" style="background-color: #ff9800;">
        <i class="material-icons">info</i>
          <h5 class="modal-title" id="exampleModalLabel">&ensp;Info</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="card alert-dark p-3">
            Peta ini menggunakan data Korban Kecelakaan Lalu Lintas Jawa Tengah tahun 2020 yang diambil dari Badan Pusat Statistik Provinsi Jawa Tengah.
            <br>
            Aplikasi ini berisikan informasi berupa jumlah korban meninggal, jumlah korban luka ringan, jumlah korban luka berat, serta kerugian material akibat kasus kecelakaan lalu lintas di Jawa Tengah.
            <hr>
            Sumber:
            <br>
            <a href="https://jateng.bps.go.id/indicator/34/563/1/jumlah-korban-kecelakaan-lalu-lintas-di-wilayah-polda-jawa-tengah-tahun.html" target="_blank" rel="noopener noreferrer">https://jateng.bps.go.id/indicator/34/563/1/jumlah-korban-kecelakaan-lalu-lintas-di-wilayah-polda-jawa-tengah-tahun.html</a>
            <a href="https://jateng.bps.go.id/statictable/2021/04/08/2225/banyaknya-kecelakaan-lalu-lintas-korban-dan-nilai-kerugiannya-di-wilayah-polda-jawa-tengah-2020.html" target="_blank" rel="noopener noreferrer">https://jateng.bps.go.id/statictable/2021/04/08/2225/banyaknya-kecelakaan-lalu-lintas-korban-dan-nilai-kerugiannya-di-wilayah-polda-jawa-tengah-2020.html</a>
          </div>
        </div>
        <div class="modal-footer">
            <div class="col text-left">
              <!-- <a class="btn btn-link btn-sm" type="button" href="https://unsorry.net" target="_blank">unsorry@2020</a> -->
            </div>
            <div class="col text-right">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Tutup</button>
            </div>
        </div>
      </div>
    </div>
  </div>
