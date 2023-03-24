<?php

namespace App\Transformers;

use App\Models\User;
use App\Models\Clinic;
use League\Fractal\TransformerAbstract;

class ClinicQuestionsTransform extends TransformerAbstract
{
    protected  array $availableIncludes = ['choices','answers'];

    // protected array $defaultIncludes = [

    // ];

    public function transform(Clinic $clinic)
    {
        return [
            'id' => $clinic->id,
            'question' => $clinic->question,
            'is_editable' => $clinic->is_editable,
            'status' => $clinic->status,
            'tag' => $clinic->tag,
            'order' => $clinic->order,
            'frequency' => $clinic->frequency,
            'answer_type' => $clinic->answer_type,
        ];
    }

    public function includeChoices(Clinic $clinic)
    {
        return $this->primitive($clinic, function ($clinic) {
            return $clinic->choices;
        });
    }
    public function includeAnswers(Clinic $clinic)
    {
        return $this->collection($clinic->answers, new ClinicAnswerTransform());
    }


}