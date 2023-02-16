<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form role="form" action="{{ route('kategori/store') }}" method="post">
          @method('post')
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label for="category_name">Kategori</label>
								<input id="category_name" name="category_name" type="text" class="form-control" required autofocus>
                <span class="help-block with-errors"></span>
							</div>
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer no-bd">
				<button id="addRowButton" class="btn btn-primary">Simpan</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
			</div>
		</div>
	</div>
</div>