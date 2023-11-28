<script>
	$(function () {
		let loadingAlert = $('.modal-body #loading-alert');

		$('#datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('pengguna.index') }}",
			columns: [
				{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
				{ data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
				{ data: 'role_id', name: 'roles.role_name' },
				{ data: 'action', name: 'action' },
			]
		});


		$('#datatable').on('click', '.pengguna-edit', function () {
			loadingAlert.show();

			let id = $(this).data('id');
			let url = "{{ route('api.pengguna.edit', ':param') }}";
			url = url.replace(':param', id);

			let formActionURL = "{{ route('pengguna.update', ':param') }}"
			formActionURL = formActionURL.replace(':param', id);
			
			let editPenggunaModalEveryInput = $('#editPenggunaModal :input').not('button[type=button], input[name=_token], input[name=_method]')
				.each(function () {
					$(this).not('select').val('Sedang mengambil data..');
					$(this).prop('disabled', true);
				});

			$.ajax({
				url: url,
				headers: {
					'Authorization': 'Bearer ' + localStorage.getItem('token'),
					'Accept': 'application/json'
				},
				success: function (response) {
					loadingAlert.slideUp();

					editPenggunaModalEveryInput.prop('disabled', false);
					$('#editPenggunaModal #name').val(response.data.name);
					$('#editPenggunaModal #email').val(response.data.email);
					$('#editPenggunaModal #role_id').val(response.data.role_id).select2();
					$('#editPenggunaModal #edit-pengguna-form').attr('action', formActionURL)
				}
			});

			
		});

	});
</script>
