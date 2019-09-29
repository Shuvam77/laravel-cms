// $(document).ready(function () {

// });


$('#category-edit').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget)
    var name = button.data('name')
    var id = button.data('id')
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-body #name').val(name)
    modal.find('.modal-body #id').val(id)

})