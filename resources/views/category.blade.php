@section("title")
    {{$category->title}}
@endsection
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __($category->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="flex flex-col gap-6 max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div
                class="flex text-lg gap-6 p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('category.show', $category)" :active="request()->routeIs('category.show')">
                        {{ __('Одежда') }}
                    </x-responsive-nav-link>
                </div>
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('makeup.show', $category)" :active="request()->routeIs('makeup.show')">
                        {{ __('Макияж') }}
                    </x-responsive-nav-link>
                </div>
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('jewelry.show', $category)" :active="request()->routeIs('jewelry.show')">
                        {{ __('Украшения и прически') }}
                    </x-responsive-nav-link>
                </div>
            </div>
            <div
                class="flex flex-col text-lg gap-6 p-4 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <form action="{{route("clothes.store", ["category"=>$category])}}" method="post"
                      enctype="multipart/form-data" class="flex flex-col p-6 text-lg gap-4">
                    @csrf
                    <div class="flex gap-4">
                        <input name="img" type="file"
                               class="flex-1 border-2 text-white border-white border-dashed p-2 rounded-lg" required>
                        <select name="type" class="flex-1 rounded-lg p-4" required>
                            <option disabled selected>Выберите тип</option>
                            <option value="body">Верхняя одежда</option>
                            <option value="pants">Брюки / юбка</option>
                            <option value="shoes">Обувь</option>
                        </select>
                        <select name="correct" class="flex-1 rounded-lg p-4" required>
                            <option disabled selected>Корректность</option>
                            <option value="true">Подходит</option>
                            <option value="false">Не подходит</option>
                        </select>
                    </div>
                    <button class="bg-fuchsia-600 text-white p-4 rounded-lg">Добавить одежду</button>
                </form>
            </div>
            <div
                class="grid @if(count($clothes) > 0) grid-cols-4 @endif text-lg gap-4 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                @if(count($clothes) > 0)
                    @foreach($clothes as $item)
                        <div
                            class="@if($item->correct == "true") border-green-500 @elseif($item->correct == "false") border-red-500 @endif bg-white clothes-card relative border-4 overflow-hidden rounded-lg">
                            <div
                                class="absolute right-4 top-4 flex flex-col items-center p-1 bg-white opacity-0 transition clothes-card-controls border-2 rounded gap-1">
                                <a href="{{route("clothes.edit", ["clothes" => $item, "category" => $category])}}"
                                   class="rounded">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"
                                         class="h-8 w-8 p-1 rounded hover:bg-blue-700 hover:fill-white">
                                        <path
                                            d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160L0 416c0 53 43 96 96 96l256 0c53 0 96-43 96-96l0-96c0-17.7-14.3-32-32-32s-32 14.3-32 32l0 96c0 17.7-14.3 32-32 32L96 448c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l96 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 64z"/>
                                    </svg>
                                </a>
                                <form action="{{route("clothes.destroy", ["clothes" => $item])}}" method="post"
                                      class="h-8 rounded">
                                    @csrf
                                    @method("delete")
                                    <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"
                                             class="h-8 w-8 hover:bg-red-600 hover:fill-white p-1 rounded">
                                            <path
                                                d="M135.2 17.7L128 32 32 32C14.3 32 0 46.3 0 64S14.3 96 32 96l384 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-96 0-7.2-14.3C307.4 6.8 296.3 0 284.2 0L163.8 0c-12.1 0-23.2 6.8-28.6 17.7zM416 128L32 128 53.2 467c1.6 25.3 22.6 45 47.9 45l245.8 0c25.3 0 46.3-19.7 47.9-45L416 128z"/>
                                        </svg>
                                    </button>
                                </form>
                            </div>
                            <img src="{{asset($item->img)}}" class="h-64 w-full p-6" alt="Картинка одежды">
                        </div>
                    @endforeach
                @else
                    <p class="text-white">Одежда в категории не добавлена</p>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
