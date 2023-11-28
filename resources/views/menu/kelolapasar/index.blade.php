@extends('layouts.main', ['title' => 'Pasar', 'page_heading' => 'Data Pasar'])

@section('contents')
<section class="row">	
	
	@include('utilities.alert-flash-message')
	<div class="col card px-3 py-3">
		<div class="d-flex justify-content-end pb-3">
			<div class="btn-group d-gap gap-2">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPasarModal">
					<i class="bi bi-plus-circle"></i> Tambah Data
				</button>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-sm w-100" id="datatable">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Nama</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>
</section>
@endsection

@push('modal')
@include('menu.kelolapasar.modal.create')
@include('menu.kelolapasar.modal.edit')
@endpush

@push('js')
@include('menu.kelolapasar.script')
@endpush