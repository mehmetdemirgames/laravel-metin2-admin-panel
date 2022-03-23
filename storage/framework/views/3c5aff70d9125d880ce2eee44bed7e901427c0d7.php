<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, ['title' => 'Forms']); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Ejderha Parası & Market Parası İşlemleri
        </h2>

        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">

            <form action="<?php echo e(route('shop.updatecash')); ?>">
                <?php echo csrf_field(); ?>

                <div class=" text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Account Type</span>
                    <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="accountType" value="account_login" />
                            <span class="ml-2">Kullanıcı Adı</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="accountType" value="player_name" />
                            <span class="ml-2">Nick</span>
                        </label>
                    </div>
                </div>



                <label class="block text-sm mt-4">
                    <span class="text-gray-700 dark:text-gray-400 font-bold">Kullanıcı Adı veya Nick Neyi Seçtiysen Onu
                        Gir!</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="NickOrLogin" placeholder="Kullanıcı Adı veya Nick Neyi Seçtiysen Onu Gir!" />
                </label>

                <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Cash Type
                    </span>
                    <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="cashType" value="ep" />
                            <span class="ml-2">Ejderha Parası</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="cashType" value="mp" />
                            <span class="ml-2">Market Parası</span>
                        </label>

                        <label class="block text-sm mt-4">
                            <span class="text-gray-700 dark:text-gray-400 font-bold">Tutarı Gir!</span>
                            <input
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="count" placeholder="Tutarı Gir!" />
                        </label>

                    </div>
                </div>

                <button type="submit" class="btn btn-success w-full mt-3">Yükle</button>

            </form>
        </div>

    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\PC\Desktop\dev\laravel-metin2-admin-panel\resources\views/shop/sendcash.blade.php ENDPATH**/ ?>