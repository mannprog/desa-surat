<form id="deleteDoc" method="post">
    <?php echo csrf_field(); ?>
    <?php echo method_field('DELETE'); ?>
    <a href="<?php echo e(route('surat.kk.show', $row->id)); ?>" class="btn btn-sm mb-0 btn-info"><i class="fas fa-eye"></i></a>
    <?php if($row->status === 'belumditentukan'): ?>
        <button type="submit" class="btn btn-sm mb-0 btn-danger deleteBtn" data-id="<?php echo e($row->id); ?>"><i
                class="fas fa-trash-alt"></i></button>
    <?php endif; ?>
    <?php if($row->status === 'selesai'): ?>
        <a href="<?php echo e(route('surat.kk.download', $row->spkk)); ?>" class="btn btn-sm mb-0 btn-success"><i
                class="fas fa-download"></i></a>
    <?php endif; ?>
</form>
<?php /**PATH C:\laragon\www\desa-surat\resources\views/auth/warga/pages/surat/kk/component/action.blade.php ENDPATH**/ ?>