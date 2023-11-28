<script>
	$(function () {
		let loadingAlert = $('.modal-body #loading-alert');

		$('#datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('bagian.index') }}",
			columns: [
				{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
				{ data: 'nama_bagian', name: 'nama_bagian' },
				{ data: 'action', name: 'action' },
			]
		});

		$('#datatable').on('click', '.bagian-edit', function () {
			loadingAlert.show();

			let id = $(this).data('id');
			let url = "{{ route('api.bagian.edit', ':param') }}";
			url = url.replace(':param', id);

			let formActionURL = "{{ route('bagian.update', ':param') }}";
			formActionURL = formActionURL.replace(':param', id)

			let editBagianModalEveryInput = $('#editBagianModal :input').not('button[type=button], input[name=_token], input[name=_method]')
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

					editBagianModalEveryInput.prop('disabled', false);

					$('#editBagianModal #edit-bagian-form').attr('action', formActionURL);
					$('#editBagianModal #nama_bagian').val(response.data.nama_bagian);
				}
			});
		});
	});
</script>
