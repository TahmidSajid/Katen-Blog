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
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card mt-4">
                <div class="card-body">
                    <h4 class="card-title">Logged-in as</h4>
                    <p>{{ auth()->user()->name }}</p>
                </div> <!--end card body-->
            </div>
        </div>
    </div>
@endsection
