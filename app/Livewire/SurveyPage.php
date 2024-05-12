<?php

namespace App\Livewire;

use App\Models\State;
use App\Models\Survey;
use Livewire\Attributes\Layout;
use Livewire\Component;

class SurveyPage extends Component
{
    public State $state;
    public $user_id, $service_lacking, $additional_banking_service;


    function submitSurvey()
    {
        $data = $this->validate([
            'user_id' => ['required'],
            'service_lacking' => 'required',
            'additional_banking_service' => 'required'
        ]);


        $done = Survey::create($data);

        if ($done) {
            $this->reset();
            session()->flash('success', 'Survey submitted successfully');
        }
    }
    #[Layout('layouts.blank')]
    public function render()
    {
        return view('livewire.survey-page');
    }
}
