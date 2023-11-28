<div class="modal fade" id="editPasarModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Data Pasar</h5>
				<button type="button" class="btn-close  " data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				@include('utilities.loading-alert')
				<form action="#" method="POST" id="edit-pasar-form">
					@csrf @method('PUT')
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="nama_pasar" class="form-label">Nama Pasar</label>
								<input type="text" class="form-control" name="nama_pasar" id="nama_pasar" placeholder="Masukkan nama pasar.."
									required>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary  " data-bs-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-success">Ubah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
