<x-app-layout title="Tables">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Yönetici Logları(GM)
        </h2>

        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">İp</th>
                            <th class="px-4 py-3">Nick</th>
                            <th class="px-4 py-3">Komut</th>
                            <th class="px-4 py-3">Tarih</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($command_log as $log)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                {{$log->ip}}
                            </td>
                            <td class="px-4 py-3 text-sm ">
                                {{$log->username}}
                            </td>
                            <td class="px-4 py-3 text-m">
                                {{$log->command}}
                            </td>
                            
                            <td class="px-4 py-3 text-sm ">
                                {{$log->date}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            <div class="my-4 flex justify-center flex-1 lg:mr-32">
                {{$command_log->links()}}
            </div>
            
            </div>
        </div>

    </div>
    </div>
</x-app-layout>
