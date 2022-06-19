<div class="modal fade" id="updateWishModal" tabindex="-1" role="dialog" aria-labelledby="updateWishModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitle">{{ __('messages.add-new-wish') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('update-wish') }}" method="post" id="updateWishForm">

                <div class="modal-body">
                    @csrf
                    <div>
                        <label for="wish_name">{{ __('messages.wish-name') }}</label>
                        <input type="text" class="form-control" name="wish_name" required id="wish_name">
                    </div>

                    <div>
                        <label for="description">{{ __('messages.description') }}</label>
                        <input type="text" class="form-control" name="description" id="description">
                    </div>

                    <div>
                        <label for="price">{{ __('messages.price') }}</label>
                        <input type="number" class="form-control" name="price" min="0" max="999999" id="price">
                    </div>

                    <div>
                        <label for="link">{{ __('messages.link') }}</label>
                        <input type="text" class="form-control" name="link" id="link">
                    </div>
                    <div>
                        <input type="hidden" name="wish_id" id="wish_id" value="">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{ __('messages.close') }}
                    </button>
                    <button type="submit" class="btn btn-primary">
                        {{ __('messages.save-changes') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
