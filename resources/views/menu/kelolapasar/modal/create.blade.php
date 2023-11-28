<div class="modal fade" id="addPasarModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Data Pasar</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('pasar.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="nama_pasar" class="form-label">Nama Pasar</label>
								<input type="text" class="form-control @error('nama_pasar') is-invalid @enderror" name="nama_pasar" id="nama_pasar" value="{{ old('nama_pasar') }}" placeholder="Masukkan nama pasar..">

								@error('nama_pasar')
								<div class="invalid-feedback d-block">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-primary">Simpan</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>