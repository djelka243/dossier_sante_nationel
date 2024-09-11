<x-guest-layout>
    @include('header')
    <div class="md:flex">
        <div class="md:py-4">
            <div class="w-full px-4 mx-auto mt-6">

                <div class="md:py-4">
                    <div class="overflow-hidden mb-4 mt-8 md:px-12" style="overflow-x: auto; ">
                        <table class="w-full shadow border-bl">
                            <thead>
                                <tr class="bg-blue-900 text-white uppercase text-sm leading-normal">
                                    <th class="py-3 px-4 text-left">N°</th>
                                    <th class="py-3 px-4 text-left max-sm:text-sm">Nom</th>
                                    <th class="py-3 px-4 text-left">Postnom</th>
                                    <th class="py-3 px-4 text-left">Prenom</th>
                                    <th class="py-3 px-4 text-left">Genre</th>
                                    <th class="py-3 px-4 text-left">Date de naissance</th>
                                    <th class="py-3 px-4 text-left">Groupe sanguin</th>
                                    <th class="py-3 px-4 text-left">Poids</th>
                                    <th class="py-3 px-4 text-left">Taille</th>
                                    <th class="py-3 px-4 text-left">Consultation</th>
                                    <th class="py-3 px-4 text-left">Prescription</th>
                                    <th class="py-3 px-4 text-left">Examen</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($patients as $index => $patient)
                                <tr class="border-bn border-gray-200  dark:bg-gray-600 dark:text-white">
                                    <td class="py-3 px-4">{{ $index +1 }}</td>
                                    <td class="py-3 px-4">{{$patient->nom}}</td>
                                    <td class="py-3 px-4">{{$patient->postnom}}</td>
                                    <td class="py-3 px-4">{{$patient->prenom}}</td>
                                    <td class="py-3 px-4">{{$patient->genre}}</td>
                                    <td class="py-3 px-4">{{$patient->dateNaissance}}</td>
                                    <td class="py-3 px-4">{{$patient->groupeSanguin}}</td>
                                    <td class="py-3 px-4">{{$patient->poids}}</td>
                                    <td class="py-3 px-4">{{$patient->taille}}</td>

                                    <td class="py-3 px-4">
                                        <div x-data="{ open: false }">
                                            <div class="flex rounded">

                                                <button id="modalAdd" title="enregistrer un nouvel emploiyé" @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Consulter
                                                </button>
                                            </div>
                                            <div class="inset-0">
                                                <div @keydown.window.escape="open = false" x-show="open" class="fixed inset-0 overflow-y-auto flex items-center justify-center" aria-labelledby="modal-title" x-ref="dialogMission" aria-modal="true" x-cloak>

                                                    <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Background backdrop, show/hide based on modal state." class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>

                                                    <div class="fixed inset-0 overflow-y-auto">
                                                        <div class="fixed inset-0 overflow-y-auto">
                                                            <div class="flex items-end sm:items-center justify-center min-h-full max-sm:min-h-[20rem] max-sm:mt-24 md:p-4 text-center sm:p-0 mt-4">

                                                                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative bg-white dark:bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[52rem] h-[45rem] sm:w-full" @click.away="open = false">
                                                                    <div class="px-6 py-6 lg:px-8">
                                                                        <h3 class=" font-medium text-gray-900 dark:text-white md:text-center ">Fiche de consultation du patient <span class="text-blue-500 font-extrabold">{{$patient->nom}} {{$patient->postnom}}</span></h3>
                                                                        <hr class="mt-6 mb-6 border-b-1 border-blueGray-300">
                                                                        @livewire('consultation', ['patient_id' => $patient->id])
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="py-3 px-4">
                                        <div x-data="{ open: false }">
                                            <div class="flex rounded">

                                                <button id="modalAdd" title="enregistrer un nouvel emploiyé" @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white font-extrabold bg-yellow-400 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Prescrir
                                                </button>
                                            </div>
                                            <div class="inset-0">
                                                <div @keydown.window.escape="open = false" x-show="open" class="fixed inset-0 overflow-y-auto flex items-center justify-center" aria-labelledby="modal-title" x-ref="dialogMission" aria-modal="true" x-cloak>

                                                    <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Background backdrop, show/hide based on modal state." class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>

                                                    <div class="fixed inset-0 overflow-y-auto">
                                                        <div class="fixed inset-0 overflow-y-auto">
                                                            <div class="flex items-end sm:items-center justify-center min-h-full max-sm:min-h-[20rem] max-sm:mt-24 md:p-4 text-center sm:p-0 mt-4">

                                                                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative bg-white dark:bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[52rem] h-[45rem] sm:w-full" @click.away="open = false">
                                                                    <div class="px-6 py-6 lg:px-8">
                                                                        <h3 class=" font-medium text-gray-900 dark:text-white md:text-center ">Informations du Patient</h3>
                                                                        <hr class="mt-6 mb-6 border-b-1 border-blueGray-300">
                                                                        @livewire('prescription')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="py-3 px-4">
                                        <div x-data="{ open: false }">
                                            <div class="flex rounded">

                                                <button id="modalAdd" title="enregistrer un nouvel emploiyé" @click="open = !open" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-red-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                                    Examiner
                                                </button>
                                            </div>
                                            <div class="inset-0">
                                                <div @keydown.window.escape="open = false" x-show="open" class="fixed inset-0 overflow-y-auto flex items-center justify-center" aria-labelledby="modal-title" x-ref="dialogMission" aria-modal="true" x-cloak>

                                                    <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" x-description="Background backdrop, show/hide based on modal state." class="fixed inset-0 bg-gray-600 bg-opacity-75 transition-opacity"></div>

                                                    <div class="fixed inset-0 overflow-y-auto">
                                                        <div class="fixed inset-0 overflow-y-auto">
                                                            <div class="flex items-end sm:items-center justify-center min-h-full max-sm:min-h-[20rem] max-sm:mt-24 md:p-4 text-center sm:p-0 mt-4">

                                                                <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative bg-white dark:bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[52rem] h-[45rem] sm:w-full" @click.away="open = false">
                                                                    <div class="px-6 py-6 lg:px-8">
                                                                        <h3 class=" font-medium text-gray-900 dark:text-white md:text-center ">Informations du Medecin</h3>
                                                                        <hr class="mt-6 mb-6 border-b-1 border-blueGray-300">
                                                                        @livewire('examen')
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <p id="no-matches" class="text-center" style="display: none;">Aucune correspondance</p>
                    </div>
                    <div class="mt-2">
                        {{$patients->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>