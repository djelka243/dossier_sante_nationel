<div class="grid grid-cols-3 gap-4 flex text-white justify-between ">


    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="{{route('patients')}}">
            <img class="rounded-t-lg" style="height: 250px; width:fit-content" src="{{asset('assets/infirmetpatient.jpg')}}" alt="" />
        </a>
        <div class="p-5">
            <a href="{{route('patients')}}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Enregistrer un patient</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">créer le dossier médical pour une personne. <b class="text-red-500">Attention</b>, cette action est irréversible. Merci de bien verifier les informations saisis.</p>
            <a href="{{route('patients')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Enregistrer
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>



    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="{{route('hopitaux')}}">
            <img class="rounded-t-lg" style="height: 250px; width:fit-content" src="{{asset('assets/hosto.jpg')}}" alt="" />
        </a>
        <div class="p-5">
            <a href="{{route('hopitaux')}}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Enregistrer un hopital</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Ajouter un nouvel hopital pour une personne. <b class="text-red-500">Attention</b>, cette action n'est pas irréversible tant que l'hopital créé ne pas assigné</p>

            <div x-data="{ open: false }">
                <div class="flex rounded">

                    <button id="modalAdd" title="enregistrer un nouvel emploiyé" @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Nouveau
                        <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white ml-2">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>

                    </button>
                </div>
                <div class="inset-0">
                    <div @keydown.window.escape="open = false" x-show="open" class="fixed inset-0 overflow-y-auto flex items-center justify-center" aria-labelledby="modal-title" x-ref="dialogMission" aria-modal="true" x-cloak>

                        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Background backdrop, show/hide based on modal state." class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>

                        <div class="fixed inset-0 overflow-y-auto">
                            <div class="fixed inset-0 overflow-y-auto">
                                <div class="flex items-end sm:items-center justify-center min-h-full max-sm:min-h-[20rem] max-sm:mt-24 md:p-4 text-center sm:p-0 mt-4">

                                    <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative bg-white dark:bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[52rem] h-[25rem] sm:w-full" @click.away="open = false">
                                        <div class="px-6 py-6 lg:px-8">
                                            <h3 class=" font-medium text-gray-900 dark:text-white md:text-center ">Informations de l'hopital</h3>
                                            <hr class="mt-6 border-b-1 border-blueGray-300">
                                            <div>
                                                @if(session('success'))
                                                <div id="successMessage" class="bg-green-100 p-6 mb-4 message-success">
                                                    {{ session('success') }}
                                                </div>
                                                @endif
                                                <form method="POST" action="{{ route('addHopital') }}">
                                                    @csrf
                                                    <div class="">
                                                        <div class="flex flex-wrap">
                                                            <div class="w-full px-4">
                                                                <div class="relative w-full mb-3">
                                                                    <label class="block uppercase text-xs font-bold mb-2">
                                                                        Nom de l'établissement
                                                                    </label>
                                                                    <input type="text" name="nom" class="border-0 px-3 py-3 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                                                    @if ($errors->has('nom'))
                                                                    <span class="text-red-500">{{$errors->first('nom')}}</span>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                            <div class="w-full px-4">
                                                                <div class="relative w-full mb-3">
                                                                    <label class="block uppercase text-xs font-bold mb-2">
                                                                        Adresse
                                                                    </label>
                                                                    <input type="text" name="adresse" class="border-0 px-3 py-3 bg-gray-100 rounded text-sm shadow focus:outline-none focus:ring w-full ease-linear transition-all duration-150" required>
                                                                    @if ($errors->has('adresse'))
                                                                    <span class="text-red-500">{{$errors->first('adresse')}}</span>
                                                                    @endif
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <hr class="mt-6 border-b-1">

                                                        <button id="modalAdd" title="enregistrer un nouvel emploiyé" @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                            Enregistrer
                                                            <svg aria-hidden="true" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="flex-shrink-0 h-6 w-6 text-white ml-2">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                                            </svg>

                                                        </button>

                                                    </div>

                                                </form>
                                            </div>

                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="{{route('medecins')}}">
            <img class="rounded-t-lg" style="height: 250px; width:fit-content" src="{{asset('assets/blousson.jpg')}}" alt="" />
        </a>
        <div class="p-5">
            <a href="{{route('medecins')}}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Enregistrer un médecin</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">créer un nouveau médecin pour une personne. <b class="text-red-500">Attention</b>, cette action est irréversible. Merci de bien verifier les informations saisis.</p>
            <a href="{{route('medecins')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Enregistrer
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>



    <!-- <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="{{route('link.patienthosto')}}">
            <img class="rounded-t-lg" style="height: 250px; width:fit-content" src="{{asset('assets/hosto.jpg')}}" alt="" />
        </a>
        <div class="p-5">
            <a href="{{route('link.patienthosto')}}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Lier un patient à un hopital</h5>
            </a>
            <a href="{{route('link.patienthosto')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Lier
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div>


    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="{{route('link.patientmed')}}">
            <img class="rounded-t-lg" style="height: 250px; width:fit-content" src="{{asset('assets/infirm.jpg')}}" alt="" />
        </a>
        <div class="p-5">
            <a href="{{route('link.patientmed')}}">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Lier patient à un médecin</h5>
            </a>
            <a href="{{route('link.patientmed')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Lier
                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
            </a>
        </div>
    </div> -->



</div>