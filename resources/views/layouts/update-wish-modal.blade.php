<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Add new wish</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('update-wish') }}" method="post" id="updateWishForm">

                <div class="modal-body">
                    @csrf
                    <div>
                        <label for="wish_name">Wish name</label>
                        <input type="text" class="form-control" name="wish_name" required id="wish_name">
                    </div>

                    <div>
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description">
                    </div>

                    <div>
                        <label for="price">Price</label>
                        <input type="number" class="form-control" name="price" min="0" max="999999" id="price">
                    </div>

                    <div>
                        <label for="link">Link</label>
                        <input type="text" class="form-control" name="link" id="link">
                    </div>
                    <div>
                        <input type="hidden" name="wish_id" id="wish_id" value="">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
