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
                    <h3>Employee</h3>
                    <p class="text-subtitle text-muted">Handle employee data</p>
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
                            <h4 class="card-title">Create a new employee</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="{{ route('employees.store') }}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label for="fullname">Fullname</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="fullname" class="form-control" name="fullname" placeholder="Fullname" value="{{ old('fullname') }}">
                                                @error('fullname')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-2">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="email" class="form-control" name="email" placeholder="email@example.com" value="{{ old('email') }}">
                                                @error('email')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="phone">Phone Number</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="phone_number" class="form-control" name="phone_number" placeholder="phone number" value="{{ old('phone_number') }}">
                                                @error('phone_number')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="address">Address</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <textarea id="address" class="form-control" name="address" placeholder="Address">{{ old('address') }}</textarea>
                                                @error('address')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="birth_date">Birth</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="date" id="birth_date" class="form-control date" name="birth_date" value="{{ old('birth_date') }}">
                                                @error('birth_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="hire_date">Hire Date</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="date" id="hire_date" class="form-control date" name="hire_date" value="{{ old('hire_date') }}">
                                                @error('hire_date')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            

                                            <div class="col-md-2">
                                                <label for="departement_id">Departement</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select class="choices form-select form-control @error('departement_id') is_invalid @enderror" id="departement_id" name="departement_id">
                                                    <option value="none">Departement</option>
                                                    @foreach ($departements as $departement)
                                                        <option value="{{ $departement->id }}">{{ $departement->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('departement_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="role_id">Role</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select class="choices form-select form-control @error('role_id') is_invalid @enderror" id="role_id" name="role_id">
                                                    <option value="none">Role</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}">{{ $role->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role_id')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="status">Status</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select class="choices form-select form-control @error('status') is_invalid @enderror" id="status" name="status">
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                                @error('status')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="salary">Salary</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="number" id="salary" class="form-control" name="salary" placeholder="1000" value="{{ old('salary') }}">
                                                @error('salary')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
@endsection
