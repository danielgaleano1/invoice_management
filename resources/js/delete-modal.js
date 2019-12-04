$('#confirm_delete_modal').on('show.bs.modal', function (e) {
    $('#delete_form').attr('action', $(e.relatedTarget).data('route'));
});