@extends('layouts.app')

@section('content')
    <h1>Edit School Details </h1>
    <div class="row">
    <div class="col-md-20 p-5 border rounded"> 
    <form action="{{ $schoolDetails ? route('edit-school-details-form', ['id' => $schoolDetails->id]) : '#' }}" method="POST"> 
   <!-- <form method="POST" action="{{ route('edit-school-details', ['id' => $schoolDetails->id]) }}">-->
   
    @csrf
    <!--  fields schoolName -->
  
   

<div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
<form method="POST" action="{{ route('edit-school-details', ['id' => $schoolDetails->id]) }}">    @csrf
    @method('POST')

    <div id="schoolName" class="form-group">
      <label for="schoolsName">School Name</label>
      <input type="text" id="schoolsName" name="schoolsName" value="{{ $schoolDetails ? $schoolDetails->schoolsName : '' }}" required class="form-control">
    </div>

    <div id="office" class="form-group">
      <label for="office">Office</label>
      <input type="text" id="office" name="office" value="{{ $schoolDetails ? $schoolDetails->office : '' }}" required class="form-control">
    </div>

    <div id="studyStage" class="form-group">
      <label for="studyStage">Study Stage</label>
      <input type="text" id="studyStage" name="studyStage" value="{{ $schoolDetails ? $schoolDetails->studyStage : '' }}" required class="form-control">
    </div>

    <div id="buildingType" class="form-group">
      <label for="buildingType">Building Type</label>
      <input type="text" id="buildingType" name="buildingType" value="{{ $schoolDetails ? $schoolDetails->buildingType : '' }}" required class="form-control">
    </div>

    <div id="labType" class="form-group">
      <label for="labType">Lab Type</label>
      <input type="text" id="labType" name="labType" value="{{ $schoolDetails ? $schoolDetails->labType : '' }}" required class="form-control">
    </div>

    <div id="schoolID" class="form-group">
      <label for="schoolID">School ID</label>
      <input type="text" id="schoolID" name="schoolID" value="{{ $schoolDetails ? $schoolDetails->schoolID : '' }}" class="form-control">
    </div>

    <div id="ministryNumber" class="form-group">
      <label for="ministryNumber">Ministry Number</label>
      <input type="text" id="ministryNumber" name="ministryNumber" value="{{ $schoolDetails ? $schoolDetails->ministryNumber : '' }}" class="form-control">
    </div>

    <div id="principalName" class="form-group">
      <label for="principalName">Principal Name</label>
      <input type="text" id="principalName" name="principalName" value="{{ $schoolDetails ? $schoolDetails->principalName : '' }}" class="form-control">
    </div>

    <div id="gender" class="form-group">
      <label for="gender">Gender</label>
      <input type="text" id="gender" name="gender" value="{{ $schoolDetails ? $schoolDetails->gender : '' }}" class="form-control">
    </div>

    <div id="studentCount" class="form-group">
      <label for="studentCount">Student Count</label>
      <input type="number" id="studentCount" name="studentCount" value="{{ $schoolDetails ? $schoolDetails->studentCount : '' }}" class="form-control">
    </div>

    <div id="classroomCount" class="form-group">
      <label for="classroomCount">Classroom Count</label>
      <input type="number" id="classroomCount" name="classroomCount" value="{{ $schoolDetails ? $schoolDetails->classroomCount : '' }}" class="form-control">
    </div>

    <div id="labCategory" class="form-group">
      <label for="labCategory">Lab Category</label>
      <input type="text" id="labCategory" name="labCategory" value="{{ $schoolDetails ? $schoolDetails->labCategory : '' }}" class="form-control">
    </div>

    <div id="installationDate" class="form-group">
      <label for="installationDate">Installation Date</label>
      <input type="date" id="installationDate" name="installationDate" value="{{ $schoolDetails ? $schoolDetails->installationDate : '' }}" class="form-control">
    </div>

    <button type="submit" class="btn btn-outline-info mt-3">Save Changes</button>
    <a href="{{ route('all-schools') }}" class="btn btn-primary mt-3">Back to Schools Details Page</a>
  </form>
</div>


</form>

@endsection