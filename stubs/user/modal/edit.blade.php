<div class="modal fade" id="editUserModal" data-bs-backdrop="static" data-bs-keyboard="false"
	aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Ubah User</h5>
				<button type="button" class="btn-close  " data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				@include('utilities.loading-alert')
				<form action="#" method="POST" id="user-edit-form">
					@csrf @method('PUT')
					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="name" class="form-label">Nama Lengkap</label>
								<input type="text" class="form-control" name="name" id="name" placeholder="Masukkan nama lengkap..">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="email" class="form-label">Email</label>
								<input type="email" class="form-control" name="email" id="email" placeholder="Masukkan email..">
							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="mb-3">
								<label for="role_id" class="form-label">Level</label>
								<select class="form-select" name="role_id" id="role_id">
									@foreach($roles as $roles)
									<option value="{{ $roles->id }}">{{ $roles->id }} - {{ $roles->role_name }}</option>
									@endforeach
								</select>
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
