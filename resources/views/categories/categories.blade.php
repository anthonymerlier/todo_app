<x-app-layout>
    <x-slot name="header" >
        <h2 class="font-semibold text-xl text-white leading-tight ">
            Liste des catégories
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-12">
                        <div class="col-span-12 md:col-span-7 p-6">
                            <form action="" id="formMassActions">
                                <div class="text-2xl border-b-2 mb-3 pb-2 font-bold text-purple-800">Mes catégories</div>
                                <div>
                                    @if (count($categories) < 1)
                                        <div class="pb-12">
                                            <p>Il n'y a aucune catégorie</p>
                                        </div>
                                    @endif
                                    @foreach($categories as $category)
                                    <div class="md:pl-3 pt-2 pb-2" id="cat{{ $category->id }}">
                                        <input type="checkbox" class="form-checkbox mb-1" name="category[]"
                                            value="{{ $category->id }}"> <span class="rounded px-2 py-1 " style="background: {{ $category->color_bg }}; color: {{ $category->color_text }}">{{ $category->name }}</span>
                                        <div class="text-xs md:text-base pl-5 pt-2 text-gray-400"><span class="text-purple-600 font-bold">{{ $nbPerCategories[$category->id] }} @if($nbPerCategories[$category->id] > 1 OR $nbPerCategories[$category->id] < 1) tâches @else tâche @endif</span> dans la catégorie <span class="font-bold text-purple-600">{{ $category->name }}</span></div>
                                    </div>
                                    @endforeach
                                </div>
                                <div class="flex justify-end">
                                    <select name="action" id="categoryMassAction" >
                                        <option value="" disabled selected>Action à réaliser</option>
                                        <option value="delete">Supprimer la séléction</option>
                                        <option value="export">Exporter toutes les catégories</option>
                                    </select>
                                </div>
                            </form>
                            <div id="returnMessage"></div>
                        </div>
                        <div class="col-span-12 md:col-start-9 md:col-span-4 p-6">
                            <div class="text-2xl border-b-2 mb-3 pb-2 font-bold text-purple-800">Ajouter une catégorie</div>
                            <div>
                                <form action="" method="post">
                                    @csrf
                                    <x-input class="w-full border-2  p-2" placeholder="Nouvelle catégorie" name="name"></x-input>
                                    <div class="flex justify-end mt-3">
                                        <x-button class="bg-purple-700 hover:bg-purple-900 text-white p-3 rounded">Ajouter</x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('categories.scripts')
</x-app-layout>
