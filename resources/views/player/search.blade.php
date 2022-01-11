<x-app-layout title="Forms">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Karakter Arama
        </h2>

        <form action="{{route('player.index')}}" method="GET">
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Arama Türünü Seçin
                    </span>
                    <select name="type"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                        required>
                        <option>Seçiniz</option>
                        <option value="name">Karakter Adı</option>
                        <option value="login">Kullanıcı Adı</option>
                        <option value="ip">İp Adresi</option>
                        <option value="email">Email Adresi</option>
                        <option value="reel_name">Gerçek İsmi</option>
                        <option value="phone1">Telefon Numarası</option>
                        <option value="mac">Mac Ara</option>
                        <option value="deleted_player_name">Silinen Karakter</option>
                    </select>
                </label>

                <label class="block mt-2 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Arama türünü seçtikten sonra arancak değeri
                        giriniz.</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        placeholder="Değer Giriniz"
                        name="value" />
                </label>

                <button type="submit" class="btn btn-success w-full mt-2">Karakter Ara</button>

            </div>
        </form>

    </div>
</x-app-layout>
