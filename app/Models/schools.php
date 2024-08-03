<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/*class schools extends Model
{
    use HasFactory;

    protected $fillable = ['schoolsName'];
}*/
class Schools extends Model
{
    use HasFactory;

    protected $fillable = ['schoolsName'];

    public function schoolDetails()
    {
        return $this->hasMany(SchoolsDetails::class, 'School_ID');
    }

    /*public function details()
    {
        return $this->hasOne(SchoolsDetails::class, 'School_ID');
    }*/
}