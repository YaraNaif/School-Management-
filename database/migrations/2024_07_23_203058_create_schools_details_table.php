<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToSchoolsDetailsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('SchoolsDetails', function (Blueprint $table) { //schools_details
            $table->string('School_ID')->nullable();
            $table->string('schoolsName')->nullable(); //School_Name
            $table->string('Office')->nullable();
            $table->string('Ministry_Number')->nullable();
            $table->string('Principal_Name')->nullable();
            $table->string('Gender')->nullable();
            $table->integer('Student_Count')->nullable();
            $table->integer('Classroom_Count')->nullable();
            $table->string('Lab_Category')->nullable();
            $table->date('Installation_Date')->nullable();
            $table->string('Study_Stage')->nullable();
            $table->string('Building_Type')->nullable();
            $table->string('Lab_Type')->nullable();
            
            $table->foreign('School_ID')->references('id')->on('schools')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('SchoolsDetails', function (Blueprint $table) {
            $table->dropColumn([
                'School_ID',
                'Ministry_Number',
                'Principal_Name',
                'Gender',
                'Student_Count',
                'Classroom_Count',
                'Lab_Category',
                'Installation_Date',
                'schoolsName',
                'Office',
                'Study_Stage',
                'Building_Type',
                'Lab_Type',
            ]);
        });
    }
}

/*public function down(): void
{
    Schema::dropIfExists('SchoolsDetails');
}
}*/


