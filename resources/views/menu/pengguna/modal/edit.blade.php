<div class="modal fade" id="editPenggunaModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah Data Pengguna</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				@include('utilities.loading-alert')
				<form action="#" method="POST" id="edit-pengguna-form">
					@csrf @method('PUT')

					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="mb-3">
								<label for="name" class="form-label">Nama Pengguna</label>
								<input type="text" class="form-control" name="name" id="name"
									placeholder="Masukkan Nama..">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="text" class="form-control" name="email" id="email"
									placeholder="Masukkan Email..">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control" name="password" id="password"
									placeholder="Masukkan password..">
								<small class="text-muted">*Kosongkan password jika tidak ingin diubah.</small>
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="password_confirmation" class="form-label">Ulangi Password</label>
								<input type="password" class="form-control" name="password_confirmation" id="password_confirmation"
									placeholder="Ulangi password..">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-sm-6 col-md-6">
							<div class="mb-3">
								<label for="role_id" class="form-label">Level</label>
								<select class="form-select" name="role_id" id="role_id">
									
									@foreach ($roles as $role)
									<option value="{{ $role->id }}">{{ $role->role_name }}
									</option>
									@endforeach
								</select>
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
