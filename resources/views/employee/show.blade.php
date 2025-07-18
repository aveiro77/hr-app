@extends('layouts.dashboard')
@section('content')

    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>
            
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tasks</h3>
                    <p class="text-subtitle text-muted">Employee Profile</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Employees</li>
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-md-12 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">View Employee</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="fullname">Fullname</label>
                                    <p>{{ $employee->fullname }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="email">Email</label>
                                    <p>{{ $employee->email }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="phone_number">Phone</label>
                                    <p>{{ $employee->phone_number }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="address">Address</label>
                                    <p>{{ $employee->Address }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="birth_date">Birth date</label>
                                    <p>{{ \Carbon\Carbon::parse($employee->birth_date)->format('d F Y') }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="hire_date">Hire date</label>
                                    <p>{{ \Carbon\Carbon::parse($employee->hire_date)->format('d F Y') }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="departement">Departement</label>
                                    <p>{{ $employee->departement->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="role">Role</label>
                                    <p>{{ $employee->role->name }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <p>{{ $employee->status }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="salary">Salary</label>
                                    <p>{{ number_format($employee->salary) }}</p>
                                </div>


                                <div class="col-sm-12 d-flex justify-content-end">
                                    <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-light-secondary me-1 mb-1">
                                        Edit
                                    </a>
                                    <a href="{{ route('employees.index') }}" class="btn btn-info me-1 mb-1">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
@endsection
