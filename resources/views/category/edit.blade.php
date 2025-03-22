@section("title")
    Редактирование категории {{$category->title}}
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __("Редактирование категории {$category->title}") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route("category.update", ["category"=>$category])}}" method="post"
                      class="flex flex-col p-6 text-lg gap-4">
                    @csrf
                    @method("put")
                    <div class="flex gap-4">
                        <input type="text" name="title" class="flex-1 text-black text-lg rounded-lg p-4"
                               value="{{$category->title}}"
                               placeholder="Название категории">
                        <button type="submit" class="bg-fuchsia-600 text-white rounded-lg px-12">Сохранить</button>
                    </div>
                    @error("title")
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <textarea name="instruction" class="flex-1 text-black text-lg rounded-lg p-4" placeholder="Инструкция категории">{{$category->instruction}}</textarea>
                    @error("description")
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <div class="flex gap-4">
                        <label class="border border-white w-[12%] h-max font-medium text-white text-center p-2.5 rounded-lg">Одежда</label>
                        <textarea name="recommendations[]" class="flex-1 text-black text-lg rounded-lg p-4" placeholder="Рекомендации по стилю">{{$category->recommendations["0"]->title}}</textarea>
                    </div>
                    <div class="flex gap-4">
                        <label class="border border-white w-[12%] h-max font-medium text-white text-center p-2.5 rounded-lg">Обувь</label>
                        <textarea name="recommendations[]" class="flex-1 text-black text-lg rounded-lg p-4" placeholder="Рекомендации по стилю">{{$category->recommendations["1"]->title}}</textarea>
                    </div>
                    <div class="flex gap-4">
                        <label class="border border-white w-[12%] h-max font-medium text-white text-center p-2.5 rounded-lg">Детали</label>
                        <textarea name="recommendations[]" class="flex-1 text-black text-lg rounded-lg p-4" placeholder="Рекомендации по стилю">{{$category->recommendations["2"]->title}}</textarea>
                    </div>
                    <div class="flex gap-4">
                        <label class="border border-white w-[12%] h-max font-medium text-white text-center p-2.5 rounded-lg">Аксессуары</label>
                        <textarea name="recommendations[]" class="flex-1 text-black text-lg rounded-lg p-4" placeholder="Рекомендации по стилю">{{$category->recommendations["3"]->title}}</textarea>
                    </div>
                    @error("recommendations")
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
