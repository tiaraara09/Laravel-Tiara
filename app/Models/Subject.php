<?php
// app/Models/Subject.php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Subject extends Model
{
use HasFactory;
    protected $fillable = ['name', 'sks'];
// Relationship: Many Subjects belong to many Students
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}