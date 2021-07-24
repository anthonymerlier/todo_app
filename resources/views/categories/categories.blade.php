<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Liste des catégories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-12">
                        <div class="col-span-7 p-6">
                            <form action="">
                                <div class="text-2xl border-b-2 mb-3 pb-2 font-bold text-purple-800">Mes catégories</div>
                                <div>
                                    @foreach($categories as $category)
                                    <div class="pl-3">
                                        <input type="checkbox" class="form-checkbox mb-1" name="category[]"
                                            id="{{ $category->id }}"> <span class="md:text-lg">{{ $category->name }}</span>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="flex justify-end">
                                    <select name="action" id="">
                                        <option value="" disabled selected>Action à réaliser</option>
                                        <option value="delete">Supprimer</option>
                                        <option value="export">Exporter</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <div class="col-start-9 col-span-4 p-6">
                            <div class="text-2xl border-b-2 mb-3 pb-2 font-bold text-purple-800">Ajouter une catégorie</div>
                            <div>
                                <x-input class="w-full border-2  p-2" placeholder="Nouvelle catégorie"></x-input>
                                <div class="flex justify-end mt-3">
                                    <x-button class="bg-purple-700 hover:bg-purple-900 text-white p-3 rounded">Ajouter</x-button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
