<div>
    <div class="p-4 space-y-4 ">
        <h1 class="text-lg font-semibold text-center text-gray-500 capitailize">
            <span>{{ auth()->user()->role == 'admin' ? 'Admin: ' : 'Enumerator: ' }}</span>
            <span>{{ auth()->user()->name }}</span>
        </h1>
        <h1 class="text-2xl font-semibold text-center">Demographic Information</h1>
        <form wire:submit='create'>
            {{ $this->form }}

            {{-- <button type="submit"
                class="px-6 py-2 mx-auto my-3 font-medium text-white rounded bg-primary hover:bg-secondary hover:text-black max-w-max">Submit</button>
         --}}
        </form>
        {{-- <form wire:submit='submitSurvey' class="grid grid-cols-1">
            <ol class="space-y-8 list-decimal list-outside">
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
                        <fieldset class="flex flex-col cursor-pointer">
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
            <button class="px-6 py-2 mx-auto my-3 font-medium text-white bg-blue-500 rounded max-w-max">Submit</button>
        </form> --}}
    </div>

    <x-filament-actions::modals />
</div>
