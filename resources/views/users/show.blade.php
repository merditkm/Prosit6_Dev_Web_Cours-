<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Détails de l'Utilisateur</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto bg-white p-6 shadow-sm sm:rounded-lg">
            <p><strong>ID :</strong> {{ $user->id }}</p>
            <p class="mt-2"><strong>Nom :</strong> {{ $user->name }}</p>
            <p class="mt-2"><strong>Email :</strong> {{ $user->email }}</p>
            <p class="mt-2"><strong>Inscrit le :</strong> {{ $user->created_at->format('d/m/Y') }}</p>

            <div class="mt-6">
                <a href="{{ route('users.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Retour</a>
            </div>
        </div>
    </div>
</x-app-layout>