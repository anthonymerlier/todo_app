<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
           Tâches en cours
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between pb-6">
                        <div>
                            @if(isset($categories))
                                @foreach($categories as $category)
                                    <a href="{{ route('taskscategory', $category->ref ) }}"><span class="rounded px-2 py-1 mr-3" style="background-color: {{$category->color_bg }}; color: {{$category->color_text}};">{{$category->name }}</span></a>
                                @endforeach
                            @else
                                    <a href="{{ route('tasks') }}" class="rounded px-2 py-1 bg-purple-500 text-white">Retour à la liste</a>
                            @endif
                        </div>
                        <a href="{{ route('taskcreate') }}" class="w-full sm:w-48 justify-center bg-purple-600 hover:bg-purple-800 rounded p-2 text-white flex items-center">
                            <box-icon type='solid' name='message-square-add' color='white' class='mr-2'></box-icon> 
                            <span>Ajouter une tâche</span>
                        </a>
                    </div>
                    <div class="md:grid md:grid-flow-row md:grid-cols-3 md:grid-rows-3 md:gap-4">
                    @foreach($tasks as $task)
                        <div class="my-3 md:my-0 p-3 rounded bg-gray-100 hover:bg-gray-50 border-purple-100 hover:border-none border-2 md:flex md:flex-col">
                            <div class="flex md:flex-1 justify-between">
                                <div>
                                    <a href="{{ route('task', $task->ref) }}"><h1 class="font-bold text-purple-500 hover:text-purple-800 text-lg">{{ $task->name }}</h1></a>
                                </div>
                                <div>
                                    <span class="rounded px-2 py-1" style="background-color: {{$task->category->color_bg }}; color: {{$task->category->color_text}};"><a href="{{ route('taskscategory', $task->category->ref )}}">{{ $task->category->name }}</a></span>
                                </div>
                            </div>
                            <div class="flex md:flex-shrink-0 items-center justify-center py-4 text-gray-400">
                                {{ (new DateTime($task->begin_date))->format("d/m/Y") }}<box-icon name='right-arrow-circle' color="lightgray" class="mx-3"></box-icon> {{ (new DateTime($task->end_date))->format("d/m/Y") }}
                            </div>
                            <div class="flex md:flex-1 justify-between items-center">
                                <div>
                                    <box-icon name='check-square' color="lightgray" id="check{{ $task->id }}" class="checking cursor-pointer"onmouseover="this.setAttribute('color', 'green')" onmouseout="this.setAttribute('color', 'lightgray')"></box-icon>
                                    <a href="{{ route('task', $task->ref) }}"><box-icon name='show-alt' color="lightgray" id="edit{{ $task->id }}" class="editing" onmouseover="this.setAttribute('color', 'purple')" onmouseout="this.setAttribute('color', 'lightgray')"></box-icon></a>
                                    <box-icon name='trash-alt' color='lightgray' id="trash{{ $task->id }}" class="trashing cursor-pointer" onmouseover="this.setAttribute('color', 'red')" onmouseout="this.setAttribute('color', 'lightgray')"></box-icon>
                                </div>
                                <span class="text-xs rounded p-2 text-gray-500 border-2 border-gray-300 hover:bg-white"><a href="{{ route('task', $task->ref) }}">Ref = ...{{ substr($task->ref, -6) }}</a></span>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    <div class="">
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
