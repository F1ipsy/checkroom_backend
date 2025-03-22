@section("title")
    Редактирование украшения или прически
@endsection

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Редактирование украшения или прически
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col max-w-7xl mx-auto gap-6 sm:px-6 lg:px-8">
            <div
                class="flex flex-col text-lg p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route("jewelry.update", ["category" => $category, "jewelry" => $jewelry])}}" method="post"
                      enctype="multipart/form-data" class="flex-1 flex flex-col p-6 text-lg gap-4">
                    @csrf
                    @method("put")
                    <div class="flex gap-4">
                        <div class="w-1/4 flex flex-col gap-2">
                            <label class="text-white" for="img">Вид на полке</label>
                            <input name="img" type="file" id="img"
                                   class="border-2 text-white border-white border-dashed p-2 rounded-lg">
                        </div>
                        <div class="w-1/4 flex flex-col gap-2">
                            <label class="text-white" for="alternateImg">Вид на персонаже</label>
                            <input name="alternateImg" type="file" id="alternateImg"
                                   class="border-2 text-white border-white border-dashed p-2 rounded-lg">
                        </div>
                        <div class="w-1/4 flex flex-col gap-2">
                            <label class="text-white" for="type">Тип</label>
                            <select name="type" id="type" class="h-full rounded-lg border-2 border-transparent">
                                <option value="earrings" @if($jewelry->type == "earrings") selected @endif>Серьги</option>
                                <option value="necklace" @if($jewelry->type == "necklace") selected @endif>Колье / Ожерелье</option>
                                <option value="hairstyle" @if($jewelry->type == "hairstyle") selected @endif>Прическа</option>
                            </select>
                        </div>
                        <div class="w-1/4 flex flex-col gap-2">
                            <label class="text-white" for="correct">Корректность</label>
                            <select name="correct" id="correct" class="h-full rounded-lg border-2 border-transparent">
                                <option value="true" @if($jewelry->correct == "true") selected @endif>Подходит</option>
                                <option value="false" @if($jewelry->correct == "false") selected @endif>Не подходит</option>
                            </select>
                        </div>
                    </div>
                    <button class="bg-fuchsia-600 text-white p-4 rounded-lg">Сохранить изменения</button>
                </form>
            </div>
            <div
                class="grid grid-cols-4 text-lg gap-4 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <img src="{{asset($jewelry->img)}}" class="w-full h-64 bg-white rounded-lg p-4" alt="вид на полке">
                @if($jewelry->alternateImg)
                    <img src="{{asset($jewelry->alternateImg)}}" class="w-full h-64 bg-white rounded-lg p-4" alt="вид на персонаже">
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
