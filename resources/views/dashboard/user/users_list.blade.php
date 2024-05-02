@extends('layouts.dashboard')
@section('content')
    <div class="card">
        <div class="card-body">

            <h4 class="header-title">Users</h4>

            <div class="row mx-auto text-center" style="width: 500px">
                <div class="col-lg-3">
                    <a class="btn btn-sm btn-info" href="{{ route('users.index') }}">
                        All
                    </a>
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-sm btn-info" href="{{ route('list', 'admin') }}">
                        Admin
                    </a>
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-sm btn-info" href="{{ route('list', 'admin') }}">
                        Writter
                    </a>
                </div>
                <div class="col-lg-3">
                    <a class="btn btn-sm btn-info" href="{{ route('list', 'viewer') }}">
                        Viwer
                    </a>
                </div>

            </div>

            <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                <thead>
                    <tr>

                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                        {{-- <th>Action</th> --}}
                    </tr>
                </thead>


                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="table-user">
                                @if ($user->photo)
                                    <img src="{{ asset('uploads/profile_photos') }}/{{ $user->photo }}" alt="table-user"
                                        class="mr-2 avatar-xs rounded-circle">
                                @else
                                    <img src="{{ asset('dashboard-assets/images/default_profile.png') }}" alt="table-user"
                                        class="mr-2 avatar-xs rounded-circle">
                                @endif
                                <a href="javascript:void(0);" class="text-body font-weight-semibold">{{ $user->name }}</a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-4">
                                        @if ($user->role != 'admin')
                                            <a href="{{ route('change_role', ['admin', $user->id]) }}"
                                                class="btn btn-sm btn-primary">Admin</a>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        @if ($user->role != 'writter')
                                            <a href="{{ route('change_role', ['writter', $user->id]) }}"
                                                class="btn btn-sm btn-primary">Writter</a>
                                        @endif
                                    </div>
                                    <div class="col-lg-4">
                                        @if ($user->role != 'viewer')
                                            <a href="{{ route('change_role', ['viewer', $user->id]) }}"
                                                class="btn btn-sm btn-primary">Viewer</a>
                                        @endif
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
@endsection
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
