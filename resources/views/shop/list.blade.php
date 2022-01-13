<x-app-layout title="Tables">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Nesne Market Detay
        </h2>

        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Sıra</th>
                            <th class="px-4 py-3">Eşya Adı</th>
                            <th class="px-4 py-3">Satılan Adet</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($logmarket as $market)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                {{$loop->iteration }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$market->item_kod}}
                            </td>
                            <td class="px-4 py-3 text-m">
                                <span
                                    class="px-2 py-1 font-extrabold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    {{$market->toplam}}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            <div class="my-4 flex justify-center flex-1 lg:mr-32">

                {{$logmarket->withQueryString()->links()}}
            </div>
            </div>
        </div>

    </div>
    </div>
</x-app-layout>
