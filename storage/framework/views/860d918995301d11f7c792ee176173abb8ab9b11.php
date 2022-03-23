<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\AppLayout::class, ['title' => 'Tables']); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes([]); ?>
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
                        <?php $__currentLoopData = $coupons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $coupon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">
                                <?php echo e($coupons->firstItem() + $loop->index); ?>

                            </td>
                            <td class="px-4 py-3">
                                <?php echo e($coupon->kod); ?>

                            </td>
                            <td class="px-4 py-3 text-sm ">
                                <?php echo e($coupon->ep); ?>

                            </td>
                            <td class="px-4 py-3 text-m">
                               <?php if($coupon->durum == '0'): ?>
                                   Kullanılmadı
                                <?php elseif($coupon->durum == '1'): ?>
                                    Kullanıldı
                               <?php endif; ?>
                            </td>
                            
                            <td class="px-4 py-3 text-sm ">
                                <?php echo e($coupon->site); ?>

                            </td>
                            <td class="px-4 py-3 text-sm ">
                                <?php echo e($coupon->acilma_tarih); ?>

                            </td>
                            <td class="px-4 py-3 text-sm ">
                                <?php echo e($coupon->kim); ?>

                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                
            <div class="my-4 flex justify-center flex-1 lg:mr-32">
               <?php echo e($coupons->links()); ?>

            </div>
            
            </div>
        </div>

    </div>
    </div>
 <?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php /**PATH C:\Users\PC\Desktop\dev\laravel-metin2-admin-panel\resources\views/coupon/list.blade.php ENDPATH**/ ?>