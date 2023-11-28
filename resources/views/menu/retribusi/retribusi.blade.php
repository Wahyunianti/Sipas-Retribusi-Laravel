@extends('layouts.main', ['title' => 'Filter Retribusi', 'page_heading' => 'Retribusi Filter'])

@section('contents')
<section class="row">

	<div class="card px-3 py-3">		
		<form action="" method="GET">
		<label for="start_date" class=" fw-bold pb-3">Filter Data Retribusi :</label>
		<div class="input-group">
			<input type="date" name="start_date" class="form-control" id="start_date" placeholder="Pilih tanggal awal.." required>
			<input type="date" name="end_date" class="form-control" id="end_date" placeholder="Pilih tanggal akhir.." required>
								<select class="form-control" name="psr" id="psr" required>
									
									@foreach($dataPasar as $dataPasare)
									<option value="{{ $dataPasare->id }}" >
										Pasar {{ $dataPasare->nama_pasar }}
									</option>
									@endforeach
								</select>
								<select class="form-control" name="bgn" id="bgn" required>
									
									@foreach ($bagian as $bagiane)
									<option value="{{ $bagiane->id }}" >
										Bagian {{ $bagiane->nama_bagian }}
									</option>
									@endforeach
								</select>
			
			<button type="submit" class="btn btn-primary">Filter</button>
		</div>
		</form>
	</div>

	@include('utilities.alert-flash-message')


	@empty(!$filteredResult)
		
		<div class="row">
			<div class="col-6 col-lg-3 col-md-6">
					<div class="card card-stat">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon purple">
										<i class="iconly-boldDiscount"></i>
									</div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Jumlah</h6>
									<h6 class="font-extrabold mb-0">
										{{ indonesianCurrency($filteredResult['sumJumlah']) }}
									</h6>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-lg-3 col-md-6">
					<div class="card card-stat">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon blue">
										<i class="iconly-boldGraph"></i>
									</div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Rata-Rata</h6>
									<h6 class="font-extrabold mb-0">
										{{ indonesianCurrency($filteredResult['meanJumlah']) }}
									</h6>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-lg-3 col-md-6">
					<div class="card card-stat">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon green">
										<i class="iconly-boldSwap"></i>
									</div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Maksimum</h6>
									<h6 class="font-extrabold mb-0">
										{{ indonesianCurrency($filteredResult['maksimumJumlah']) }}
									</h6>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-lg-3 col-md-6">
					<div class="card card-stat">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon red">
										<i class="iconly-boldSwap"></i>
									</div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Minimum</h6>
									<h6 class="font-extrabold mb-0">{{ indonesianCurrency($filteredResult['minimumJumlah']) }}
									</h6>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
		</div>


		<div class="row">
			<div class="col-6 col-lg-6 col-md-6">
					<div class="card card-stat">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon purple">
										<i class="iconly-boldChart"></i>
									</div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Jumlah S/D Bulan Ini</h6>
									<h6 class="font-extrabold mb-0">
										{{ indonesianCurrency($filteredResult['spJumlah']) }}
									</h6>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			<div class="col-6 col-lg-6 col-md-6">
					<div class="card card-stat">
						<div class="card-body px-3 py-4-5">
							<div class="row">
								<div class="col-md-4">
									<div class="stats-icon blue">
										<i class="iconly-boldCalendar"></i>
									</div>
								</div>
								<div class="col-md-8">
									<h6 class="text-muted font-semibold">Jumlah Bulan Lalu</h6>
									<h6 class="font-extrabold mb-0">
										{{ indonesianCurrency($filteredResult['blJumlah']) }}
									</h6>
								</div>
							</div>
						</div>
					</div>
				</a>
			</div>
			
		</div>



		<div class="row">
		<div class="col card px-3 py-3">		

			<div class="table-responsive mt-3">
				<table class="table table-sm text-center caption-top" id="datatable">
					<caption>Laporan data dari tanggal <span class="fw-bold">{{ $filteredResult['start_date'] }}</span> -
						<span class="fw-bold">{{ $filteredResult['end_date'] }}</span>, Pasar <span class="fw-bold">{{ $filteredResult['namaPasar'] }}</span>, Bagian <span class="fw-bold">{{ $filteredResult['namaBagian'] }}</span>
					</caption>
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Nama Pasar</th>
							<th scope="col">Bagian</th>
							<th scope="col">Jumlah Retribusi</th>
						</tr>
					</thead>
					<tbody>
						@foreach ($filteredResult['retribusi'] as $retribusi)
						<tr>
							<th>{{ $loop->iteration }}</th>
							<td>{{ date('d-m-Y', strtotime($retribusi->tanggal)) }}</td>
							<td>{{ $retribusi->data_pasar->nama_pasar }}</td>
							<td>{{ $retribusi->bagian->nama_bagian }}</td>
							<td>{{ indonesianCurrency($retribusi->jumlah) }}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		</div>
	</div>
	@endempty
</section>
@endsection

{{-- 
	<div class="col" id="datatable-wrap"  style="display: none;">

	<div class="row card px-2 py-2" >
		<div class="row">
		<div class="col-6">
			<div class="card">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-4">
							<div class="stats-icon green">
								<i class="iconly-boldProfile"></i>
							</div>
						</div>
						<div class="col-8">
							<h6 class="text-muted font-semibold">Rata-Rata Retribusi</h6>
							<h6 class="font-extrabold mb-0">
								
							</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	
		<div class="col-6">
			<div class="card">
				<div class="card-body px-3 py-4-5">
					<div class="row">
						<div class="col-4">
							<div class="stats-icon blue">
								<i class="iconly-boldProfile"></i>
							</div>
						</div>
						<div class="col-8">
							<h6 class="text-muted font-semibold">Jumlah Retribusi</h6>
							<h6 class="font-extrabold mb-0">
								0
							</h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>


	<div class="row card px-2 py-2" >
		

		<div class="table-responsive">
			<table class="table table-sm w-100" id="datatable">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Nama Pasar</th>
						<th scope="col">Bagian</th>
						<th scope="col">Jumlah Retribusi</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
		</div>
	</div>

	</div>
</section> --}}


@push('js')
@include('menu.retribusi.script')
@endpush
