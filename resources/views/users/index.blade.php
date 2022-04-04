@extends('mylayouts.main')

@section('container')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">

            <div class="card">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-10">
                            <h5 class="card-header">Users</h5>
                        </div>
                        <div class="col-md-2 d-flex justify-center align-items-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Create User
                            </button>
                        </div>
                    </div>
                </div>
                <div class="table-responsive" style="height: 65vh">
                    <table class="table" style="text-align: center">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name User</th>
                                <th>Email User</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <tr>
                                <td>1</td>
                                <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>Angular Project</strong>
                                </td>
                                <td>Albert Cook</td>
                                <td>
                                    Admin
                                </td>
                                <td>
                                    <button class="btn btn-warning">Edit</button>
                                    <button class="btn btn-danger">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
        <!-- / Content -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('users.store') }}" method="post">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            @csrf
                            <div class="mb-3 row">
                                <label for="html5-text-input" class="col-md-3 col-form-label">Name</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" value="" id="html5-text-input"
                                        placeholder="Name User" name="name" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-email-input" class="col-md-3 col-form-label">Email User</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="email" placeholder="john@example.com"
                                        id="html5-email-input" name="email" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="html5-password-input" class="col-md-3 col-form-label">Password</label>
                                <div class="col-md-9">
                                    <input class="form-control" type="password" placeholder="password"
                                        id="html5-password-input" name="password" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="exampleDataList" class="col-form-label col-md-3">Role</label>
                                <div class="col-md-9">
                                    <input class="form-control" list="datalistOptions" id="exampleDataList"
                                        placeholder="Role" name="role" />
                                    <datalist id="datalistOptions">
                                        @foreach ($roles as $role)
                                            @if ($role !== 'admin')
                                            <option value="{{ $role }}"></option>
                                            @endif
                                        @endforeach
                                    </datalist>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="content-backdrop fade"></div>
    </div>
@endsection
