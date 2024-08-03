<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*class schoolsDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'Office',
        'Study_Stage',
        'Building_Type',
        'Lab_Type',
        'schoolsName',
        'School_ID', 
        'Ministry_Number', 
        'Principal_Name', 
        'Gender', 
        'Student_Count', 
        'Classroom_Count', 
        'Lab_Category', 
        'Installation_Date', 
    ];

    public function schools()
    {
        return $this->belongsTo(schools::class, 'school_id', 'id','schoolsName');
    }


}*/
class SchoolsDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'schoolsName', 'School_ID', 'Office', 'Ministry_Number', 'Principal_Name', 'Gender', 'Student_Count', 
        'Classroom_Count', 'Lab_Category', 'Installation_Date', 'Building_Type', 'Study_Stage', 'Lab_Type'
    ];

    public function school()
    {
        return $this->belongsTo(Schools::class, 'School_ID');
    }
}
