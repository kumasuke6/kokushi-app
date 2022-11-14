<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    public $timestamps = false;

    public function getSubjects(string $type) {
        $subjects = DB::table('subjects')
            ->select('*')
            ->where('type', $type)
            ->orderByDesc('subjects.year')
            ->get();
        return $subjects;
    }
}
