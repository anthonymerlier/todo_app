<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
           Créer une tâche
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="md:p-6">
                        <h1 class="text-2xl font-bold text-purple-800">Nouvelle tâche</h1>
                    </div>
                    <div class="md:flex">
                        <div class="md:flex-1">
                            <div class="md:px-6 py-3">
                                <label for="nom">Nom de la tâche</label>
                                <x-input class="w-full border-2 border-gray-200 p-2 mt-2" name="nom" id="nom"></x-input>
                            </div>
                            <div class="md:px-6 py-3">
                                <label for="desc">Description</label>
                                <textarea name="desc" id="desc" cols="30" rows="6" class="w-full border-2 border-gray-300 p-2 mt-2 rounded-md"></textarea>
                            </div>
                            <div class="md:px-6 py-3">
                                <label for="begin_date">Date de début</label>
                                <input type="text" class="w-full border-2 border-gray-300 p-2 mt-2 rounded-md" id="begin_date">
                            </div>
                            <div class="md:px-6 py-3">
                                <label for="end_date">Date d'échéance</label>
                                <input type="text" class="w-full border-2 border-gray-300 p-2 mt-2 rounded-md" id="end_date">
                            </div>
                        </div>
                        <div class="md:flex-1">
                            <div class="md:px-6 py-3">
                                <label for="priority">Priorité</label>
                                <div class="py-2"><input type="radio" name="priority"> Basse</div>
                                <div class="py-2"><input type="radio" name="priority"> Moyenne</div>
                                <div class="py-2"><input type="radio" name="priority"> Haute</div>
                                <div class="py-2"><input type="radio" name="priority"> Prioritaire</div>
                            </div>
                            <div class="md:px-6 py-3">
                                <fieldset class="border-2 rounded border-solid border-gray-300 p-3">
                                    <legend class="text-sm text-purple-800 font-bold">Image à la une</legend>
                                    <input type="file" name="image" id="image" class="w-full">
                                </fieldset>
                            </div>
                            <div class="md:px-6 py-3">
                                <label for="category">Catégorie</label>
                                <select name="category" id="category" class="w-full border-2 border-gray-300 p-2 mt-2 rounded-md">
                                    <option value="" disabled selected>Choisir une catégorie</option>
                                </select>
                            </div>
                            <div class="md:px-6 py-3 mt-5 flex justify-end">
                                <x-button class="bg-purple-700 hover:bg-purple-900 text-white p-3 rounded">Ajouter cette tâche</x-button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('tasks.scripts')
