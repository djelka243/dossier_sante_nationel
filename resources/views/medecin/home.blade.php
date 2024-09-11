<x-guest-layout>

    @include('header')

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">
                <div class="flex text-whites justify-between ">


                    <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                        <a href="{{route('medecin.patient')}}">
                            <img class="rounded-t-lg" style="height: 250px; width:fit-content" src="{{asset('assets/infirmetpatient.jpg')}}" alt="" />
                        </a>
                        <div class="p-5">
                            <a href="{{route('medecin.patient')}}">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Ajouter des infos sur patient</h5>
                            </a>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">créer le dossier médical pour une personne. <b class="text-red-500">Attention</b>, cette action est irréversible. Merci de bien verifier les informations saisis.</p>
                            <a href="{{route('medecin.patient')}}" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                Enregistrer
                                <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                </svg>
                            </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-guest-layout>