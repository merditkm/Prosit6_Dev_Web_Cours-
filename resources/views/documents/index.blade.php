<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestions des Documents
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <!-- Formulaire de recherche -->
                <form action="{{ route('documents.search') }}" method="GET" class="mb-6 flex gap-2">
                    <input type="text" name="search" placeholder="Rechercher un document..." class="border rounded px-3 py-2 w-full">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Rechercher</button>
                </form>

                <!-- Formulaire d'upload -->
                <form action="{{ route('documents.store') }}" method="POST" enctype="multipart/form-data" class="mb-6 flex gap-4">
                    @csrf
                    <input type="text" name="title" placeholder="Titre du document" required class="border rounded px-3 py-2">
                    <input type="file" name="file" required class="border rounded px-3 py-2">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Ajouter</button>
                </form>

                <!-- Liste des documents -->
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b py-2">Titre</th>
                            <th class="border-b py-2">Fichier</th>
                            <th class="border-b py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $document)
                            <tr>
                                <td class="py-2">{{ $document->title }}</td>
                                <td class="py-2">
                                    <a href="{{ asset('storage/' . $document->path) }}" target="_blank" class="text-blue-600 underline">Voir</a>
                                </td>
                                <td class="py-2">
                                    <form action="{{ route('documents.destroy', $document) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600">Supprimer</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</x-app-layout>