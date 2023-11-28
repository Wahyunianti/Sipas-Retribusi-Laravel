@extends('layouts.auth.main')

@section('contents')
<div class="row h-100">
	<div class="col-lg-5 col-12">
		<div id="auth-left">
			<h1 class="auth-title">Login</h1>
			<p class="auth-subtitle mb-5">Sistem Informasi Retribusi Pasar</p>

			<form action="{{ route('login') }}" method="POST">
				@csrf

				@error('email')
				<div class="alert alert-danger alert-dismissible fade show text-sm" role="alert">
					<strong>Gagal!</strong> {{ $message }}.
					<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
				</div>
				@enderror

				<div class="form-group position-relative has-icon-left mb-4">
					<input type="email" class="form-control form-control-xl @error('email') is-invalid @enderror" name="email"
						id="email" placeholder="Email" value="admin@gmail.com" required>
					<div class="form-control-icon">
						<i class="bi bi-person"></i>
					</div>
				</div>
				<div class="form-group position-relative has-icon-left mb-4">
					<input type="password" class="form-control form-control-xl @error('password') is-invalid @enderror"
						name="password" id="password" placeholder="Password" value="disperindag" required>
					<div class="form-control-icon">
						<i class="bi bi-shield-lock"></i>
					</div>
				</div>
				<button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
			</form>
		</div>
	</div>
	<div class="col-lg-7 d-none d-lg-block">
		<div id="auth-right">
            <img src="{{ asset('img/bg.png') }}" style="width: 100%; position: fixed;" alt="">
		</div>
	</div>
</div>
@endsection

@push('js')
<script>
	$(function() {
		$('form').submit(function() {
			let URL = "{{ route('api.login') }}";
			let email = $('#email').val();
			let password = $('#password').val();

			$.ajax({
				url: URL,
				type: 'post',
				data: {
					'email': email,
					'password': password
				},
				success: function (res) {
					localStorage.setItem('token', res.data);
				}
			});
		});
	});
</script>
@endpush
