<x-app-layout>

    <div class="md:py-4">
        <div class="overflow-hidden mb-4 mt-8 md:px-12" style="overflow-x: auto; ">
            <table class="w-full shadow border-bl">
                <thead>
                    <tr class="bg-blue-900 text-white uppercase text-sm leading-normal">
                        <th class="py-3 px-4 text-left">N°</th>
                        <th class="py-3 px-4 text-left max-sm:text-sm">Nom de l'établissement</th>
                        <th class="py-3 px-4 text-left">Adresse</th>
                        <th class="py-3 px-4 text-left">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hopitaux as $index => $hopital)
                    <tr class="border-bn border-gray-200  dark:bg-gray-600 dark:text-white">
                        <td class="py-3 px-4">{{ $index +1 }}</td>
                        <td class="py-3 px-4">{{$hopital->nom}}</td>
                        <td class="py-3 px-4">{{$hopital->adresse}}</td>
                        <td class="py-3 px-4">
                            <form action="{{route('delHopital')}}" method="post">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="id" value="{{$hopital->id}}">
                        <button>Supprimer</button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p id="no-matches" class="text-center" style="display: none;">Aucune correspondance</p>
        </div>
        <div class="mt-2">
            {{$hopitaux->links()}}
        </div>
    </div>
</x-app-layout>