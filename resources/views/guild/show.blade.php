<x-app-layout title="Guilds Show">

    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            {{$guild->name}} Loncası Detay Sayfası
        </h2>

        <div class="row">
            <div class="col-md-6">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Karakter Adı</th>
                            <th class="px-4 py-3">Level</th>
                            <th class="px-4 py-3">Son Giriş</th>
                            <th class="px-4 py-3">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($guild->Player as $playerr)
                        <tr class="text-gray-700 dark:text-gray-400">

                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="{{asset("img/jobs/$playerr->job.jpg")}}" alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true">
                                        </div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">{{$playerr->name}}</p>
                                        
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$playerr->level}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$playerr->last_play->diffForHumans()}}
                            </td>

                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{route('account.action', $playerr->account->id)}}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <i class="fa fa-ban"></i>
                                    </a>
                                    <a href="{{route('player.edit', $playerr->name)}}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                            </path>
                                        </svg>
                                    </a>
                                </div>
                            </td>
                            @endforeach
                        </tr>
                    </tbody>
                </table>
                <div class="my-4 flex justify-center flex-1 lg:mr-32">

                    
                </div>


            </div>
            <div class="col-md-6">
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Lonca Seviyesi
                        <span
                            class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-orange-600 rounded-full">
                            {{$guild->level}}
                        </span>
                    </li>

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Lonca Puanı
                        <span
                            class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-blue-600 rounded-full">
                            {{$guild->ladder_point}}
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Lonca Beceri Seviyesi
                        <span
                            class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-blue-600 rounded-full">
                            {{$guild->skill_point}}
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Lonca Lideri
                        <span
                            class="inline-flex items-center justify-center px-2 py-1 mr-2 text-xs font-bold leading-none text-red-100 bg-blue-600 rounded-full">
                            {{$guild->lider}}
                        </span>
                    </li>
                </ul>
            </div>






        </div>





    </div>

</x-app-layout>
