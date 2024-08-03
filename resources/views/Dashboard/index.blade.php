@extends('layouts.base')

@section('content')

<!-- Button trigger modal -->
<div class="container">
<span class="text-dark">{{ Session::get('data') }}</span>
<span class="text-dark">{{ Cookie::get('A') }}</span>

 <!-- Display validation errors  -->
 @if (Session::has('errors'))
    <div class="alert alert-danger">
        <ul>
            @foreach (Session::get('errors')->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row mt-5 ">
<div class="center-card">
  <div class="card w-50 ">
    <div class="card-body d-flex align-items-center text-black">
      <i class="bi bi-person-vcard me-3" style="font-size: 2rem; color: cornflowerblue;"></i>
      <h5 class="card-title mb-0 cornflowerblue-text">Student Information</h5>
    </div>
    <div class="card-body ">
      <p class="text-dark text-left">Name: YARA Naif AL-otaibi.</p>
      <p class="text-dark text-left">Student Number: 443005907.</p>
      <p class="text-dark text-left">Department: Computer Science.</p>
    </div>
  </div>

 
            
        </div>
        <div class="col">
            
        </div>

    </div>
</div>

@endsection