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
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">
                        Tasks List
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-flex">
                        <a href="{{ route('tasks.create') }}" class="btn btn-primary mb-3 ms-auto">New Task</a>
                    </div>
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Message :</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Assigned to</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Option</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tasks as $task)
                                <tr>
                                    <td class="text-sm">{{ $task->title }}</td>
                                    <td class="text-sm">{{ $task->employee->fullname }}</td>
                                    <td class="text-sm">{{ $task->due_date }}</td>
                                    <td class="text-sm">
                                        @if($task->status=='pending')
                                            <span class="text-warning">Pending</span>
                                        @elseif($task->status=='done')
                                            <span class="text-success">Done</span>
                                        @else
                                            <span class="text-info">{{ $task->status }}</span>
                                        @endif
                                    </td>
                                    <td class="text-sm">

                                        @if($task->status=='pending')
                                            <a href="{{ route('tasks.done', $task->id) }}" class="badge rounded-pill text-bg-success m-1">Mark as Done</a>    
                                        @else
                                            <a href="{{ route('tasks.pending', $task->id) }}" class="badge rounded-pill text-bg-warning m-1">Mark as Pending</a>   
                                        @endif
                                        <a href="{{ route('tasks.show', $task->id) }}" class="badge rounded-pill text-bg-primary m-1">View</a>
                                        <a href="{{ route('tasks.edit', $task->id) }}" class="badge rounded-pill text-bg-dark m-1">Edit</a>

                                        <button class="badge rounded-pill text-bg-danger m-1" data-bs-toggle="modal"
                                            data-bs-target="#danger{{ $task->id }}">
                                            Delete
                                        </button>

                                        <!--Danger theme Modal -->
                                        <div class="modal fade text-left" id="danger{{ $task->id }}" tabindex="-1" role="dialog"
                                            aria-labelledby="myModalLabel120" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                                                role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-danger">
                                                        <h5 class="modal-title white" id="myModalLabel120">Delete Tasks
                                                        </h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <i data-feather="x"></i>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Are you sure to delete this task?
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-light-secondary"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-x d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Close</span>
                                                        </button>
                                                        <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger ms-1"
                                                            data-bs-dismiss="modal">
                                                            <i class="bx bx-check d-block d-sm-none"></i>
                                                            <span class="d-none d-sm-block">Delete</span>
                                                        </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </section>
</div>
@endsection
