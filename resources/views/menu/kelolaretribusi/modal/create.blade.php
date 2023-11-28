<div class="modal fade" id="addRetribusiModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Data Retribusi</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('retribusis.store') }}" method="POST">
					@csrf
					<div class="row">

						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="mb-3">
								<label for="tanggal" class="form-label">Tanggal Retribusi</label>
								<input type="date" class="form-control @error('tanggal') is-invalid @enderror" name="tanggal" id="tanggal"
									value="{{ old('tanggal') }}" placeholder="Masukkan tanggal..">

								@error('tanggal')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="mb-3">
								<label for="data_pasar_id" class="form-label">Pasar</label>
								<select class="form-select select2 " name="data_pasar_id" id="data_pasar_id">
									
									@foreach($dataPasar as $dataPasare)
									<option value="{{ $dataPasare->id }}" {{ old('data_pasar_id')==="$dataPasare->id" ? 'selected'
										: '' }}>
										{{ $dataPasare->nama_pasar }}
									</option>
									@endforeach
								</select>

								@error('data_pasar_id')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>

						<div class="col-sm-6 col-md-6 col-lg-6">
							<div class="mb-3">
								<label for="bagian_id" class="form-label">Bagian</label>
								<select class="form-select select2" name="bagian_id" id="bagian_id">
									
									@foreach ($bagian as $bagiane)
									<option value="{{ $bagiane->id }}" {{ old('bagian_id')==="$bagiane->id" ? 'selected'
										: '' }}>
										{{ $bagiane->nama_bagian }}
									</option>
									@endforeach
								</select>

								@error('bagian_id')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="mb-3">
								<label for="jumlah" class="form-label">Jumlah Retribusi</label>
								<input type="number" class="form-control @error('jumlah') is-invalid @enderror"
									name="jumlah" id="jumlah" value="{{ old('jumlah') }}"
									placeholder="Masukkan Jumlah..">

								@error('jumlah')
								<div class="d-block invalid-feedback">
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

