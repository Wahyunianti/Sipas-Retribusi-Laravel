<div class="modal fade" id="addPenggunaModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Tambah Data Pengguna</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('pengguna.store') }}" method="POST">
					@csrf

					<div class="row">
						<div class="col-sm-12 col-md-12">
							<div class="mb-3">
								<label for="name" class="form-label">Nama Pengguna</label>
								<input type="text" class="form-control @error('name') is-invalid @enderror"
									name="name" id="name" value="{{ old('name') }}"
									placeholder="Masukkan Nama..">

								@error('name')
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
								<label for="email" class="form-label">Email</label>
								<input type="text" class="form-control @error('email') is-invalid @enderror"
									name="email" id="email" value="{{ old('email') }}"
									placeholder="Masukkan Email..">

								@error('email')
								<div class="d-block invalid-feedback">
									{{ $message }}
								</div>
								@enderror
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
									id="password" placeholder="Masukkan password..">

								@error('password')
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
								<label for="role_id" class="form-label">Level</label>
								<select class="form-select select2 " name="role_id" id="role_id">
									
									@foreach($roles as $role)
									<option value="{{ $role->id }}" {{ old('role_id')==="$role->id" ? 'selected'
										: '' }}>
										{{ $role->role_name }}
									</option>
									@endforeach
								</select>

								@error('role_id')
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

