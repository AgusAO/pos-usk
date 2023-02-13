@extends('layout.main')

<?php $judul = 'kategori' ?>
@section('content')
<div class="d-flex">
	<button class="btn btn-primary btn-round ml-auto mb-3" data-toggle="modal" data-target="#addRowModal">
	{{-- <button onclick="addForm('{{ route('kategori.store') }}')" class="btn btn-primary btn-round ml-auto mb-3"> --}}
		<i class="fa fa-plus"></i>
		Tambah
	</button>
</div>

<!-- Modal -->


<!-- Table -->
<div class="table-responsive">
	<table id="add-row" class="display table table-striped table-hover" cellspacing="0" width="100%">
		<thead>
      <th width="5%">No</th>
      <th>Kategori</th>
      <th width="15%">Action</th>
		</thead>
		<tbody>
			<td>1</td>
      <td>ngntd</td>
      <td></td>
		</tbody>
	</table>
</div>

@includeIf('produks.kategori.create')
@endsection
@push('scripts')
<script>
// let table;

// $(function () {
//   table = $('#add-row').DataTable({
//     processing: true,
//     autoWidth: false,
//     // ajax: {
//     //   url: '{{ route('kategori.data') }}',
//     // }
//   });

//   $('#addRowModal').validator().on('submit', function (e) {
//     if (! e.preventDefault()) {
//       $.ajax({
//         url: $('#addRowModal form').attr('action'),
//         type: 'post',
//         data: $('#addRowModal form').serialize()
//       })
//       .done((response) => {
//         $('#addRowModal').modal('hide');
//         table.ajax.reload();
//       })
//       .fail((errors) => {
//         alert('Tidak dapat menyimpan data');
//         return;
//       })
//     }
//   })
// });

// function addForm(url) {
//   $('#addRowModal').modal('show');
//   $('#addRowModal .modal-title').text('Tambah Kategori');

//   $('#addRowModal form')[0].reset();
//     $('#addRowModal form').attr('action', url);
//     $('#addRowModal [name=_method]').val('post');
//     $('#addRowModal [name=category_name]').focus();
// };


// Add Row
$('#add-row').DataTable({
	"pageLength": 5,
});

var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-simple-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

$('#addRowButton').click(function() {
  $('#addRowModal .modal-title').text('Tambah Kategori');
	$('#add-row').dataTable().fnAddData([
		$("#addName").val(),
		$("#addPosition").val(),
		$("#addOffice").val(),
		action
		]);
	$('#addRowModal').modal('hide');
});
</script>
@endpush