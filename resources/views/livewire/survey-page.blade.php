<div>
    <div class=" p-4 space-y-4">
        <h1 class="text-2xl font-semibold text-center">Fill the form below</h1>
        <form wire:submit='submitSurvey' class="grid grid-cols-1">
            <ol class="space-y-8 list-outside list-decimal">
                <li>
                    <div class="space-y-2">
                        <label for="" class="w-full">What specific banking services do you believe are lacking in
                            your
                            area?</label>
                        <input type="text" wire:model='service_lacking' placeholder="write your answer here"
                            class="p-2 block w-full rounded-sm border-black max-w-[500px] border-b-2">
                    </div>
                </li>
                <li>
                    <div class="space-y-2">
                        <label for="" class="w-full">Do you feel like there is an need for additional banking
                            services in your coomunity?</label>

                        @foreach (['yes', 'no', 'maybe'] as $item)
                            <fieldset>
                                <input wire:model.live='additional_banking_service' id="{{ $item }}"
                                    type="radio" class="p-1">
                                <label for="{{ $item }}" class="capitalize">{{ $item }}</label>
                            </fieldset>
                        @endforeach
                    </div>
                </li>
                <li></li>
                <li></li>
                <li></li>
            </ol>
        </form>
    </div>
</div>
