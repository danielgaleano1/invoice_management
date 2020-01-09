<div class="modal fade" tabindex="-1" role="dialog" id="import_invoice_excel_modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ __('Import invoice from Excel') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>{{ __('Select one file') }}</p>
                <form id="import_form" action="invoice_import_excel" method="post" enctype="multipart/form-data">
                    @csrf()

                    <input type="file" name="invoices" required accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> {{ __('Close') }}</button>
                <button type="submit" form="import_form" class="btn btn-success"><i class="fas fa-plus-circle"></i> {{ __('Import') }}</button>
            </div>
        </div>
    </div>
</div>