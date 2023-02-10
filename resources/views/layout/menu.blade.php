<li class="nav-item {{ ($judul == 'Beranda') ? 'active' : '' }}">
  <a href="{{ url('/home') }}" class="collapsed" aria-expanded="false">
    <i class="fas fa-home"></i>
    <p>Beranda</p>
  </a>
</li>

<li class="nav-item {{ ($judul == 'Transaksi') ? 'active' : '' }}">
<a href="{{ url('/kategori') }}">
    <i class="fas fa-layer-group"></i>
    <p>Products</p>
</a>
</li>
@if ($masuk->level == 'admin')
    <li class="nav-item {{ ($judul == 'Akun') ? 'active' : '' }}">
    <a href="{{ url('account') }}">
        <i class="fas fa-th-list"></i>
        <p>Akun</p>
    </a>
    </li>
@endif
    