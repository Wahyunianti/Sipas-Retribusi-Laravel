<script>
	$(function () {
		let loadingAlert = $('.modal-body #loading-alert');

		$('#datatable').DataTable({
			processing: true,
			serverSide: true,
			ajax: "{{ route('retribusis.index') }}",
			columns: [
				{ data: 'DT_RowIndex', name: 'DT_RowIndex' },
				{ data: 'tanggal', name: 'tanggal' },
                { data: 'data_pasar_id', name: 'data_pasar.nama_pasar' },
                { data: 'bagian_id', name: 'bagian.nama_bagian' },
                { data: 'jumlah', name: 'jumlah' },
				{ data: 'action', name: 'action' }
			]
		});


		$('#datatable').on('click', '.retribusi-edit', function () {
			loadingAlert.show();

			let id = $(this).data('id');
			let url = "{{ route('api.retribusis.edit', ':param') }}";
			url = url.replace(':param', id);

			let formActionURL = "{{ route('retribusis.update', ':param') }}"
			formActionURL = formActionURL.replace(':param', id);
			
			let editRetribusiModalEveryInput = $('#editRetribusiModal :input').not('button[type=button], input[name=_token], input[name=_method]')
				.each(function () {
					$(this).not('select').val('Sedang mengambil data..');
					$(this).prop('disabled', true);
				});

			$.ajax({
				url: url,
				headers: {
					// 'Authorization': 'Bearer ' + localStorage.getItem('token'),
					// 'Accept': 'application/json'
				},
				success: function (response) {
					loadingAlert.slideUp();

					editRetribusiModalEveryInput.prop('disabled', false);
					$('#editRetribusiModal #tanggal').val(response.data.tanggal);
					$('#editRetribusiModal #data_pasar_id').val(response.data.data_pasar_id).select2();
					$('#editRetribusiModal #bagian_id').val(response.data.bagian_id).select2();
					$('#editRetribusiModal #jumlah').val(response.data.jumlah);
					$('#editRetribusiModal #edit-retribusi-form').attr('action', formActionURL)
				}
			});

			
		});

	});
</script>
