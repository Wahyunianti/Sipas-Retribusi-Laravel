<script>
	$(function () {
		let loadingAlert = $('.modal-body #loading-alert');

		$('#datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('pasar.index') }}",
			columns: [
				{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
				{ data: 'nama_pasar', name: 'nama_pasar' },
				{ data: 'action', name: 'action' },
			]
		});

		$('#datatable').on('click', '.pasar-edit', function () {
			loadingAlert.show();

			let id = $(this).data('id');
			let url = "{{ route('api.pasar.edit', ':param') }}";
			url = url.replace(':param', id);

			let formActionURL = "{{ route('pasar.update', ':param') }}";
			formActionURL = formActionURL.replace(':param', id)

			let editPasarModalEveryInput = $('#editPasarModal :input').not('button[type=button], input[name=_token], input[name=_method]')
				.each(function () {
					$(this).not('select').val('Sedang mengambil data..');
					$(this).prop('disabled', true);
				});

			$.ajax({
				url: url,
				headers: {
					'Authorization': 'Bearer ' + localStorage.getItem('token'),
					'Accept': 'application/json',
				},
				success: function (response) {
					loadingAlert.slideUp();

					editPasarModalEveryInput.prop('disabled', false);

					$('#editPasarModal #edit-pasar-form').attr('action', formActionURL);
					$('#editPasarModal #nama_pasar').val(response.data.nama_pasar);
				}
			});
		});
	});
</script>
