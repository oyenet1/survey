<?php

namespace App\Livewire;

use App\Models\State;
use App\Models\Survey;
use Livewire\Component;
use Filament\Forms\Form;
use Livewire\Attributes\Layout;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Section;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Concerns\InteractsWithForms;

class SurveyPage extends Component implements HasForms
{
    use InteractsWithForms;

    public ?array $data = [];

    public State $state;
    public $user_id;


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
                Wizard::make([
                    Wizard\Step::make('Step 1')
                        ->completedIcon('heroicon-m-hand-thumb-up')
                        ->schema([
                            Select::make('age_range')
                                ->options([
                                    '18 - 25',
                                    '25 - 30',
                                    '31 - 39',
                                    '40 - 49',
                                    '50 - 60',
                                    '61 and above'
                                ])
                                ->label('How old are you?')

                                ->required()
                                ->native(false),
                            Select::make('gender')
                                ->options([
                                    'male' => 'Male',
                                    'female' => 'Female'
                                ])
                                ->label('What is your gender?')
                                ->required()
                                ->native(false),
                            Radio::make('marital_status')
                                ->label('Are you married?')
                                ->extraAttributes(['class' => 'focus:text-primary text-primary'])
                                ->boolean()
                                ->inline()
                                // ->inlineLabel(false)
                                ->required(),
                            TextInput::make('wives')
                                ->label('If Yes, how many wives do you have')
                                ->default(null)
                                ->nullable()
                                ->integer(),

                            Select::make('education')
                                ->label('What is your highest level of education?')
                                ->options([
                                    'primary education' => 'Primary Education',
                                    'secondary education' => 'Secondary Education',
                                    'tertiary education' => 'Tertiary Education',
                                    'illiterate' => 'Illiterate'
                                ])
                                ->required()
                                ->native(false),

                            Select::make('occupation')
                                ->label('Where do you work?')
                                ->options([
                                    'government' => 'Government',
                                    'private organisation' => 'Private Organisation',
                                    'self employed' => 'Self Employed'
                                ])->required()
                                ->native(false),
                            Select::make('monthly_income_range')
                                ->options([
                                    'below 20000' => 'Below 20,000 NGN',
                                    '20000 - 50000' => '20,000 - 50,000 NGN',
                                    '50000 - 100000' => '50,000 - 100,000 NGN',
                                    '10000 - 200000' => '100,000 - 200,000 NGN',
                                    'above 200000' => 'Above 200,000 NGN'
                                ])
                                ->label('What is your approximate monthly income?')
                                ->native(false)
                                ->required(),
                            Radio::make('have_a_savings')
                                ->label('Do you currently have any savings?')
                                ->extraAttributes(['class' => 'focus:text-primary text-primary'])
                                ->boolean()
                                ->required()
                                ->inline()
                                ->inlineLabel(false),

                        ])->columns(2),
                    Wizard\Step::make('Step 2')
                        ->completedIcon('heroicon-m-hand-thumb-up')
                        ->schema([
                            Radio::make('have_bank')
                                ->label('Do you have a bank account?')
                                ->extraAttributes(['class' => 'focus:text-primary text-primary'])
                                ->boolean()
                                ->columnSpanFull()
                                ->inline()
                                ->required(),
                            Textarea::make('no_bank_account_reasons')
                                ->label('If No, what are the reasons for not having a bank account?')
                                ->autosize()
                                ->columnSpanFull()
                                ->nullable(),
                            TagsInput::make('services')
                                ->label('What banking services are you using? (e.g savings,loans,insurance,investments)')
                                ->suggestions([
                                    'savings',
                                    'loans',
                                    'insurance',
                                    'investments',
                                ])
                                ->splitKeys(['Tab', ' ', ","])
                                ->required(),
                            Radio::make('has_borrowed_before')
                                ->label('Have you ever borrowed money?')
                                ->extraAttributes(['class' => 'focus:text-primary text-primary'])
                                ->boolean()
                                ->inline()
                                ->inlineLabel(false)
                                ->required(),
                            TagsInput::make('lenders')
                                ->label('From which source did you typically borrow money from? (banks,microfinance institutions,informal lenders,friends/family)')
                                ->suggestions([
                                    'banks',
                                    'microfinance institutions',
                                    'informal lenders',
                                    'friends/family',
                                ])->columnSpanFull()
                                ->splitKeys(['Tab', ' ', ","])
                                ->required(),
                            Radio::make('own_mobile_phone')
                                ->label('Do you own mobile phone?')
                                ->extraAttributes(['class' => 'focus:text-primary text-primary'])
                                ->boolean()
                                ->inline()
                                ->inlineLabel(false)
                                ->required(),
                            Select::make('phone_type')
                                ->options([
                                    'feature' => 'Feature Phone',
                                    'smartphone' => 'Smart Phone'
                                ])

                                ->label('What type of mobile phone did you use?')
                                ->native(false)
                                ->required(),
                            Radio::make('use_phone')
                                ->label('Do you conduct banking transactions using your mobile phone?')
                                ->extraAttributes(['class' => 'focus:text-primary text-primary'])
                                ->boolean()
                                // ->inline()
                                ->inlineLabel(false)
                                ->columnSpanFull()
                                ->required(),
                        ])->columns(2),
                    Wizard\Step::make('Step 3')
                        ->completedIcon('heroicon-m-hand-thumb-up')
                        ->schema([

                            Radio::make('feel_safe')
                                ->label('Do you feel safe visiting a bank to carry out transactions?')
                                ->extraAttributes(['class' => 'focus:text-primary text-primary'])
                                ->boolean()
                                ->inline()
                                ->inlineLabel(false)
                                ->columnSpanFull()
                                ->required(),
                            CheckboxList::make('payment_methods')
                                ->label('How do you typically pay for purchases')
                                ->options([
                                    'cash' => 'Cash',
                                    'pos' => "Pos",
                                    'debit card' => "Debit Card",
                                    'bank transfer' => "Bank Transfer"
                                ])
                                //   ->options([
                                //     'cash',
                                //     'pos',
                                //     'debit-card',
                                //     'bank-transfer'
                                // ])
                                ->extraAttributes(['class' => 'capitalize'])
                                ->required()
                                ->columnSpanFull(),

                            Radio::make('affected_by_insecurity')
                                ->label('Does insecurity affect your daily work life?')
                                ->extraAttributes(['class' => 'focus:text-primary text-primary'])
                                ->boolean()
                                ->inline()
                                ->inlineLabel(false)
                                ->required(),
                            Textarea::make('insecurity_details')
                                ->label('How does insecurity in your area affect your banking or payment activities?')
                                ->autosize()
                                ->columnSpanFull()
                                ->required(),
                            Radio::make('use_fintech')
                                ->label('Do you have an account with any fintech platforms?')
                                // 1.	Which fintech brands are you subscribed to? (Check all that apply)
                                ->boolean()
                                ->inline()
                                ->inLinelabel(false)
                                ->columnSpanFull()
                                ->required(),
                            TagsInput::make('fintechs')
                                ->label('Which fintech brands are you subscribed to? (Check all that apply)')
                                ->suggestions([
                                    'OPay', 'Monie Point', 'Flutterwave', 'Interswitch', 'Paystack',
                                ])
                                ->splitKeys(['Tab', ' ', ","])
                                ->required(),
                            Select::make('saving_methods')
                                ->options([
                                    'Under your pillow' => 'Under your pillow',
                                    'With a bank' => 'With a bank',
                                    'With a fintech platform' => 'With a fintech platform',
                                    'With a local savings group' => 'With a local savings group',
                                    'With a co-operative society' => 'With a co-operative society',
                                    'Other' => 'Other'
                                ])
                                ->label('How do you save money?')
                                ->native(false)
                                ->required(),
                            Radio::make('pays_interest_on_loan')
                                ->label('Do you pay interest on money you borrow?')
                                ->boolean()
                                ->inline()
                                ->inLineLabel(false)
                                ->required(),
                            Radio::make('happy_to_pay_interest')
                                ->label('Would you be happy to pay interest on money you borrow?')
                                ->boolean()
                                ->inline()
                                ->inLineLabel(false)
                                ->required(),
                        ])->columns(2)
                ])
                    ->submitAction(new HtmlString('<button type="submit"
                        class="px-6 py-2 mx-auto my-3 font-medium text-white rounded bg-primary hover:bg-secondary hover:text-black max-w-max">Submit</button>'))
                    ->columnSpanFull(),

            ])->columns(2)
            ->statePath('data');
    }


    public function mount(): void
    {
        $this->form->fill();
    }


    public function create()
    {
        $done = $this->state->surveys()->create($this->form->getState());

        if ($done) {
            Notification::make()
                ->title('Submitted')
                ->body('Survey submitted successfully')
                ->success()
                ->send();
        }
    }


    #[Layout('layouts.blank')]
    public function render()
    {
        return view('livewire.survey-page');
    }
}
