<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
           Mon profil
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="text-2xl border-b-2 pb-4 border-purple-800">Vos informations personnelles</h1>
                    <form action="" method="post">
                            <div class="flex flex-wrap">
                                <div class="md:flex-1">
                                    <div class="pt-6 pb-6">
                                        <label for="">Votre nom</label>
                                        <x-input class="w-full border-2 border-gray-200 p-2 mt-2" name="nom" value="{{ $user->last_name }}"></x-input>
                                    </div>
                                    <div class="pb-6">
                                        <label for="">Votre prénom</label>
                                        <x-input class="w-full border-2 border-gray-200 p-2 mt-2" name="prenom" value="{{ $user->first_name }}"></x-input>
                                    </div>
                                    <div class="pb-6">
                                        <label for="">Votre adresse email</label>
                                        <x-input class="w-full border-2 border-gray-200 p-2 mt-2" name="email" value="{{ $user->email }}"></x-input>
                                    </div>
                                    <div class="pb-6">
                                        <label for="">Clé API</label>
                                        <x-input class="w-full border-2 border-gray-200 p-2 mt-2" name="token" disabled value="{{ $user->apiKey }}"></x-input>
                                    </div>
                                    <div class="pb-6">
                                        <x-button class="bg-gray-500 hover:bg-purple-800 text-xs">Enregistrer</x-button>
                                    </div>
                                </div>
                                <div class="md:flex-1 self-center">
                                    <div class="md:p-11">
                                        <fieldset class="border border-solid border-purple-800 p-3">
                                            <legend class="text-sm text-red-600 font-bold">Zone de danger</legend>
                                            <div class="flex flex-col mb-4">
                                                <div class="flex">
                                                    <box-icon name='cloud-download'  size="sm" class=" w-8"></box-icon>
                                                    <h3 class="text-md font-bold">Télécharger mes données</h3>
                                                </div>
                                                <div>
                                                    <p class="text-xs">Pour récupérer l'intégralité des données de votre compte, cliquez sur le bouton Télécharger</p>
                                                    <x-button class="bg-gray-500 hover:bg-purple-700 mt-3 text-xs">Télécharger</x-button>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="flex mt-4 flex-col">
                                                <div class="flex">
                                                    <box-icon name='trash' size="sm" class=" w-8"></box-icon>
                                                    <h3 class="text-md font-bold"> Supprimer mon compte</h3>
                                                </div>
                                                <div>
                                                    <p class="text-xs">Pour supprimer définitivement votre compte, cliquez simplement sur le bouton ci-dessous</p>
                                                <x-button class="bg-red-500 hover:bg-red-700 mt-3">Supprimer</x-button>
                                                </div>
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
