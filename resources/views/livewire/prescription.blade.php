<div class="flex-auto px-4 lg:px-10n py-10 pt-0">
    @if(session('success'))
    <div id="successMessage" class="text-sm bg-green-200 text-center px-6 py-3 mb-4 message-success">
        <p class="mb-2">{{ session('success') }}</p>
    </div>
    @endif
    <form wire:submit.prevent="consulter" name="form">
        <div class="relative w-full mb-3">
            <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                Selectionner une consultation
            </label>
            <select class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" wire:model="hopital" name="hopital">
                @if (!empty($consultations) && count($consultations) > 0)
                <option class="text-black" value=""></option>
                @foreach ($consultations as $consultation)
                <option class="text-black" value="{{ $consultation->id }}">{{ $consultation->diagnostic }}</option>
                @endforeach
                @else
                <option>Aucune consultation disponible</option>
                @endif
            </select>


            @if ($errors->has('$consultation'))
            <span class="text-red-500 text-sm">{{$errors->first('$consultation')}}</span>
            @endif
        </div>
        <div class="flex flex-wrap">
            <div class="w-full px-4c">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Medicaments prescrit
                    </label>
                    <textarea name="prescription" id="prescription" wire:model="prescription" rows="5" class="border-0 px-3 py-3 bg-gray-200 dark:text-blue-800 font-bold rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" style="resize:none"></textarea>
                    @if ($errors->has('prescription'))
                    <span class="text-red-500 text-sm">{{$errors->first('prescription')}}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="flex flex-wrap">
            <div class="w-full px-4c">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Note sur la posologie
                    </label>
                    <textarea name="posologie" id="posologie" wire:model="posologie" rows="5" class="border-0 px-3 py-3 bg-gray-200 dark:text-blue-800 font-bold rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" style="resize:none"></textarea>
                    @if ($errors->has('posologie'))
                    <span class="text-red-500 text-sm">{{$errors->first('posologie')}}</span>
                    @endif
                </div>
            </div>
        </div>
        <button id="modalAdd" title="enregistrer un nouvel emploiyé" @click="open = open" class="mt-6 inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Enregistrer
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </button>
    </form>
</div>