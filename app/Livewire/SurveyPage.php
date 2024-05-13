<?php

namespace App\Livewire;

use App\Models\State;
use App\Models\Survey;
use Livewire\Component;
use Filament\Forms\Form;
use Livewire\Attributes\Layout;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;

class SurveyPage extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

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

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')
                    ->required(),
                // MarkdownEditor::make('content'),
                // // ...
            ])
            ->statePath('data');
    }


    public function mount(): void
    {
        $this->form->fill();
    }


    public function create()
    {
    }


    #[Layout('layouts.blank')]
    public function render()
    {
        return view('livewire.survey-page');
    }
}