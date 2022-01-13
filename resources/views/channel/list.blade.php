<x-app-layout title="Kanal Logları">
    <div class="container grid px-6 mx-auto">

        <div class="row my-4">
            <div class="col-md-10">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-200">
                    Kanal Logları
                </h2>
            </div>

            <div class="col-md-2">
                <a href="{{route('channel.truncate')}}" type="button" class=" btn btn-danger">
                    Logları Sil
                </a>
            </div>
        </div>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3">CH NAME</th>
                            <th class="px-4 py-3">Kanal</th>
                            <th class="px-4 py-3">Tarih</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($channel_log as $log)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{$channel_log->firstItem() + $loop->index }}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$log->hostname}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$log->channel}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$log->time->format('Y-m-d H:i:s')}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="my-4 flex justify-center flex-1 lg:mr-32">
                {{$channel_log->links()}}
            </div>

        </div>







    </div>
</x-app-layout>
