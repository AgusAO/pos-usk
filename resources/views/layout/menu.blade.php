{{-- <li class="nav-item {{ ($judul == 'Beranda') ? 'active' : '' }}"> --}}
<li class="nav-item active">
  <a data-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
    <i class="fas fa-home"></i>
    <p>Beranda</p>
  </a>
</li>

@if ($user->level == 'admin')
    <li class="nav-section">
        <li class="nav-item">
        <a data-toggle="collapse" href="#base">
            <i class="fas fa-layer-group"></i>
            <p>Transaksi</p>
        </a>
    </li>
    <li class="nav-item">
    <a href="{{ url('account') }}">
        <i class="fas fa-th-list"></i>
        <p>Akun</p>
    </a>
    </li>
@endif
    