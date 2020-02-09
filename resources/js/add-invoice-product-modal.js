$('#add_invoice_product_modal').on('show.bs.modal', function (e) {
    $('#add_form').attr('action', $(e.relatedTarget).data('route'));
});