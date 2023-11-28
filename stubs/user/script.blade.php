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
				{ data: 'created_at', name: 'created_at' },
				{ data: 'action', name: 'action' },
			]
		});


		$('#datatable').on('click', '.user-edit', function () {
			loadingAlert.show();

			let id = $(this).data('id');
			let url = "{{ route('api.pengguna.edit', ':param') }}";
			url = url.replace(':param', id);

			let formActionURL = "{{ route('pengguna.update', ':param') }}";
			formActionURL = formActionURL.replace(':param', id);

			// let editUserModalEveryInput = $('#editUserModal :input').not('button[type=button], input[name=_token], input[name=_method]')
			// 	.each(function () {
			// 		$(this).not('select').val('Sedang mengambil data..');
			// 		$(this).prop('disabled', true);
			// 	});

			$.ajax({
				url: url,
				headers: {
					'Authorization': 'Bearer ' + localStorage.getItem('token'),
					'Accept': 'application/json',
					'Content-Type': 'application/json'
				},
				success: function (response) {
					loadingAlert.slideUp();

					// editUserModalEveryInput.prop('disabled', false);

					$('#editUserModal #user-edit-form').attr('action', formActionURL);

					$('#editUserModal #name').val(response.data.name);
					$('#editUserModal #email').val(response.data.email);
					$('#editUserModal #role_id').val(response.data.role_id);
					

				}
			});
		});
	});
</script>
