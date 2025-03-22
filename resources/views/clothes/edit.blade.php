@section("title")
    Редактирование одежды
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Редактирование одежды
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="flex text-lg gap-6 p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <img src="{{asset($clothes->img)}}" class="w-1/4 h-64 bg-white rounded-lg p-4" alt="картинка">
                <form action="{{route("clothes.update", ["category" => $category, "clothes" => $clothes])}}" method="post"
                      enctype="multipart/form-data" class="flex-1 flex flex-col p-6 text-lg gap-4">
                    @csrf
                    @method("put")
                    <div class="flex gap-4">
                        <input name="img" type="file"
                               class="flex-1 border-2 text-white border-white border-dashed p-2 rounded-lg">
                        <select name="type" class="flex-1 rounded-lg p-4">
                            <option value="body" @if($clothes->type == "body") selected @endif>Верхняя одежда</option>
                            <option value="pants" @if($clothes->type == "pants") selected @endif>Брюки / юбка</option>
                            <option value="shoes" @if($clothes->type == "shoes") selected @endif>Обувь</option>
                        </select>
                        <select name="correct" class="flex-1 rounded-lg p-4">
                            <option value="true" @if($clothes->correct == "true") selected @endif>Подходит</option>
                            <option value="false" @if($clothes->correct == "false") selected @endif>Не подходит</option>
                        </select>
                    </div>
                    <button class="bg-fuchsia-600 text-white p-4 rounded-lg">Сохранить изменения</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
