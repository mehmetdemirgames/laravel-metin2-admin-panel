    <div class="container grid px-6 mx-auto">
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Satış İstatistik (10 saniyede bir otomatik yenilenir)
        </h4>
        <div class="w-full mb-8 overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">Şirket</th>
                            <th class="px-4 py-3">Günlük</th>
                            <th class="px-4 py-3">Toplam</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://www.paywant.com/Public/static/img/logo@2x.png"
                                            alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                            aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Paywant</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo e($__paywant_sales->PaywantDaySales); ?> TL
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <?php echo e($__paywant_sales->PaywantTotalSales); ?> TL
                            </td>
                        </tr>

                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://www.kabasakalonline.com/theme/default/assets/img/logo.png?v=0.1"
                                            alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                            aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Kabasakal</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo e($__coupon_sales->KabasakalDaySales); ?> TL
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <?php echo e($__coupon_sales->KabasakalTotalSales); ?> TL
                            </td>
                        </tr>
                        
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://files.sikayetvar.com/lg/cmp/46/46054.png?1522650125"
                                            alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                            aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">İtemci</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <?php echo e($__coupon_sales->ItemciDaySales); ?> TL
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <?php echo e($__coupon_sales->ItemciTotalSales); ?> TL
                                
                            </td>
                        </tr>
                        
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <div class="flex items-center text-sm">
                                    <!-- Avatar with inset shadow -->
                                    <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                        <img class="object-cover w-full h-full rounded-full"
                                            src="https://cdn.pixabay.com/photo/2014/10/23/10/10/dollars-499481__340.jpg"
                                            alt="" loading="lazy" />
                                        <div class="absolute inset-0 rounded-full shadow-inner"
                                            aria-hidden="true"></div>
                                    </div>
                                    <div>
                                        <p class="font-semibold">Genel Toplam</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm font-bold">
                                <?php echo e($__total_day_sales); ?> TL
                            </td>
                            <td class="px-4 py-3 text-sm font-bold">
                                <?php echo e($__total_sales); ?> TL
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
            
        </div>

        
    </div><?php /**PATH C:\Users\PC\Desktop\dev\laravel-metin2-admin-panel\resources\views/layouts/sales_static.blade.php ENDPATH**/ ?>