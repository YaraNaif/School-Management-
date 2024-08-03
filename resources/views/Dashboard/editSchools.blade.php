@extends('layouts.app')

@section('content')
    <h1>Edit school</h1>

    <form method="POST" action="{{ route('edit-school', ['id' => $school->id]) }}">
        @csrf
        @method('POST')

        <div class="card text-center">
  <div class="card-header">
    
  </div>
  <div class="card-body">
    <h5 class="card-title">Enter School Name After Edit</h5>
    <form method="POST" action="{{ route('edit-school', ['id' => $school->id]) }}">
      @csrf
      @method('POST')
      
      <div class="form-group">
       
        <input type="text" id="schoolsName" name="schoolsName" value="{{ $school->schoolsName }}" class="form-control">
      </div>
      
      <button type="submit" class="btn btn-outline-info mt-3">Save</button>
      <a href="{{ route('get-schools') }}" class="btn btn-outline-primary mt-3">Back to Schools Page</a>
    </form>
  </div>
  <div class="card-footer text-muted">
    
    <div class="alert alert-primary mt-3" role="alert">
    write school name in Arabic letters only!
    </div>
  </div>
</div>

    
@endsection