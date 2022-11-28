<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;

    public function getSubjects(string $type = '')
    {
        $query = DB::table('subjects')
            ->select('*');
        if ($type != '') {
            $query->where('type', $type);
        }
        $subjects = $query->orderByDesc('subjects.year')->get();
        return $subjects;
    }

    public function getSubjectsForValidation($type, $year, $harf_div)
    {
        $count = DB::table('subjects')
            ->where('type', $type)
            ->where('year', $year)
            ->where('harf_div', $harf_div)
            ->count();
        return $count;
    }

    public function insertSubject($type, $name, $year, $number, $harfDiv)
    {
        DB::table('subjects')->insert([
            'type' => $type,
            'name' => $name,
            'year' => $year,
            'number' => $number,
            'harf_div' => $harfDiv
        ]);
        return;
    }

    public function deleteSubject($id)
    {
        DB::table('subjects')->where('id', $id)->delete();
        return;
    }
}
