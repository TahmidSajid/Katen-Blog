@extends('layouts.dashboard')
@section('content')
    <!-- start page title -->
    <div class="py-3 py-lg-4">
        <div class="row">
            <div class="col-lg-6">
                <h4 class="page-title mb-0">Dashborad</h4>
            </div>
            <div class="col-lg-6">
                <div class="d-none d-lg-block">
                    <ol class="breadcrumb m-0 float-end">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Katen</a></li>
                        <li class="breadcrumb-item active">Dashborad</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <div class="row">
        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Add Category</h4>
                    <div class="row">
                        <div class="col-12">
                            <div class="p-2">
                                <form class="form-horizontal" action="{{ route('category.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label" for="simpleinput">Category Name</label>
                                        <div class="col-md-8">
                                            <input type="text" id="simpleinput" class="form-control"
                                                name="category_name">
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
                                                cols="30" rows="10"></textarea>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <label class="col-md-4 col-form-label" for="simpleinput">Category Photo
                                            <span>(optional)</span></label>
                                        <div class="col-md-8">
                                            <input type="file" id="simpleinput" class="form-control"
                                                name="category_photo">
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-2 offset-md-10">
                                            <button class="btn btn-info waves-effect waves-light"
                                                type="submit">Save</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- end row -->
                </div>
            </div> <!-- end card -->
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Category List</h4>

                    <table id="alternative-page-datatable" class="table dt-responsive nowrap w-100 text-center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Photo</th>
                                <th>Category Name </th>
                                <th>Category Slug </th>
                                <th>Description</th>
                                <th>Added By</th>
                                <th>Action</th>
                                <th>Make Showcase</th>
                            </tr>
                        </thead>


                        <tbody>
                            @forelse ($categories as $key => $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if ($category->category_photo)
                                            <img class="avatar-xs"
                                                src="{{ asset('uploads/category_photos') }}/{{ $category->category_photo }}"
                                                alt="img">
                                        @else
                                            no image added
                                        @endif
                                    </td>
                                    <td>{{ $category->category_name }}</td>
                                    <td>{{ $category->category_slug }}</td>
                                    <td>
                                        @if ($category->category_description)
                                            {{ $category->category_description }}
                                        @else
                                            no description added
                                        @endif
                                    </td>
                                    <td>{{ $category->added_by }}</td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <a class="text-info" data-bs-toggle="modal"
                                                    data-bs-target="#standard-modal{{ $key }}">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                                @include('components.categories.categories_view')
                                            </div>
                                            <div class="col-lg-4">
                                                <button class="bg-transparent border-0" data-bs-toggle="modal"
                                                    data-bs-target="#update-modal{{ $key }}">
                                                    <i class="fa-solid fa-pencil"></i>
                                                </button>
                                                @include('components.categories.categories_edit')
                                            </div>
                                            <div class="col-lg-4">
                                                <form action="{{ route('category.destroy', $category->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="bg-transparent border-0 text-danger" type="submit">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <a class="btn btn-sm btn-primary" href="{{ route('make_showcase',['banner_one',$category->id]) }}">Banner 1</a>
                                            </div>
                                            <div class="col-lg-6">
                                                <a class="btn btn-sm btn-primary" href="{{ route('make_showcase',['banner_two',$category->id]) }}">Banner 2</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @empty
                            @endforelse
                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div>
    </div>
@endsection

@if (session('category_update'))
    @section('alert')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('category_update') }}"
            });
        </script>
    @endsection
@endif

@if (session('category_delete'))
    @section('alert')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "error",
                title: "{{ session('category_delete') }}"
            });
        </script>
    @endsection
@endif

@if (session('category_added'))
    @section('alert')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('category_added') }}"
            });
        </script>
    @endsection
@endif

@if (session('showcase_update'))
    @section('alert')
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });
            Toast.fire({
                icon: "success",
                title: "{{ session('showcase_update') }}"
            });
        </script>
    @endsection
@endif










@push('pageCss')
    <!-- third party css -->
    <link href="{{ asset('dashboard-assets') }}/libs/datatables.net-bs5/css/dataTables.bootstrap5.min.css" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('dashboard-assets') }}/libs/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard-assets') }}/libs/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('dashboard-assets') }}/libs/datatables.net-select-bs5/css/select.bootstrap5.min.css"
        rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endpush

@push('pageJs')
    <!-- third party js -->
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-bs5/js/dataTables.bootstrap5.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-responsive-bs5/js/responsive.bootstrap5.min.js">
    </script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-buttons-bs5/js/buttons.bootstrap5.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/datatables.net-select/js/dataTables.select.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/pdfmake/build/pdfmake.min.js"></script>
    <script src="{{ asset('dashboard-assets') }}/libs/pdfmake/build/vfs_fonts.js"></script>
    <!-- third party js ends -->

    <!-- Datatables js -->
    <script src="{{ asset('dashboard-assets') }}/js/pages/datatables.js"></script>
@endpush
