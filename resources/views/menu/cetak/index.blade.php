@extends('layouts.main', ['title' => 'Laporan', 'page_heading' => 'Cetak Laporan'])


@section('contents')
<section class="row">
	<div class="card px-3 py-3">		
		<form action="{{ route('cetak.export') }}" method="GET">
		<label for="start_date" class=" fw-bold pb-3">Cetak Laporan Per Bulan :</label>
		<div class="input-group">
			<select class="form-control" name="bln" id="bln">
									
				@foreach ($bulan as $index => $namaBulan)
				<option value="{{ $index + 1 }}">Bulan {{ $namaBulan }}</option>
				@endforeach
			</select>
			<select class="form-control" name="bgn" id="bgn">
									
				@foreach ($bagian as $bagiane)
				<option value="{{ $bagiane->id }}" >
					Bagian {{ $bagiane->nama_bagian }}
				</option>
				@endforeach
			</select>

			<button type="submit" class="btn btn-success">
				<i class="bi bi-file-earmark-excel-fill"></i>Cetak</button>
        </div>
		</form>
	</div>
</section>
@endsection

@push('js')
@include('menu.cetak.script')
@endpush
