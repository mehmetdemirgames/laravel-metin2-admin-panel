<div class="py-4 text-gray-500 dark:text-gray-400">
    <a class="ml-6 text-lg font-bold text-gray-800 dark:text-gray-200" href="<?php echo e(route('dashboard')); ?>">
        Dashboard
    </a>
    <ul class="mt-6">
        <li class="relative px-6 py-3">
            <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full text-sm font-semibold text-gray-800 transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200 dark:text-gray-100"
                href="<?php echo e(route('dashboard')); ?>">
                <svg class="w-5 h-5" ari a-hidden="true" fill="none" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                    <path
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                    </path>
                </svg>
                <span class="ml-4">Anasayfa</span>
            </a>
        </li>

        <li class="relative px-6 py-3">
            <a data-turbolinks-action="replace"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="<?php echo e(route('account.index')); ?>">
                <i class="fa fa-user-friends"></i>
                <span class="ml-4">Üyelikler</span>
            </a>
        </li>
        <li class="relative px-6 py-3">
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="<?php echo e(route('player.index')); ?>">
                <i class="fa fa-user"></i>
                <span class="ml-4">Karakterler</span>
            </a>
        </li>
        <li class="relative px-6 py-3">
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="<?php echo e(route('guild.index')); ?>">
                <i class="fa fa-house-user"></i>
                <span class="ml-4">Loncalar</span>
            </a>
        </li>
        <li class="relative px-6 py-3">
            <a class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                href="<?php echo e(route('support.index')); ?>">
                <i class="fa fa-envelope"></i>
                <span class="ml-4">Destek Talepleri</span>
            </a>
        </li>

        <li class="relative px-6 py-3">
            <button id="dropdownButton" data-dropdown-toggle="dropdown"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                type="button">
                <i class="fa fa-question"></i>
                <span class="ml-4">Log İşlemleri</span>

                <!-- Dropdown menu -->
                <div id="dropdown"
                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1" aria-labelledby="dropdownButton">
                        <li>
                            <a href="<?php echo e(route('channel.index')); ?>"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Kanal
                                Logları</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('refferal.index')); ?>"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Kayıt
                                Logları & Referans</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('command.index')); ?>"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Yönetici
                                Logları(GM)</a>
                        </li>
                    </ul>
                </div>

        </li>


        <li class="relative px-6 py-3">
            <button id="dropdownButton2" data-dropdown-toggle="dropdown2"
                class="inline-flex items-center w-full text-sm font-semibold transition-colors duration-150 hover:text-gray-800 dark:hover:text-gray-200"
                type="button">
                <i class="fa fa-shopping-cart"></i>
                <span class="ml-4">Nesne Market İşlemleri</span>

                <!-- Dropdown menu -->
                <div id="dropdown2"
                    class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1" aria-labelledby="dropdownButton2">
                        <li>
                            <a href="<?php echo e(route('shop.index')); ?>"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Eşya Satış İstatistik</a>
                        </li>
                        <li>
                            <a href="<?php echo e(route('coupon.index')); ?>"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                Epin Kodu Listesi</a>
                        </li>
                        
                        <li>
                            <a href="<?php echo e(route('shop.sendcash')); ?>"
                                class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                                EP & MP Gönder</a>
                        </li>
                    </ul>
                </div>

        </li>











    </ul>
</div>
<?php /**PATH C:\Users\PC\Desktop\dev\laravel-metin2-admin-panel\resources\views/layouts/_menus.blade.php ENDPATH**/ ?>