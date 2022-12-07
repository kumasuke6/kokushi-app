<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Subject extends Model
{
    public $timestamps = false;

    public function getSubjects(?int $type = null)
    {
        $query = DB::table('subjects')
            ->select('*');
        if (!is_null($type)) {
            $query->where('type', $type);
        }
        $subjects = $query->orderByDesc('subjects.year')->get();
        return $subjects;
    }

    public function getSubjectsForCreateSubjectReq(int $type, int $year, int $harf_div)
    {
        $count = DB::table('subjects')
            ->where('type', $type)
            ->where('year', $year)
            ->where('harf_div', $harf_div)
            ->count();
        return $count;
    }

    public function insertSubject(int $type, string $name, int $year, int $number, int $harfDiv)
    {
        DB::table('subjects')->insert([
            'type' => $type,
            'name' => $name,
            'year' => $year,
            'number' => $number,
            'harf_div' => $harfDiv,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        return;
    }

    public function deleteSubject(int $id)
    {
        DB::table('subjects')->where('id', $id)->delete();
        return;
    }
}
