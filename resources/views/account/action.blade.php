<x-app-layout title="Hesap Ceza İşlemleri">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{$account->login}} hesabını banla
        </h2>

        <form action="{{route('account.transactions', $account->id)}}" method="POST">
            
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Ceza Türü</span>
                    <select name="ban_type"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option name="account">Hesap Ban</option>
                        <option name="mac">Mac Ban</option>
                        <option name="chat">Chat Ban</option>
                        <option name="unban">Ban Aç</option>
                        <option name="unmac">Mac Ban Aç</option>
                    </select>
                </label>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Ceza Alacak Karakter
                    </span>
                    <select name="name"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        @foreach ($account->players as $players)
                            <option value="{{$players->name}}">{{$players->name}}</option>
                        @endforeach
                    </select>
                </label>

                <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Ban Sebebini Seçiniz
                    </span>
                    <select name="ban_why"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="Bot Kullanımı"> Bot Kullanımı </option>
                        <option value="Aile Bireylerine Hakaret"> Aile Bireylerine Hakaret </option>
                        <option value="Hakaretler, İmalar ve Kırıcı Sözler"> Hakaretler, İmalar ve Kırıcı Sözler </option>
                        <option value="Oto Tuş & Macro"> Oto Tuş & Macro </option>
                        <option value="Hile Kullanımı"> Hile Kullanımı </option>
                        <option value="Bug Kullanımı"> Bug Kullanımı </option>
                        <option value="Hırsızlık"> Hırsızlık </option>
                        <option value="Reklam İçerikli Bildirim"> Reklam İçerikli Bildirim</option>
                        <option value="Yöneticilerine Hakaret"> Yöneticilerine Hakaret </option>
                        <option value="Gerçek Para İle Ticaret"> Gerçek Para İle Ticaret </option>
                        <option value="Uygunsuz İsim Kullanmak"> Uygunsuz İsim Kullanmak </option>
                        <option value="Propaganda"> Propaganda </option>
                    </select>
                </div>

                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Ban Süresi
                    </span>
                    <select name="ban_time"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option name="3600">1 Saat</option>
                        <option name="43200">12 Saat</option>
                        <option name="86400">1 Gün</option>
                        <option name="259200">3 Gün</option>
                        <option name="604800">7 Gün</option>
                        <option name="1296000">15 Gün</option>
                        <option name="2592000">30 Gün</option>
                    </select>
                </label>
                <button type="submit" class="btn btn-success mt-4 w-full">İşlem Yap</button>
            </div>
        </form>

    </div>
</x-app-layout>
