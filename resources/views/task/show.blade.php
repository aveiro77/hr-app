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
                            <h4 class="card-title">View Task</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <div class="mb-3">
                                    <label for="title">Title</label>
                                    <p>{{ $task->title }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="employee">Employee</label>
                                    <p>{{ $task->employee->fullname }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="description">Description</label>
                                    <p>{{ $task->description }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="duedate">Due date</label>
                                    <p>{{ \Carbon\Carbon::parse($task->due_date)->format('d F Y') }}</p>
                                </div>
                                <div class="mb-3">
                                    <label for="status">Status</label>
                                    <p>{{ $task->status }}</p>
                                </div>

                                <div class="col-sm-12 d-flex justify-content-end">
                                    <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-light-secondary me-1 mb-1">
                                        Edit
                                    </a>
                                    <a href="{{ route('tasks.index') }}" class="btn btn-info me-1 mb-1">Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
</div>
@endsection
