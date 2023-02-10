@extends('layout/main')
@section('css')
<link rel="stylesheet" href="{{ asset('css/account/style.css') }}">
@endsection
<?php $judul = 'Akun' ?>
@section('content')
{{-- @if (count($user) == 0)
    <h1>Silahkan regristrasi terlebih dahulu</h1>
@endif --}}
{{-- <div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Dashboard</h4>
        <ul class="breadcrumbs">
            <li class="nav-home">
                <a href="{{ url('home') }}">
                    <i class="flaticon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
                <a href="{{ url('account') }}">Akun</a>
            </li>
        </ul>
        <a href="{{ url('/account/new') }}" class="btn btn-icons btn-inverse-primary btn-new ml-2">
          <i class="fas fa-plus" aria-hidden="true"></i>
        </a>
    </div>
  </div> --}}
  <hr><br>
<div class="page-category">
  <div class="ml-md-auto py-2 mb-3 mt--3 py-md-0">
    <a href="{{ url('account/new') }}" class="btn btn-secondary btn-round">Add User</a>
  </div>
<div class="row modal-group">
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="{{ url('/account/update') }}" method="post" enctype="multipart/form-data" name="update_form">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit Akun</h5>
            <button type="button" class="close close-btn" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              @csrf
              <div class="row">
                <div class="col-12 text-center">
                  <img src="{{ asset('pictures/default.jpg') }}" class="img-edit">
                </div>
                <div class="col-12 text-center mt-2">
                  <input type="file" name="foto" hidden="">
                  <input type="text" name="nama_foto" hidden="">
                  <button type="button" class="btn btn-primary font-weight-bold btn-upload">Ubah</button>
                  <button type="button" class="btn btn-delete-img">Hapus</button>
                </div>
                <div class="col-12" hidden="">
                  <input type="text" name="id">
                </div>
              </div>
              <div class="form-group row mt-4">
                <label class="col-3 col-form-label font-weight-bold">Nama</label>
                <div class="col-9">
                  <input type="text" class="form-control" name="nama">
                </div>
                <div class="col-9 offset-3 error-notice" id="nama_error"></div>
              </div>
              <div class="form-group row">
                <label class="col-3 col-form-label font-weight-bold">Email</label>
                <div class="col-9">
                  <input type="email" class="form-control" name="email">
                </div>
                <div class="col-9 offset-3 error-notice" id="email_error"></div>
              </div>
              <div class="form-group row">
                <label class="col-3 col-form-label font-weight-bold">Username</label>
                <div class="col-9">
                  <input type="text" class="form-control" name="username">
                </div>
                <div class="col-9 offset-3 error-notice" id="username_error"></div>
              </div>
              <div class="form-group row">
                <label class="col-3 col-form-label font-weight-bold">Role</label>
                <div class="col-9">
                  <select class="form-control" name="role">
                    <option value="admin">Admin</option>
                    <option value="kasir">Kasir</option>
                  </select>
                </div>
              </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-update"><i class="mdi mdi-content-save"></i> Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-md-12 grid-margin">
    <div class="card card-noborder b-radius">
      <div class="card-body">
        <div class="row">
        	<div class="col-12 table-responsive">
        		<table class="table table-custom">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Posisi</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              	@foreach($user as $user)
                <tr>
                  <td>
                  	<img src="{{ asset('pictures/' . $user->foto) }}">
                  	<span class="ml-2">{{ $user->name }}</span>
                  </td>
                  <td>{{ $user->email }}</td>
                  <td>
                    @if($user->level == 'admin')
                    <span class="btn admin-span">{{ $user->level }}</span>
                    @else
                    <span class="btn kasir-span">{{ $user->level }}</span>
                    @endif
                  </td>
                  <td>
                  	<button type="button" class="btn btn-rounded" data-toggle="modal" data-target="#editModal" data-edit="{{ $user->id }}">
                        <i class="fas fa-edit" aria-hidden="true"></i>
                    </button>
                    <button type="button" data-delete="{{ $user->id }}" class="btn btn-rounded ml-1 btn-delete">
                        <i class="fas fa-times" aria-hidden="true"></i>
                    </button>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
        	</div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>
@endsection
@push('script')
  
{{-- <script src="{{ asset('js/manage_account/account/script.js') }}"></script> --}}
<script type="text/javascript">
  @if ($message = Session::get('create_success'))
    swal(
        "Berhasil!",
        "{{ $message }}",
        "success"
    );
  @endif

  @if ($message = Session::get('update_success'))
    swal(
        "Berhasil!",
        "{{ $message }}",
        "success"
    );
  @endif

  @if ($message = Session::get('delete_success'))
    swal(
        "Berhasil!",
        "{{ $message }}",
        "success"
    );
  @endif

  @if ($message = Session::get('both_error'))
    swal(
    "",
    "{{ $message }}",
    "error"
    );
  @endif

  @if ($message = Session::get('email_error'))
    swal(
    "",
    "{{ $message }}",
    "error"
    );
  @endif

  @if ($message = Session::get('username_error'))
    swal(
    "",
    "{{ $message }}",
    "error"
    );
  @endif

  $(document).on('click', '.filter-btn', function(e){
    e.preventDefault();
    var data_filter = $(this).attr('data-filter');
    $.ajax({
      method: "GET",
      url: "{{ url('/account/filter') }}/" + data_filter,
      success:function(data)
      {
        $('tbody').html(data);
      }
    });
  });

  $(document).on('click', '.btn-edit', function(){
    var data_edit = $(this).attr('data-edit');
    $.ajax({
      method: "GET",
      url: "{{ url('/account/edit') }}/" + data_edit,
      success:function(response)
      {
        $('.img-edit').attr("src", "{{ asset('pictures') }}/" + response.user.foto);
        $('input[name=id]').val(response.user.id);
        $('input[name=nama]').val(response.user.nama);
        $('input[name=email]').val(response.user.email);
        $('input[name=username]').val(response.user.username);
        $('select[name=level] option[value="'+ response.user.level +'"]').prop('selected', true);
        validator.resetForm();
      }
    });
  });

  $(document).on('click', '.btn-delete', function(e){
    e.preventDefault();
    var data_delete = $(this).attr('data-delete');
    swal({
      title: "Apa Anda Yakin?",
      text: "Data akun akan terhapus, klik oke untuk melanjutkan",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        window.open("{{ url('/account/delete') }}/" + data_delete, "_self");
      }
    });
  });

  $(document).on('click', '.btn-delete-img', function(){
    $(".img-edit").attr("src", "{{ asset('pictures') }}/default.jpg");
    $('input[name=nama_foto]').val('default.jpg');
  });
</script>
@endpush
