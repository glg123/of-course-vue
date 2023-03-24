<?php

namespace App\Transformers;

use App\Models\User;
use App\Models\Clinic;
use App\Models\ClinicAnswer;
use League\Fractal\TransformerAbstract;

class ClinicAnswerTransform extends TransformerAbstract
{
    protected  array $availableIncludes = [];

    protected array $defaultIncludes = [
        'user','question'
    ];

    public function transform(ClinicAnswer $answer)
    {
        return [
            'id' => $answer->id,
            'answer' => $answer->answer,
            'comment' => $answer->comment,
            'rate' => $answer->rate,
            'created_at' => $answer->created_at->format('Y-m-d H:i')
        ];
    }

    public function includeUser(ClinicAnswer $answer)
    {
        return $this->item($answer->user,new UserTransform());
    }
    public function includeQuestion(ClinicAnswer $answer)
    {
        return $this->item($answer->question,new ClinicQuestionsTransform());
    }


}