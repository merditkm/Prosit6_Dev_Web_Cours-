<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Créer un Utilisateur</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-xl mx-auto bg-white p-6 shadow-sm sm:rounded-lg">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700">Nom</label>
                    <input type="text" name="name" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" name="email" class="w-full border rounded px-3 py-2" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Mot de passe</label>
                    <input type="password" name="password" class="w-full border rounded px-3 py-2" required>
                </div>
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Enregistrer</button>
                <a href="{{ route('users.index') }}" class="ml-2 text-gray-600">Annuler</a>
            </form>
        </div>
    </div>
</x-app-layout>