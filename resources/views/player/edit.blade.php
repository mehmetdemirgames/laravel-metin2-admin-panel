<x-app-layout title="Karakter Düzenle">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{$player->name}} karakterini düzenle
        </h2>

<form action="{{route('player.update', $player->id)}}" method="POST">
    @method('PUT')
    @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                <span class="text-gray-700 dark:text-gray-400">Karakter Adı</span>
                <input
                    class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                    value="{{$player->name}}" name="name"/>
            </label>

            <div class="mt-4 text-sm">
                <span class="text-gray-700 dark:text-gray-400">
                    Yang Miktarı
                </span>
                <div class="mt-2">
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        value="{{$player->gold}}" name="gold"/>
                </div>
            </div>
            <button type="submit" class="btn btn-success mt-4 w-full">Karakteri Güncelle</button>
        </div>
</form>
 
    </div>
</x-app-layout>
