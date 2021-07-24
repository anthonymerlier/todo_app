<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           Mon profil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl border-b-2 pb-4 border-purple-400">Vos informations personnelles</h1>
                    <form action="" method="post">
                            <div class="flex">
                                <div class="flex-1">
                                    <div class="pt-6 pb-6">
                                        <label for="">Votre nom</label>
                                        <x-input class="w-full border-2 p-2 mt-2" name="nom" value="{{ $user->last_name }}"></x-input>
                                    </div>
                                    <div class="pb-6">
                                        <label for="">Votre prénom</label>
                                        <x-input class="w-full border-2 p-2 mt-2" name="prenom" value="{{ $user->first_name }}"></x-input>
                                    </div>
                                    <div class="pb-6">
                                        <label for="">Votre adresse email</label>
                                        <x-input class="w-full border-2 p-2 mt-2" name="email" value="{{ $user->email }}"></x-input>
                                    </div>
                                    <div class="pb-6">
                                        <label for="">Clé API</label>
                                        <x-input class="w-full border-2 p-2 mt-2" name="token" value="{{ $user->apiKey }}"></x-input>
                                    </div>
                                    <div class="pb-6">
                                        <x-button class="bg-gray-500 hover:bg-purple-700 text-xs">Enregistrer</x-button>
                                    </div>
                                </div>
                                <div class="flex-1">
                                    <div class="p-11">
                                        <fieldset class="border border-solid border-red-300 p-3">
                                            <legend class="text-sm text-red-600 font-bold">Zone de danger</legend>
                                            <div class="mb-4">
                                                <h3 class="text-md font-bold">Télécharger mes données</h3>
                                                <p class="text-xs">Pour récupérer l'intégralité des données de votre compte, cliquez sur le bouton Télécharger</p>
                                                <x-button class="bg-gray-500 hover:bg-purple-700 mt-3 text-xs">Télécharger</x-button>
                                            </div>
                                            <hr>
                                            <div class="mt-4">
                                                <h3 class="text-md font-bold">Supprimer mon compte</h3>
                                                <p class="text-xs">Pour supprimer définitivement votre compte, cliquez simplement sur le bouton ci-dessous</p>
                                                <x-button class="bg-red-500 hover:bg-red-700 mt-3">Supprimer</x-button>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
