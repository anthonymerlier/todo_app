<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
           Détail d'une tâche
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="md:flex md:justify-between pb-3 border-b border-purple-500 mb-7">
                        <div class="">
                            <h1 class="text-2xl text-purple-600 font-bold">{{ mb_strtoupper($task->name) }}</h1>
                            <div class="">
                                @foreach($task->tags as $tag)
                                <a href="" class="text-sm text-gray-500 hover:text-purple-500 font-bold pr-2">#{{ $tags[$tag->tag_id]->name }}</a>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <p class="text-gray-500">Créée le {{ (new DateTime($task->created_at))->format("d/m/Y à H:i")  }}</p>
                            <div class="text-right mt-2">
                                <a href="{{ route('taskscategory', $task->category->ref) }}" class="px-2 py-1 rounded" style="background: {{ $task->category->color_bg }}; color: {{ $task->category->color_text }}">{{ $task->category->name }} </a>
                            </div>
                        </div>
                    </div>

                    <div class="md:grid md:grid-cols-12 md:gap-4">
                        <div class="md:col-span-7">
                            <p class="text-justify text-gray-500 p-3 rounded border border-gray-400">
                                {{ $task->description }}
                            </p>
                        </div>
                        <div class="md:col-start-9 md:col-span-4">
                            <div class="">
                                <p class="font-bold">Date de début :</p>
                                <div>
                                    <input type="text" class="w-full text-center rounded bg-gray-200  text-gray-500" value="{{ (new DateTime($task->begin_date))->format("d/m/Y à H:i")  }}" disabled>
                                </div>
                            </div>
                            <div class="text-center py-2 mt-3">
                                <box-icon name='down-arrow-circle' color="gray"></box-icon>
                            </div>
                            <div class="mb-5">
                                <p class="font-bold">Date d'échéance :</p>
                                <input type="text"  class="w-full text-center rounded bg-gray-200 text-gray-500" value="{{ (new DateTime($task->end_date))->format("d/m/Y à H:i")  }}" disabled>
                                <p class="pt-3 text-center text-red-900">Cette tâche arrivera à son terme dans <span  class="font-bold">{{ $task->diffDate }} jours</span></p>
                            </div>
                            <div class="mb-5">
                                <p class="font-bold">Etiquettes :</p>
                                <div class="pt-1 pb-4">
                                    @foreach($task->tags as $tag)
                                        <a href="" class="mr-2 px-2 py-1 rounded" style="background: {{ $tags[$tag->tag_id]->color_bg }}; color: {{ $tags[$tag->tag_id]->color_text }}; line-height: 2.5em">#{{ $tags[$tag->tag_id]->name }}</a>
                                    @endforeach
                                </div>
                            </div>
                            @if($task->attachment)
                            <div class="mb-5">
                                <p class="font-bold">Pièce jointe :</p>
                                <div class="mt-3"><a class="bg-purple-500 hover:bg-purple-700 rounded text-white p-2 " target="_blank" href="{{ asset("storage/".$task->attachment) }}">Télécharger la PJ</a></div>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    
                        
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
