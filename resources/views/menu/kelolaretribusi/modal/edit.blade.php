<div class="modal fade" id="editRetribusiModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Data Retribusi</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				@include('utilities.loading-alert')
				<form action="#" method="POST" id="edit-retribusi-form">
					@csrf @method('PUT')
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="mb-3">
								<label for="tanggal" class="form-label">Tanggal</label>
								<input type="date" class="form-control" name="tanggal" id="tanggal">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="mb-3">
								<label for="data_pasar_id" class="form-label">Pasar</label>
								<select class="form-select" name="data_pasar_id" id="data_pasar_id">
									
									@foreach($dataPasar as $dataPasare)
									<option value="{{ $dataPasare->id }}">{{ $dataPasare->nama_pasar }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="col-sm-6 col-md-6">
							<div class="mb-3">
								<label for="bagian_id" class="form-label">Bagian</label>
								<select class="form-select" name="bagian_id" id="bagian_id">
									
									@foreach ($bagian as $bagiane)
									<option value="{{ $bagiane->id }}">{{ $bagiane->nama_bagian }}
									</option>
									@endforeach
								</select>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="mb-3">
								<label for="jumlah" class="form-label">Jumlah Retribusi</label>
								<input type="number" class="form-control" name="jumlah" id="jumlah"
									placeholder="Masukkan Jumlah..">
							</div>
						</div>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
						<button type="submit" class="btn btn-success">Ubah</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
