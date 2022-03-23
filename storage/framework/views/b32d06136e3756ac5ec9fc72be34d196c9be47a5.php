<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, ['title' => 'Tables']); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Üyelik Listesi
        </h2>

        <form method="GET" action="">
            <div class="row">
                <div class="col-md-2">
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 
                focus:outline-none focus:shadow-outline-purple 
                dark:text-gray-300 dark:focus:shadow-outline-gray form-control" placeholder="Kullanıcı Adı" name="login"
                        value="<?php echo e(request()->get('login')); ?>" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 
                focus:outline-none focus:shadow-outline-purple 
                dark:text-gray-300 dark:focus:shadow-outline-gray form-control" placeholder="Email" name="email"
                        value="<?php echo e(request()->get('email')); ?>" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 
                focus:outline-none focus:shadow-outline-purple 
                dark:text-gray-300 dark:focus:shadow-outline-gray form-control" placeholder="Telefon No" name="phone1"
                        value="<?php echo e(request()->get('phone1')); ?>" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 
                focus:outline-none focus:shadow-outline-purple 
                dark:text-gray-300 dark:focus:shadow-outline-gray form-control" placeholder="Hwid" name="hwid"
                        value="<?php echo e(request()->get('hwid')); ?>" />
                </div>
                <div class="col-md-2">
                    <input type="text" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 
                focus:outline-none focus:shadow-outline-purple 
                dark:text-gray-300 dark:focus:shadow-outline-gray form-control" placeholder="Machine Guid" name="machine_guid"
                        value="<?php echo e(request()->get('machine_guid')); ?>" />
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
                            <th class="px-2 py-3">Kullanıcı Adı</th>
                            <th class="px-2 py-3">Email</th>
                            <th class="px-2 py-3">Telefon Numarası</th>
                            <th class="px-2 py-3">Ep</th>
                            <th class="px-2 py-3">Hwid</th>
                            <th class="px-2 py-3">Machine Guid</th>
                            <th class="px-2 py-3">Ne Kadar Yatırmış?</th>
                            <th class="px-2 py-3">İşlemler</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        <?php $__currentLoopData = $account; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accounts): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-2 py-3">
                                <?php echo e($accounts->login); ?>

                            </td>

                            <td class="px-2 py-3 text-sm">
                                <?php echo e($accounts->email); ?>

                            </td>
                            <td class="px-2 py-3 text-sm">
                                <?php echo e($accounts->phone1); ?>

                            </td>
                            <td class="px-2 py-3 text-xs">
                                <?php echo e($accounts->coins); ?>

                            </td>
                            <td class="px-2 py-3 text-xs">
                                <?php echo e($accounts->hwid); ?>

                            </td>
                            <td class="px-2 py-3 text-xs">
                                <?php echo e($accounts->last_machine_guid); ?>

                            </td>
                            <td class="px-2 py-3 text-xs font-bold">
                                <?php echo e($accounts->AccountSales); ?> TL
                            </td>

                            <td class="px-2 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="<?php echo e(route('account.action', $accounts->id)); ?>"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                        aria-label="Edit">
                                        <i class="fa fa-ban"></i>
                                    </a>
                                    <a href="<?php echo e(route('account.edit', $accounts->id)); ?>"
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
                            
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>


            </div>
            <div class="my-4 flex justify-center flex-1 lg:mr-32">

                <?php echo e($account->withQueryString()->links()); ?>

            </div>
        </div>



    </div>



 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\PC\Desktop\dev\laravel-metin2-admin-panel\resources\views/account/list.blade.php ENDPATH**/ ?>