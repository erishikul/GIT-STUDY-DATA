<?php

namespace App\Imports;

use App\Models\TestSeries;
use App\Models\TestQuestions;
use App\Models\TestQueOptions;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToCollection;
use Log;


class EducatorTestSeriesQuestionsImport implements ToCollection, WithHeadingRow
{
    public $testId;

    public function __construct($testId)
    {
        $this->testId = $testId;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            try {
                $question = new TestQuestions;
                $question->test_series_id =  $this->testId;
                $question->question =   $row['question'];
                $question->explanation = $row['explanation'];
                $question->question_type = 'Single';
                $question->language = $row['language'];
                $question->is_enable = true;

                $question->save();

                if ($row['option_a'] != null) {
                    $option = new TestQueOptions;
                    $option->question_id = $question->id;
                    $option->option = $row['option_a'];
                    if ($row['correct'] == 'A') {
                        $option->is_correct = '1';
                    }
                    $option->save();
                } else {
                    Log::error("error $question->id for option a");
                    print('\n error in question '  . $question->id);
                    break;
                }
                if ($row['option_b'] != null) {
                    $option = new TestQueOptions;
                    $option->question_id = $question->id;
                    $option->option = $row['option_b'];
                    if ($row['correct'] == 'B') {
                        $option->is_correct = '1';
                    }
                    $option->save();
                } else {
                    Log::error("error $question->id for option b");
                    print('\n error in question '  . $question->id);
                    break;
                }
                if ($row['option_c'] != null) {
                    $option = new TestQueOptions;
                    $option->question_id = $question->id;
                    $option->option = $row['option_c'];
                    if ($row['correct'] == 'C') {
                        $option->is_correct = '1';
                    }
                    $option->save();
                } else {
                    Log::error("error $question->id option c");
                    print('\n error in question '  . $question->id);
                    break;
                }
                if ($row['option_d'] != null) {
                    $option = new TestQueOptions;
                    $option->question_id = $question->id;
                    $option->option = $row['option_d'];
                    if ($row['correct'] == 'D') {
                        $option->is_correct = '1';
                    }
                    $option->save();
                } else {
                    Log::error("error $question->id");
                    print('\n error in question '  . $question->id);
                    break;
                }
                // print('success');
            } catch (\Throwable $th) {
                Log::error("error while generating $th");
                break;
                /// log
            }
        }
        return true;
    }
}
