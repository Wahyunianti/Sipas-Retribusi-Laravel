@extends('layouts.main', ['title' => 'Retribusi', 'page_heading' => 'Data Retribusi'])

@section('contents')
<section class="row">

	@include('utilities.alert-flash-message')
	<div class="col card px-3 py-3">
		<div class="d-flex justify-content-end pb-3">
			<div class="btn-group d-gap gap-2">
				<form action="{{ route('truncate.tabel') }}" method="GET">
					@csrf @method('DELETE')
					<button type="submit" class="btn btn-danger" id="truncate">
						<i class="bi bi-trash-fill"></i> Dell
					</button>
				</form>
				<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addImportModal">
					<i class="bi bi-file-earmark-excel-fill"></i> Import Excel
				</button>
				<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addRetribusiModal">
					<i class="bi bi-plus-circle"></i> Tambah Data
				</button>
			</div>
		</div>

		<div class="table-responsive">
			<table class="table table-sm w-100" id="datatable">
				<thead>
					<tr>
						<th scope=" col">#</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Pasar</th>
						<th scope="col">Bagian</th>
						<th scope="col">Jumlah Retribusi</th>
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
@include('menu.kelolaretribusi.modal.create')
@include('menu.kelolaretribusi.modal.import')
@include('menu.kelolaretribusi.modal.edit')
@endpush

@push('js')
@include('menu.kelolaretribusi.script')
<script>
	
	</script>
@endpush


	
	