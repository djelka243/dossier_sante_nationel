<x-app-layout>
    <div class="md:flex">
        <div class="md:py-4">
            <div class="md:max-w-full md:mx-auto sm:px-6 lg:px-8">
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
                                        <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100" x-transition:leave="ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100" x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95" x-description="Modal panel, show/hide based on modal state." class="relative bg-white dark:bg-gray-900 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:max-w-[52rem] h-[45rem] sm:w-full" @click.away="open = false">
                                            <div class="px-6 py-6 lg:px-8">
                                                <h3 class=" font-medium text-gray-900 dark:text-white md:text-center ">Informations du Patient</h3>
                                                <hr class="mt-6 mb-6 border-b-1 border-blueGray-300">
                                                @livewire('patient')
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
</x-app-layout>