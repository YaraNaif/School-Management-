<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\schools;
use App\Models\schoolsDetails;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Validator;

class Dashboard extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }

    
// Method to handle the creation of a new school
public function store(Request $request)
{
    // Validate the request data
    $request->validate([
        
        // other validation rules for your fields
            'schoolsName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
             'office' => 'required|string|max:255',
             'studyStage' => 'required|string|max:255',
             'buildingType' => 'required|string|max:255',
             'labType' => 'required|string|max:255',
             'schoolID' => 'nullable|string|max:255',
             'ministryNumber' => 'nullable|string|max:255',
             'principalName' => 'nullable|string|max:255',
             'gender' => 'nullable|string|max:255',
             'studentCount' => 'nullable|integer',
             'classroomCount' => 'nullable|integer',
             'labCategory' => 'nullable|string|max:255',
             'installationDate' => 'nullable|date',
    ]);

     // Check incoming request data
     dd($request->all());

    // Create a new school
    $school = new schools();
    $school->name = $request->schoolsName;  //schoolName
    // set other fields
    $school->save();

   // Check saved school data
   dd($school);

    // Redirect back to the school listing page with a success message
    return redirect()->route('schools.store ')->with('success', 'School added successfully!');
} 



    // Dashboard Index
    public function index(Request $request)
    {
        // Set session variable
        Session::put('data', 'Welcome this is Session');
        Cookie::queue('A', 'Here my cookie', 60);
        
        // Fetch the currently logged-in user's email address
        $userEmail = $request->user()->email;
        
        // Pass the session data and user email to the view
        return view('Dashboard.index', ['data' => Session::get('data'), 'userEmail' => $userEmail]);
        
    }



    // Create Schools
    public function createSchool(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'schoolsName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
        ], [
            'schoolsName.alpha' => 'The school name must be a string of alphabetic characters.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $school = new schools();
        $school->schoolsName = $request->schoolsName;
        $school->save();

       // return redirect()->route
        return redirect()->route('get-schools')->with('success', 'School added successfully!');
     
    }

    // Get Schools
    public function getSchools(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        if ($searchTerm) {
            $schools = schools::where('schoolsName', 'like', '%' . $searchTerm . '%')->get();
        } else {
            $schools = schools::all();
        }
        return view('Dashboard.Schools', compact('schools'));

    }

    
    public function allSchools()
{
    $schools = schools::all();
    $schoolDetails = schoolsDetails::all();
    return view('Dashboard.SchoolsDetails', compact('schools', 'schoolDetails'));
}

    

    // Edit Schools
    public function editSchool(Request $request, $id)
    {
       // dd($id); // Debug the ID
       // $school = schools::find($id);
        $school = Schools::findOrFail($id);
        $school->schoolsName = $request->input('schoolsName');
        $school->save();
       // return redirect()->route('show-edit-school-form'); // edit-school
        return redirect()->route('show-edit-school-form', ['id' => $id]);
    }

    // Show Edit School Form
    public function showEditSchoolForm($id)
    {
       // dd($id); // Debug the ID
       // $school = schools::find($id);
        $school = Schools::findOrFail($id);
        return view('Dashboard.editSchools', compact('school'));

    }

    // Delete Schools
    public function deleteSchool($id)
    {
        $school = schools::find($id);
        $school->delete();
        return redirect()->route('delete-school'); //all-schools
    }

     
    public function createSchoolDetails(Request $request)
{
    $request->validate([
        'schoolsName' => 'required|regex:/^[\pL\s\-]+$/u|max:255',
             'office' => 'required|string|max:255',
             'studyStage' => 'required|string|max:255',
             'buildingType' => 'required|string|max:255',
             'labType' => 'required|string|max:255',
             'schoolID' => 'nullable|integer',
             'ministryNumber' => 'nullable|string|max:255',
             'principalName' => 'nullable|string|max:255',
             'gender' => 'nullable|string|max:255',
             'studentCount' => 'nullable|integer',
             'classroomCount' => 'nullable|integer',
             'labCategory' => 'nullable|string|max:255',
             'installationDate' => 'nullable|date',
    ]);
    

    $schoolDetails = new SchoolsDetails;
    $schoolDetails->School_ID = $request->schoolID;
    $schoolDetails->schoolsName = $request->schoolsName;
    $schoolDetails->Office = $request->office;
    $schoolDetails->Study_Stage = $request->studyStage;
    $schoolDetails->Building_Type = $request->buildingType;
    $schoolDetails->Lab_Type = $request->labType;
    $schoolDetails->Ministry_Number = $request->ministryNumber;
    $schoolDetails->Principal_Name = $request->principalName;
    $schoolDetails->Gender = $request->gender;
    $schoolDetails->Student_Count = $request->studentCount;
    $schoolDetails->Classroom_Count = $request->classroomCount;
    $schoolDetails->Lab_Category = $request->labCategory;
    $schoolDetails->Installation_Date = $request->installationDate;
    $schoolDetails->save();

    return redirect()->back()->with('success', 'School details added successfully!');
}


     // Get School Details
     public function getSchoolDetails()
     {
         $schools = schools::all();
         $schoolDetails = schoolsDetails::all();
 
         return view('Dashboard.SchoolsDetails', compact('schools', 'schoolDetails'));
        }

    // Edit School Details
   // Edit School Details
   /*public function editSchoolDetails(Request $request, $id)
    {
    $schoolDetail = schoolsDetails::find($id);
    $schoolDetail->update($request->all());
    return redirect()->route('edit-school-details', ['id' => $id])->with('success', 'School details updated successfully!');
    }*/

    public function editSchoolDetails(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'schoolsName' => 'required|string|max:255',
            'office' => 'required|string|max:255',
            'studyStage' => 'required|string|max:255',
            'buildingType' => 'required|string|max:255',
            'labType' => 'required|string|max:255',
            'schoolID' => 'nullable|string|max:255',
            'ministryNumber' => 'nullable|string|max:255',
            'principalName' => 'nullable|string|max:255',
            'gender' => 'nullable|string|max:255',
            'studentCount' => 'nullable|integer',
            'classroomCount' => 'nullable|integer',
            'labCategory' => 'nullable|string|max:255',
            'installationDate' => 'nullable|date',
        ]);
    
        // Find the school details by ID
        $schoolDetails = schoolsDetails::find($id);
        if (!$schoolDetails) {
            return redirect()->back()->with('error', 'School details not found');
        }
    
        // Update the school details
        $schoolDetails->update($validatedData);
    
        return redirect()->route('all-schools')->with('success', 'School details updated successfully');
    }
    






















    
    public function showEditSchoolDetailsForm($id)
{
    $schoolDetails = schoolsDetails::find($id);
    return view('Dashboard.editSchoolsDetails', compact('schoolDetails'));
}


public function showSchoolDetails()
{
    // Retrieve all schools and their details
    $schools = Schools::all();
    $schoolDetails = schoolsDetails::all();

     // Debugging statements
     //dd($schools, $schoolDetails);

    // Pass the data to the view
    return view('Dashboard.SchoolsDetails', compact('schools', 'schoolDetails'));
}




/*
    // Set Locale
    public function setLocale($locale)
    {
        if (!in_array($locale, ['en', 'ar'])) {
            $locale = 'en';
        }

        Session::put('locale', $locale);
        return redirect()->back();
    }*/

    // Test with Two Tables
    public function test()
    {
        $data = DB::table('schools')
                    ->join('school_details', 'schools.id', '=', 'school_details.school_id')
                    ->get();

        return response()->json($data);
    }
}
