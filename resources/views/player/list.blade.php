<x-app-layout title="Tables">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Karakter Listesi
        </h2>

        <form method="GET" action="">
            <div class="row">
                <div class="col-md-2">
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 
                focus:outline-none focus:shadow-outline-purple 
                dark:text-gray-300 dark:focus:shadow-outline-gray form-control" placeholder="Karakter Adı" name="name"
                        value="{{request()->get('name')}}" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 
                focus:outline-none focus:shadow-outline-purple 
                dark:text-gray-300 dark:focus:shadow-outline-gray form-control" placeholder="ip Adresi" name="ip"
                        value="{{request()->get('ip')}}" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 
                focus:outline-none focus:shadow-outline-purple 
                dark:text-gray-300 dark:focus:shadow-outline-gray form-control" placeholder="Yang Miktarı" name="gold"
                        value="{{request()->get('gold')}}" />
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-success w-full">Ara</button>
                </div>
            </div>
        </form>

        <div class="w-full overflow-hidden rounded-lg shadow-xs mt-2">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Karakter Adı</th>
                            <th class="px-4 py-3">Level</th>
                            <th class="px-4 py-3">Son Giriş</th>
                            <th class="px-4 py-3">Karakter Sahibi</th>
                            <th class="px-4 py-3">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach($player as $playerr)
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
                                        <span
                                            class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                            @if($playerr->Guild)
                                            {{  $playerr->Guild->name  }}
                                            @else
                                            Herhangi bir loncaya katılmadı.
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$playerr->level}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$playerr->last_play->diffForHumans()}}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                    <a
                                        href="{{route('account.show', $playerr->account->login)}}">{{$playerr->account->login}}</a>
                                </span>
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


            </div>
            <div class="my-4 flex justify-center flex-1 lg:mr-32">

                {{$player->withQueryString()->links()}}
            </div>
        </div>



    </div>



</x-app-layout>
