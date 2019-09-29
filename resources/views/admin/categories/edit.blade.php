<div class="modal fade"  id="category-edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title primary">Edit Category</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body align-content-lg-start">
                <div class="col-md-12">
                        <!-- form start -->
                        <form role="form" action="{{ route( 'admin-categories.update','modal') }}" method="post">
                            @csrf
                            @method('PATCH')
                            <div class="col md-10">
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="hidden" class="form-control" id="id" name="id" value="">
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                                </div>

                                <button type="submit" class="btn btn-primary pull-right">Update</button>

                            </div>
                            <!-- /.card-body -->
                        </form>
                </div><!--col-md-9 -->
            </div><!--Modal Body-->

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
