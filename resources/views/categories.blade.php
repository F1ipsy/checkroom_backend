@section("title")
    Категории
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Категории') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route("category.store")}}" method="post" class="flex flex-col p-6 text-lg gap-4">
                    @csrf
                    <div class="flex gap-4">
                        <input type="text" name="title" class="flex-1 text-black text-lg rounded-lg p-4"
                               placeholder="Название категории" required>
                        <button type="submit" class="bg-fuchsia-600 text-white rounded-lg px-12">Создать</button>
                    </div>
                    @error("title")
                    <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <textarea name="instruction" class="flex-1 text-black text-lg rounded-lg p-4" placeholder="Инструкция категории"></textarea>
                    @error("description")
                        <p class="text-red-500">{{$message}}</p>
                    @enderror
                    <div class="flex gap-4">
                        <label class="border border-white w-[12%] h-max font-medium text-white text-center p-2.5 rounded-lg">Одежда</label>
                        <textarea name="recommendations[]" class="flex-1 text-black text-lg rounded-lg p-4" placeholder="Рекомендации по стилю"></textarea>
                    </div>
                    <div class="flex gap-4">
                        <label class="border border-white w-[12%] h-max font-medium text-white text-center p-2.5 rounded-lg">Обувь</label>
                        <textarea name="recommendations[]" class="flex-1 text-black text-lg rounded-lg p-4" placeholder="Рекомендации по стилю"></textarea>
                    </div>
                    <div class="flex gap-4">
                        <label class="border border-white w-[12%] h-max font-medium text-white text-center p-2.5 rounded-lg">Детали</label>
                        <textarea name="recommendations[]" class="flex-1 text-black text-lg rounded-lg p-4" placeholder="Рекомендации по стилю"></textarea>
                    </div>
                    <div class="flex gap-4">
                        <label class="border border-white w-[12%] h-max font-medium text-white text-center p-2.5 rounded-lg">Аксессуары</label>
                        <textarea name="recommendations[]" class="flex-1 text-black text-lg rounded-lg p-4" placeholder="Рекомендации по стилю"></textarea>
                    </div>
                </form>
            </div>
            <div
                class="flex flex-col text-lg mt-6 gap-4 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                @if(count($categories) == 0)
                    <p class="text-white px-4">Категории не созданы</p>
                @endif
                @foreach($categories as $category)
                    <div
                        class="flex justify-between text-lg gap-4 shadow-sm">
                        <a href="{{route("category.show", ["category" => $category])}}"
                           class="flex-1 p-4 rounded-lg text-lg text-black bg-white gap-4">{{$category->title}}</a>
                        <div class="flex gap-4">
                            <a href="{{route("category.edit", ['category'=>$category])}}"
                               class="text-white bg-blue-500 rounded-lg p-4">Редактировать</a>
                            <form action="{{route("category.destroy", ["category" => $category])}}" method="post">
                                @csrf
                                @method("delete")
                                <button type="submit" class="text-white bg-red-500 rounded-lg p-4">Удалить</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
