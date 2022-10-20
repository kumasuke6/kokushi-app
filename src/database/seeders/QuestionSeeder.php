<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

use Carbon\Carbon;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            [
                'subject_id' => 0,
                'question_number' => 1,
                'caption' => '75 歳の女性。誤嚥性肺炎。喀痰培養で MRSA を検出した。マスク、手袋、ガウンを装着し病棟個室で肺理学療法を開始した。感染予防策について正しいのはどれか。',
                'choice1' => 'N 95 マスクを装着する。',
                'choice2' => '個室のドアは開放してはならない。',
                'choice3' => 'ガウンは退室時病室内で脱いで廃棄する。',
                'choice4' => '退室時手袋を装着したままドアノブに触れて開ける。',
                'choice5' => '手袋を装着していれば手指消毒は不要である。',
                'answer'  => 3,
                'explan'  => 'ガウンについた最近を病室外に出してはならない。',
            ],
            [
                'subject_id' => 0,
                'question_number' => 2,
                'caption' => '四肢長計測の起点または終点の指標となるのはどれか。つ選べ。',
                'choice1' => '肩峰の最前端部',
                'choice2' => '上腕骨外側上顆の外側突出部',
                'choice3' => '上前腸骨棘の最上端部',
                'choice4' => '大転子の最上端部',
                'choice5' => '腓骨頭の最上端部',
                'answer'  => 24,
                'explan'  => '正解は24です。',
            ],
            [
                'subject_id' => 0,
                'question_number' => 3,
                'caption' => '75 歳の女性。誤嚥性肺炎。喀痰培養で MRSA を検出した。マスク、手袋、ガウンを装着し病棟個室で肺理学療法を開始した。感染予防策について正しいのはどれか。',
                'choice1' => 'N 95 マスクを装着する。',
                'choice2' => '個室のドアは開放してはならない。',
                'choice3' => 'ガウンは退室時病室内で脱いで廃棄する。',
                'choice4' => '退室時手袋を装着したままドアノブに触れて開ける。',
                'choice5' => '手袋を装着していれば手指消毒は不要である。',
                'answer'  => 3,
                'explan'  => 'ガウンについた最近を病室外に出してはならない。',
            ],
            [
                'subject_id' => 0,
                'question_number' => 4,
                'caption' => '四肢長計測の起点または終点の指標となるのはどれか。つ選べ。',
                'choice1' => '肩峰の最前端部',
                'choice2' => '上腕骨外側上顆の外側突出部',
                'choice3' => '上前腸骨棘の最上端部',
                'choice4' => '大転子の最上端部',
                'choice5' => '腓骨頭の最上端部',
                'answer'  => 24,
                'explan'  => '正解は24です。',
            ],
            [
                'subject_id' => 0,
                'question_number' => 5,
                'caption' => '75 歳の女性。誤嚥性肺炎。喀痰培養で MRSA を検出した。マスク、手袋、ガウンを装着し病棟個室で肺理学療法を開始した。感染予防策について正しいのはどれか。',
                'choice1' => 'N 95 マスクを装着する。',
                'choice2' => '個室のドアは開放してはならない。',
                'choice3' => 'ガウンは退室時病室内で脱いで廃棄する。',
                'choice4' => '退室時手袋を装着したままドアノブに触れて開ける。',
                'choice5' => '手袋を装着していれば手指消毒は不要である。',
                'answer'  => 3,
                'explan'  => 'ガウンについた最近を病室外に出してはならない。',
            ],
            [
                'subject_id' => 0,
                'question_number' => 6,
                'caption' => '四肢長計測の起点または終点の指標となるのはどれか。つ選べ。',
                'choice1' => '肩峰の最前端部',
                'choice2' => '上腕骨外側上顆の外側突出部',
                'choice3' => '上前腸骨棘の最上端部',
                'choice4' => '大転子の最上端部',
                'choice5' => '腓骨頭の最上端部',
                'answer'  => 24,
                'explan'  => '正解は24です。',
            ],
            [
                'subject_id' => 0,
                'question_number' => 7,
                'caption' => '75 歳の女性。誤嚥性肺炎。喀痰培養で MRSA を検出した。マスク、手袋、ガウンを装着し病棟個室で肺理学療法を開始した。感染予防策について正しいのはどれか。',
                'choice1' => 'N 95 マスクを装着する。',
                'choice2' => '個室のドアは開放してはならない。',
                'choice3' => 'ガウンは退室時病室内で脱いで廃棄する。',
                'choice4' => '退室時手袋を装着したままドアノブに触れて開ける。',
                'choice5' => '手袋を装着していれば手指消毒は不要である。',
                'answer'  => 3,
                'explan'  => 'ガウンについた最近を病室外に出してはならない。',
            ],
            [
                'subject_id' => 0,
                'question_number' => 8,
                'caption' => '四肢長計測の起点または終点の指標となるのはどれか。つ選べ。',
                'choice1' => '肩峰の最前端部',
                'choice2' => '上腕骨外側上顆の外側突出部',
                'choice3' => '上前腸骨棘の最上端部',
                'choice4' => '大転子の最上端部',
                'choice5' => '腓骨頭の最上端部',
                'answer'  => 24,
                'explan'  => '正解は24です。',
            ],
            [
                'subject_id' => 0,
                'question_number' => 9,
                'caption' => '75 歳の女性。誤嚥性肺炎。喀痰培養で MRSA を検出した。マスク、手袋、ガウンを装着し病棟個室で肺理学療法を開始した。感染予防策について正しいのはどれか。',
                'choice1' => 'N 95 マスクを装着する。',
                'choice2' => '個室のドアは開放してはならない。',
                'choice3' => 'ガウンは退室時病室内で脱いで廃棄する。',
                'choice4' => '退室時手袋を装着したままドアノブに触れて開ける。',
                'choice5' => '手袋を装着していれば手指消毒は不要である。',
                'answer'  => 3,
                'explan'  => 'ガウンについた最近を病室外に出してはならない。',
            ],
            [
                'subject_id' => 0,
                'question_number' => 10,
                'caption' => '四肢長計測の起点または終点の指標となるのはどれか。つ選べ。',
                'choice1' => '肩峰の最前端部',
                'choice2' => '上腕骨外側上顆の外側突出部',
                'choice3' => '上前腸骨棘の最上端部',
                'choice4' => '大転子の最上端部',
                'choice5' => '腓骨頭の最上端部',
                'answer'  => 24,
                'explan'  => '正解は24です。',
            ],
            [
                'subject_id' => 0,
                'question_number' => 11,
                'caption' => '75 歳の女性。誤嚥性肺炎。喀痰培養で MRSA を検出した。マスク、手袋、ガウンを装着し病棟個室で肺理学療法を開始した。感染予防策について正しいのはどれか。',
                'choice1' => 'N 95 マスクを装着する。',
                'choice2' => '個室のドアは開放してはならない。',
                'choice3' => 'ガウンは退室時病室内で脱いで廃棄する。',
                'choice4' => '退室時手袋を装着したままドアノブに触れて開ける。',
                'choice5' => '手袋を装着していれば手指消毒は不要である。',
                'answer'  => 3,
                'explan'  => 'ガウンについた最近を病室外に出してはならない。',
            ],
            [
                'subject_id' => 0,
                'question_number' => 12,
                'caption' => '四肢長計測の起点または終点の指標となるのはどれか。つ選べ。',
                'choice1' => '肩峰の最前端部',
                'choice2' => '上腕骨外側上顆の外側突出部',
                'choice3' => '上前腸骨棘の最上端部',
                'choice4' => '大転子の最上端部',
                'choice5' => '腓骨頭の最上端部',
                'answer'  => 24,
                'explan'  => '正解は24です。',
            ],
        ];

        $now = Carbon::now();
        foreach ($params as $param){
            $param['created_at'] = $now;
            $param['updated_at'] = $now;
            DB::table('questions')->insert($param);
        }
    }
}
