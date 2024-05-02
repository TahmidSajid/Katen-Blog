<!-- Standard modal content -->
<div id="standard-modal{{ $key }}" class="modal fade text-start" tabindex="-1" role="dialog"
aria-labelledby="standard-modalLabel" aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="standard-modalLabel">
                Category View
            </h4>
            <button type="button" class="btn-close"
                data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="row mb-4">
                <div class="col-lg-4">
                    Category Name
                </div>
                <div class="col-lg-2">
                    :
                </div>
                <div class="col-lg-6">
                    {{ $category->category_name }}
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-4">
                    Category Slug
                </div>
                <div class="col-lg-2">
                    :
                </div>
                <div class="col-lg-6">
                    {{ $category->category_slug }}
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-4">
                    Description
                </div>
                <div class="col-lg-2">
                    :
                </div>
                <div class="col-lg-6">
                    {{ $category->category_description }}
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-4">
                    Added By
                </div>
                <div class="col-lg-2">
                    :
                </div>
                <div class="col-lg-6">
                    {{ $category->added_by }}
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-lg-4">
                    Image
                </div>
                <div class="col-lg-2">
                    :
                </div>
                <div class="col-lg-6">
                    @if ($category->category_photo)
                        <img class="avatar-xl"
                            src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}"
                            alt="img">
                    @else
                        no image added
                    @endif
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-light"
                data-bs-dismiss="modal">Close</button>
        </div>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
