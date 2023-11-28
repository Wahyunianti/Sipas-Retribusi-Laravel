<div class="modal fade" id="addImportModal" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Import File CSV</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="{{ route('csv.import') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-12 col-md-12 col-lg-12">
							<div class="d-grid gap-2">
							<input type="file" name="file" class="form-control" accept=".csv">
							<button class="btn btn-success p-3" class="form-control">
								<i class="bi bi-file-earmark-excel-fill"></i> Import File</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

