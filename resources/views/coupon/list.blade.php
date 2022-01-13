<x-app-layout title="Tables">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Epin Kodları Listesi
        </h2>

        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">id</th>
                            <th class="px-4 py-3">Kod</th>
                            <th class="px-4 py-3">Ep Tutarı</th>
                            <th class="px-4 py-3">Durum</th>
                            <th class="px-4 py-3">Site</th>
                            <th class="px-4 py-3">Açılma Tarihi</th>
                            <th class="px-4 py-3">Kim</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($coupons as $coupon)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                {{$coupons->firstItem() + $loop->index}}
                            </td>
                            <td class="px-4 py-3">
                                {{$coupon->kod}}
                            </td>
                            <td class="px-4 py-3 text-sm ">
                                {{$coupon->ep}}
                            </td>
                            <td class="px-4 py-3 text-m">
                               {{$coupon->durum}}
                            </td>
                            
                            <td class="px-4 py-3 text-sm ">
                                {{$coupon->site}}
                            </td>
                            <td class="px-4 py-3 text-sm ">
                                {{$coupon->acilma_tarih}}
                            </td>
                            <td class="px-4 py-3 text-sm ">
                                {{$coupon->kim}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            <div class="my-4 flex justify-center flex-1 lg:mr-32">
               {{$coupons->links()}}
            </div>
            
            </div>
        </div>

    </div>
    </div>
</x-app-layout>
