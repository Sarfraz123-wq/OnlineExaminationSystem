<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;
    protected $table = 'exams';
    protected $primaryKey = 'id';
    public function subjects(){
        return $this->hasMany(Subject::class,'subject_id','subject_id');
    }
}
