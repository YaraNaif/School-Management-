@extends('layouts.base')

@section('content')
<div class="container">

    <!-- Search Bar -->
    <form action="{{ route('get-schools') }}" method="get">
        <div class="input-group mt-5">
            <input type="text" class="form-control" placeholder="Search for schools" id="schoolsSearch" name="searchTerm">
            <button class="btn btn-outline-secondary" type="submit" id="searchButton">Search</button>
        </div>
    </form>

    <!-- If search was performed and no school were found, display a message -->
    @if ($schoolDetails->isEmpty())
        <div class="alert alert-danger">
            <ul>
                <li>There are no schools with this name.</li>
            </ul>
        </div>
    @endif

    <!-- Show All school Button and Add Details -->
    <div class="row mt-3">
        <div class="col">
            <div class="d-flex justify-content-between">
                <!-- Button Add Details -->
                <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    Add Details
                </button>
                <a href="{{ route('all-schools') }}" class="btn btn-primary">Show All schools</a>
            </div>
        </div>
    </div>

    <!-- Validate request data for createschoolsDetails -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif 

    <!-- Modal in Add Details button -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-success" id="staticBackdropLabel">Add Details</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form action="{{ route('create-school-details') }}" method="post">
                @csrf
                        <div class="row">
                            <div class="col">
                                <label for="schools" class="text-dark">Select school</label>
                                <select class="form-select" id="schools" name="schoolID">
                                    @foreach($schools as $school)
                                        <option value="{{$school->id}}" class="text-dark">{{$school->schoolsName}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <label for="schoolsName" class="text-dark">School Name</label>
                                <input type="text" id="schoolsName" class="form-control" name="schoolsName" required>
                            </div>
                            <div class="col">
                                <label for="office" class="text-dark">Office</label>
                                <input type="text" id="office" class="form-control" name="office" required>
                            </div>
                            <div class="col">
                                <label for="studyStage" class="text-dark">Study Stage</label>
                                <input type="text" id="studyStage" class="form-control" name="studyStage" required>
                            </div>
                            <div class="col">
                                <label for="buildingType" class="text-dark">Building Type</label>
                                <input type="text" id="buildingType" class="form-control" name="buildingType" required>
                            </div>
                            <div class="col">
                                <label for="labType" class="text-dark">Lab Type</label>
                                <input type="text" id="labType" class="form-control" name="labType" required>
                            </div>
                            <div class="col">
                                <label for="schoolID" class="text-dark">School ID</label>
                                <input type="number" id="schoolID" class="form-control" name="schoolID">
                            </div>
                            <div class="col">
                                <label for="ministryNumber" class="text-dark">Ministry Number</label>
                                <input type="number" id="ministryNumber" class="form-control" name="ministryNumber">
                            </div>
                            <div class="col">
                                <label for="principalName" class="text-dark">Principal Name</label>
                                <input type="text" id="principalName" class="form-control" name="principalName">
                            </div>
                            <div class="col">
                                <label for="gender" class="text-dark">Gender</label>
                                <input type="text" id="gender" class="form-control" name="gender">
                            </div>
                            <div class="col">
                                <label for="studentCount" class="text-dark">Student Count</label>
                                <input type="number" id="studentCount" class="form-control" name="studentCount">
                            </div>
                            <div class="col">
                                <label for="classroomCount" class="text-dark">Classroom Count</label>
                                <input type="number" id="classroomCount" class="form-control" name="classroomCount">
                            </div>
                            <div class="col">
                                <label for="labCategory" class="text-dark">Lab Category</label>
                                <input type="text" id="labCategory" class="form-control" name="labCategory">
                            </div>
                            <div class="col">
                                <label for="installationDate" class="text-dark">Installation Date</label>
                                <input type="date" id="installationDate" class="form-control" name="installationDate">
                            </div>
                            <!-- save and cancel -->
                            <button type="submit" class="btn btn-success mt-3">Save</button>
                            <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5">
    <div class="row text-dark">
        <div class="col">
            <div class="card">
                <div class="card-header bg-light">
                    Total schools: {{ count($schools) }}
                </div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th scope="col">School ID</th>
                                <th scope="col">School Name</th>
                                <th scope="col">Office</th>
                                <th scope="col">Study Stage</th>
                                <th scope="col">Building Type</th>
                                <th scope="col">Lab Type</th>
                                <th scope="col">Ministry Number</th>
                                <th scope="col">Principal Name</th>
                                <th scope="col">Gender</th>
                                <th scope="col">Student Count</th>
                                <th scope="col">Classroom Count</th>
                                <th scope="col">Lab Category</th>
                                <th scope="col">Installation Date</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($schools as $school)
        @php
            $schoolDetail = $schoolDetails->where('School_ID', $school->id)->first();
        @endphp
        <tr>
            <th scope="row" class="text-dark">{{ $school->id }}</th>
            <td class="text-dark">{{ $school->schoolsName }}</td>
            <td class="text-dark">{{ $schoolDetail ? $schoolDetail->Office : 'N/A' }}</td>
            <td class="text-dark">{{ $schoolDetail ? $schoolDetail->Study_Stage : 'N/A' }}</td>
            <td class="text-dark">{{ $schoolDetail ? $schoolDetail->Building_Type : 'N/A' }}</td>
            <td class="text-dark">{{ $schoolDetail ? $schoolDetail->Lab_Type : 'N/A' }}</td>
            <td class="text-dark">{{ $schoolDetail ? $schoolDetail->Ministry_Number : 'N/A' }}</td>
            <td class="text-dark">{{ $schoolDetail ? $schoolDetail->Principal_Name : 'N/A' }}</td>
            <td class="text-dark">{{ $schoolDetail ? $schoolDetail->Gender : 'N/A' }}</td>
            <td class="text-dark">{{ $schoolDetail ? $schoolDetail->Student_Count : 'N/A' }}</td>
            <td class="text-dark">{{ $schoolDetail ? $schoolDetail->Classroom_Count : 'N/A' }}</td>
            <td class="text-dark">{{ $schoolDetail ? $schoolDetail->Lab_Category : 'N/A' }}</td>
            <td class="text-dark">{{ $schoolDetail ? $schoolDetail->Installation_Date : 'N/A' }}</td>
            <td class="d-flex">
                                    <!-- Debugging output to ensure school details are retrieved correctly -->
                                   <!-- <td class="text-dark">{{ $schoolDetail ? json_encode($schoolDetail) : 'No details found' }}</td>-->
                                    <td class="d-flex">
                                        <a href="{{ route('edit-school-details-form', ['id' => $school->id]) }}" class="btn btn-success mr-2"><i class="bi bi-pencil-square"></i> Edit</a>
                                        <form action="{{ route('delete-school', ['id' => $school->id]) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash3"></i> Delete</button>
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