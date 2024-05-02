<!-- Standard modal content -->
<div id="update-modal{{ $key }}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="standard-modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Modal
                    Heading</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" action="{{ route('category.update', $category) }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label" for="simpleinput">Category Name</label>
                        <div class="col-md-8">
                            <input type="text" id="simpleinput" class="form-control" name="category_name"
                                value="{{ $category->category_name }}">
                            @error('category_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label" for="simpleinput">Description
                            <span>(optional)</span></label>
                        <div class="col-md-8">
                            <textarea type="text" id="simpleinput" class="form-control" name="category_description" style="resize: none"
                                cols="30" rows="10">{{ $category->category_description }}</textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label" for="simpleinput">Current Category Photo
                            <span>(optional)</span></label>
                        <div class="col-md-12">
                            <img class="img-thumbnail" style="height: 150px; width:150px;"
                                src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}"
                                alt="img">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-md-4 col-form-label" for="simpleinput">Category Photo
                            <span>(optional)</span></label>
                        <div class="col-md-8">
                            <input type="file" id="simpleinput" class="form-control" name="category_photo">
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-info waves-effect waves-light">Save
                    changes</button>
            </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<!-- /.modal -->
