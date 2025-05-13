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
                    <p class="text-subtitle text-muted">Handle employee tasks</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">Tasks</li>
                            <li class="breadcrumb-item active" aria-current="page">Index</li>
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
                            <h4 class="card-title">Horizontal Form</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" method="POST" action="{{ route('tasks.store') }}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label for="title">Title</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="title" class="form-control" name="title" placeholder="Title" value="{{ old('title') }}" id="employee">
                                                @error('title')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-2">
                                                <label for="assigned_to">Employee</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select class="choices form-select form-control @error('assigned_to') is_invalid @enderror" id="assigned_to" name="assigned_to">
                                                    <option value="none">Employee</option>
                                                    @foreach ($employees as $employee)
                                                        <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <label for="description">Description</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="description" class="form-control" name="description" placeholder="Description" value="{{ old('description') }}">
                                                @error('description')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div class="col-md-2">
                                                <label for="due_date">Due date</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="datetime-local" id="password-horizontal" class="form-control date @error('due_date') is_invalid @enderror" value="{{ old('due_date') }}" name="due_date" id="due_date">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="status">Status</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select name="status" id="status" class="form-control @error('status') is_invalid @enderror">
                                                    <option value="done">Done</option>
                                                    <option value="pending">Pending</option>
                                                    <option value="on progress">On Progress</option>
                                                </select> 
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
