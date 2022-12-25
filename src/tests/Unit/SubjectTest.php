<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use App\Models\Subject;

class SubjectTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */

    public function test_that_true_is_true()
    {
        $this->assertTrue(true);
    }
    // public function test_get_subjects()
    // {
    //     $subject = Subject::factory()->create();
   
    //     $result = $subject->get_subjects(0);
    //     $this->assertSame([
    //         0,
    //         2025,
    //         2,
    //         56,
    //     ], [
    //         $result[0]->type,
    //         $result[0]->year,
    //         $result[0]->harf_div,
    //         $result[0]->number,
    //     ]);
    // }
}
