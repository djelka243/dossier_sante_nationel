<div class="flex-auto px-4 lg:px-10n py-10 pt-0">
    @if(session('success'))
    <div id="successMessage" class="text-sm bg-green-200 text-center px-6 py-3 mb-4 message-success">
        <p class="mb-2">{{ session('success') }}</p>
        <p>identifiant : <i class="text-blue-500 font-extrabold">{{ session('identifier') }}</i> </p>
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
                    <input type="text" wire:model="nom" class="border-0 px-3 py-3 bg-white dark:text-blue-800 font-bold rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
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
                    <input type="text" wire:model="postnom" class="border-0 px-3 py-3 bg-white dark:text-blue-800 font-bold rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
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
                    <input type="text" wire:model="prenom" class="border-0 px-3 py-3 bg-white dark:text-blue-800 font-bold rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
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
                    <input type="date" wire:model="date" class="border-0 px-3 py-3 bg-white dark:text-blue-800 font-bold rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
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
                    <select class="border-0 px-3 py-3 bg-white dark:text-blue-800 font-bold rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" wire:model="genre" name="genre">
                        <option class="text-black" value=""></option>
                        <option class="text-black" value="Masculin">Masculin</option>
                        <option class="text-black" value="Feminin">Féminin</option>
                    </select>
                    @if ($errors->has('genre'))
                    <span class="text-red-500 text-sm">{{$errors->first('genre')}}</span>
                    @endif
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Groupe sanguin
                    </label>
                    <select class="border-0 px-3 py-3 bg-white dark:text-blue-800 font-bold rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" wire:model="groupe" name="groupe">
                        <option class="text-black" value=""></option>
                        <option class="text-black" value="A-">A-</option>
                        <option class="text-black" value="A+">A+</option>
                        <option class="text-black" value="B-">B-</option>
                        <option class="text-black" value="B+">B+</option>
                        <option class="text-black" value="AB-">AB-</option>
                        <option class="text-black" value="AB+">AB+</option>
                        <option class="text-black" value="O-">O-</option>
                        <option class="text-black" value="O+">O+</option>
                    </select>
                    @if ($errors->has('groupe'))
                    <span class="text-red-500 text-sm">{{$errors->first('groupe')}}</span>
                    @endif
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Poids
                    </label>
                    <input type="text" wire:model="poids" class="border-0 px-3 py-3 bg-white dark:text-blue-800 font-bold rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                    @if ($errors->has('poids'))
                    <span class="text-red-500 text-sm">{{$errors->first('poids')}}</span>
                    @endif
                </div>
            </div>
            <div class="w-full lg:w-6/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Taille <i class="lowercase normal-case">(en cm)</i>
                    </label>
                    <input type="text" wire:model="taille" class="border-0 px-3 py-3 bg-white dark:text-blue-800 font-bold rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150">
                    @if ($errors->has('taille'))
                    <span class="text-red-500 text-sm">{{$errors->first('taille')}}</span>
                    @endif
                </div>
            </div>
            <div class="w-full lg:w-12/12 px-4">
                <div class="relative w-full mb-3">
                    <label class="block uppercase dark:text-white text-xs font-bold mb-2">
                        Choisir un hopital d'affiliation
                    </label>
                    <select class="border-0 px-3 py-3 bg-white dark:text-blue-800 font-bold rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" wire:model="hopital" name="hopital">
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
        </div>
        <button id="modalAdd" title="enregistrer un nouvel emploiyé" @click="open = open" class="mt-6 inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Enregistrer
            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white ml-2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
            </svg>
        </button>
    </form>
</div>