<div class="modal fade" id="exampleModalCenterDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">{{ __('messages.delete-wish') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('delete-wish') }}" method="post" id="deleteWishForm">
                @csrf
                <div class="modal-body">
                    {{ __('messages.are-you-sure-delete-wish') }}
                    <div>
                        <input type="hidden" name="delete_wish_id" id="delete_wish_id" value="">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        {{ __('messages.close') }}
                    </button>
                    <button type="submit" class="btn btn-danger">
                        {{ __('messages.delete') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
