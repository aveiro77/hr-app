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
                    <p class="text-subtitle text-muted">Handle employee edit</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Employee</li>
                            <li class="breadcrumb-item active" aria-current="page">Edit</li>
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
                            <h4 class="card-title">Edit Employee</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">

                                @if(session('error'))
                                    <div class="alert alert-danger">{{ session('error') }}</div>
                                @endif

                                <form class="form form-horizontal" method="POST" action="{{ route('employees.update', $employee->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label for="title">Fullname</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="fullname" class="form-control" name="fullname" value="{{ old('fullname', $employee->fullname) }}" id="fullname">
                                                @error('fullname')
                                                    <div class="text-danger text-sm">{{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="email" class="form-control" name="email" value="{{ old('email', $employee->email) }}">
                                                @error('email')
                                                    <div class="text-danger text-sm">{{ $message }}*</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="phone">Phone Number</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="phone_number" class="form-control" name="phone_number" value="{{ old('phone_number', $employee->phone_number) }}">
                                                @error('phone_number')
                                                    <div class="text-danger text-sm">{{ $message }}*</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="address">Address</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <textarea id="address" class="form-control" name="address" placeholder="Address">{{ old('address', $employee->address) }}</textarea>
                                                @error('address')
                                                    <div class="text-danger text-sm">{{ $message }}*</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="birth_date">Birth</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="date" id="birth_date" class="form-control date" name="birth_date" value="{{ old('birth_date', $employee->birth_date) }}">
                                                @error('birth_date')
                                                    <div class="text-danger text-sm">{{ $message }}*</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="hire_date">Hire Date</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="date" id="hire_date" class="form-control date" name="hire_date" value="{{ old('hire_date', $employee->hire_date) }}">
                                                @error('hire_date')
                                                    <div class="text-danger text-sm">{{ $message }}*</div>
                                                @enderror
                                            </div>
                                            

                                            <div class="col-md-2">
                                                <label for="departement_id">Departement</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select class="choices form-select form-control @error('departement_id') is_invalid @enderror" id="departement_id" name="departement_id">
                                                    <option value="none">Departement</option>
                                                    @foreach ($departements as $departement)
                                                        <option value="{{ $departement->id }}" {{ old('departement_id', $employee->departement_id) == $departement->id ? 'selected' : '' }} >
                                                            {{ $departement->name }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('departement_id')
                                                    <div class="text-danger text-sm">{{ $message }}*</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="role_id">Role</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select class="choices form-select form-control @error('role_id') is_invalid @enderror" id="role_id" name="role_id">
                                                    <option value="none">Role</option>
                                                    @foreach ($roles as $role)
                                                        <option value="{{ $role->id }}" {{ old('role_id', $employee->role_id) == $role->id ? 'selected' : '' }} >{{ $role->title }}</option>
                                                    @endforeach
                                                </select>
                                                @error('role_id')
                                                    <div class="text-danger text-sm">{{ $message }}*</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="status">Status</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select class="choices form-select form-control @error('status') is_invalid @enderror" id="status" name="status">
                                                    <option value="active" {{ old('status', $employee->status) == 'active' ? 'selected' : '' }} >Active</option>
                                                    <option value="inactive" {{ old('status', $employee->status) == 'inactive' ? 'selected' : '' }} >Inactive</option>
                                                </select>
                                                @error('status')
                                                    <div class="text-danger text-sm">{{ $message }}*</div>
                                                @enderror
                                            </div>

                                            <div class="col-md-2">
                                                <label for="salary">Salary</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="number" id="salary" class="form-control" name="salary" value="{{ old('salary', $employee->salary) }}">
                                                @error('salary')
                                                    <div class="text-danger text-sm">{{ $message }}*</div>
                                                @enderror
                                            </div>
                                            
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <a href="{{ route('employees.index') }}" class="btn btn-info me-1 mb-1">Back</a>
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset
                                                </button>
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
