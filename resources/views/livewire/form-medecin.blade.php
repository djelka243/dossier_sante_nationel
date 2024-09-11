<div class="flex-auto px-4 lg:px-10 py-10 pt-0">
@if(session('success'))
    <div id="successMessage" class="text-sm bg-green-200 text-center px-6 py-3 mb-4 message-success">
        <p class="mb-2">{{ session('success') }}</p>
        <p>Matricule : <i class="text-blue-500 font-extrabold">{{ session('matricule') }}</i> </p>
        <p>mot de passe : <i class="text-blue-500 font-extrabold">{{ session('password') }} </i></p>
    </div>
    @endif
    <form wire:submit.prevent="submit" name="form">
        <div class="flex flex-wrap">
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Nom
                    </label>
                    <input type="text" wire:model="nom" name="nom" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                    @if ($errors->has('nom'))
                    <span class="text-red-500 text-sm">{{$errors->first('nom')}}</span>
                    @endif
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Postnom
                    </label>
                    <input type="text" wire:model="postnom" name="postnom" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                    @if ($errors->has('postnom'))
                    <span class="text-red-500 text-sm">{{$errors->first('postnom')}}</span>
                    @endif
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Prenom
                    </label>
                    <input type="text" wire:model="prenom" name="prenom" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                    @if ($errors->has('prenom'))
                    <span class="text-red-500 text-sm">{{$errors->first('prenom')}}</span>
                    @endif
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Date de naissance
                    </label>
                    <input type="date" wire:model="date" name="date" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                    @if ($errors->has('date'))
                    <span class="text-red-500 text-sm">{{$errors->first('date')}}</span>
                    @endif
                </div>
            </div>

            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Genre
                    </label>
                    <input type="text" wire:model="genre" name="genre" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                    @if ($errors->has('genre'))
                    <span class="text-red-500 text-sm">{{$errors->first('genre')}}</span>
                    @endif
                </div>
            </div>
        </div>


        <div class="flex flex-wrap">
            <div class="w-full lg:w-12/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Choisir un hopital d'affiliation
                    </label>
                    <select class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" wire:model="hopital" name="hopital">
                        @if (count($hopitaux) > 0)
                        <option class="text-black" value=""></option>
                        @foreach ($hopitaux as $hopital)
                        <option class="text-black" value="{{ $hopital->id }}">{{ $hopital->nom }}</option>
                        @endforeach
                        @else
                        <option>Aucune hopital disponible</option>
                        @endif
                    </select>

                    @if ($errors->has('hopital'))
                    <span class="text-red-500 text-sm">{{$errors->first('hopital')}}</span>
                    @endif
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Matricule
                    </label>
                    <input type="text" wire:model="matricule" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                    @if ($errors->has('matricule'))
                    <span class="text-red-500 text-sm">{{$errors->first('matricule')}}</span>
                    @endif
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Specialité
                    </label>
                    <input type="text" wire:model="specialite" class="border-0 px-3 py-3 bg-white rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                    @if ($errors->has('specialite'))
                    <span class="text-red-500 text-sm">{{$errors->first('specialite')}}</span>
                    @endif
                </div>
            </div>

        </div>
        <hr class="mt-6 border-b-1 border-blueGray-300 mb-6">
        <button id="modalAdd" title="enregistrer un nouvel emploiyé" @click="open = open" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Enregistrer
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </button>
    </form>
</div>