@extends('layouts.base')

@section('content')
    <div class="container">
        <!-- Search Bar -->
        <form action="{{ route('get-schools') }}" method="get">         <!-- get-schools -->
            <div class="input-group mt-5">
                <input type="text" class="form-control" placeholder="Search for schools" id="schoolsSearch" name="searchTerm">
                <button class="btn btn-outline-secondary" type="submit" id="searchButton">Search</button>
            </div>
        </form>

        <!-- If search was performed and no products were found, display a message -->
        @if ($schools->isEmpty())
            <div class="alert alert-danger">
                <ul>
                    <li>There are no schools with this name.</li>
                </ul>
            </div>
        @endif

        <!-- Add New schools and Show All schools Buttons -->
        <div class="row mt-3">
            <div class="col">
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Add New schools</button>
                    <a href="{{ route('all-schools') }}" class="btn btn-primary">Show All schools</a>
                </div>

               <!-- Add New School Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-success" id="staticBackdropLabel">Add New schools</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="{{ route('create-school') }}" method="POST">
                    @csrf
                    <input type="text" class="form-control" name="schoolsName" placeholder="School Name" required>
                    <button type="submit" class="btn btn-info mt-3">Save</button>
                    <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Cancel</button>
                </form>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Schools Table -->
        <div class="row mt-5 text-dark">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">Schools ID</th>
                                    <th scope="col">Schools Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schools as $school)
                                    <tr>
                                        <th scope="row" class="text-dark">{{ $school->id }}</th>
                                        <td class="text-dark">{{ $school->schoolsName }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <form action="{{ route('show-edit-school-form', ['id' => $school->id]) }}" method="POST">

                                            <a href="{{ route('show-edit-school-form', ['id' => $school->id]) }}" class="btn btn-success"><i class="bi bi-pencil-square"></i> Edit</a>
                                            <!-- Delete Button -->
                                            <form action="{{ route('delete-school', ['id' => $school->id]) }}" method="POST" style="display: inline-block;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i> Delete</button>
                                            
                                            <!-- Add Details Button -->
                                            <a href="{{ route('school-details', ['id' => $school->id]) }}" class="btn btn-info"><i class="bi bi-file-plus"></i> Add Details</a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection