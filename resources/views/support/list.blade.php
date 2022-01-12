<x-app-layout title="Tables">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Teknik Destek Talepleri
        </h2>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Açan</th>
                            <th class="px-4 py-3">Konu</th>
                            <th class="px-4 py-3">Öncelik</th>
                            <th class="px-4 py-3">Tarih</th>
                            <th class="px-4 py-3">Durum</th>
                            <th class="px-4 py-3">İşlem</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($tickets as $ticket)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <div>
                                        <p class="font-semibold">{{$ticket->account}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @switch($ticket->category)
                                @case('1')
                                <p class="font-semibold">Hakaret & Küfür & Argo</p>
                                @break
                                @case('2')
                                <p class="font-semibold">Hile Bildirimi</p>
                                @break
                                @case('3')
                                <p class="font-semibold">Bug Bildirimi</p>
                                @break
                                @case('4')
                                <p class="font-semibold">Oyun Dışı Destek(Pack vs.)</p>
                                @break
                                @case('5')
                                <p class="font-semibold">Oyun İçi Destek</p>
                                @break
                                @case('6')
                                <p class="font-semibold">Site Sorunları</p>
                                @break
                                @case('7')
                                <p class="font-semibold">Nesne Market Sorunları</p>
                                @break
                                @case('8')
                                <p class="font-semibold">Diğer Sorunlar</p>
                                @break
                                @case('9')
                                <p class="font-semibold">Ban Hakkında İtiraz</p>
                                @break
                                @case('10')
                                <p class="font-semibold">Yayıncılık Hakkında</p>
                                @break
                                @endswitch
                            </td>
                            <td class="px-4 py-3 text-xs">
                                @switch($ticket->status)
                                @case('0')
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-gray-700 bg-gray-100 rounded-full dark:text-gray-100 dark:bg-gray-700">
                                    Düşük
                                </span>
                                @break
                                @case('1')
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    Normal
                                </span>
                                @break
                                @case('2')
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                    Yüksek
                                </span>

                                @break
                                @case('3')

                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-orange-700 bg-orange-100 rounded-full dark:text-white dark:bg-orange-600">
                                    Çok Yüksek
                                </span>
                                @break

                                @endswitch
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$ticket->last_msg->diffForHumans()}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @if ($ticket->open == '1')
                                <span
                                    class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-indigo-100 bg-indigo-700 rounded">Bekliyor</span>
                                @else
                                <span
                                    class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-red-600 rounded-full">Kapandı</span>
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{route('support.show', $ticket->id)}}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
                <div class="my-4 flex justify-center flex-1 lg:mr-32">
                    {{$tickets->links()}}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
