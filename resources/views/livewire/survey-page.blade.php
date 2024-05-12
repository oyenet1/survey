<div>
    <div class=" p-4 space-y-4">
        <h1 class="text-2xl font-semibold text-center">Fill the form below</h1>
        <form wire:submit='submitSurvey' class="grid grid-cols-1">
            <ol class="space-y-8 list-outside list-decimal">
                <li>
                    <div class="space-y-2">
                        <label for="enum" class="w-full">Select Enumerator</label>
                        <select name="" wire:model='user_id' id="enum"
                            class="px-4 py-2 block w-full max-w-[500px] border capitalize rounded">
                            @foreach (\App\Models\User::with(['lga.state'])->get() as $enumerator)
                                <option value="{{ $enumerator->id }}">
                                    {{ $enumerator->name . ' lga-' . $enumerator->lga->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </li>
                <li>
                    <div class="space-y-2">
                        <label for="" class="w-full">What specific banking services do you believe are lacking
                            in
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
                        <fieldset class="cursor-pointer flex flex-col">
                            @foreach (['yes', 'no', 'maybe'] as $index => $item)
                                <div class="space-x-2">
                                    <input wire:model.live='additional_banking_service' id="{{ $index }}"
                                        type="radio" value="{{ $item }}" class="p-1 cursor-pointer">
                                    <label for="{{ $index }}"
                                        class="capitalize cursor-pointer">{{ $item }}</label>
                                </div>
                            @endforeach
                        </fieldset>
                    </div>
                </li>
            </ol>
            <button class="px-6 py-2 my-3 bg-blue-500 text-white rounded max-w-max mx-auto font-medium">Submit</button>
        </form>
    </div>
</div>
