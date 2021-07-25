<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Liste des étiquettes
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-12">
                        <div class="col-span-12  p-6">
                            <div class="text-2xl border-b-2 mb-3 pb-2 font-bold text-purple-800 ">Ajouter une étiquette</div>
                            <div>
                                <form action="" method="post">
                                    @csrf
                                    <x-input class="w-full border-2  p-2" placeholder="Nouvelle étiquette" name="name"></x-input>
                                    <div class="flex mt-3  justify-center">
                                        <x-button class="bg-purple-700 hover:bg-purple-900 text-white p-3 rounded">Ajouter</x-button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-span-12  p-6">
                            <form action="" id="formMassActions">
                                <div class="text-2xl border-b-2 mb-3 pb-2 font-bold text-purple-800">Mes étiquettes</div>
                                <div>
                                    @if (count($tags) < 1)
                                        <div class="pb-12">
                                            <p>Il n'y a aucune étiquette</p>
                                        </div>
                                    @endif
                                    <div class="pl-3 pt-2 pb-2 flex flex-wrap">
                                        @foreach($tags as $tag)
                                           <div class="flex-start py-3 pr-3">
                                                <input type="checkbox" class="form-checkbox mb-1" name="tag[]"
                                                value="{{ $tag->id }}"> <span class="text-sm rounded px-2 py-1 " style="background: {{ $tag->color_bg }}; color: {{ $tag->color_text }}">#{{ $tag->name }}</span>
                                           </div>
                                        @endforeach
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
