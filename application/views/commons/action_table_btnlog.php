<?php //var_dump($id)   //munculin id pada kolom action untuk keperluan edit?>
<div class="action_table" style="display: block; margin: auto; width: 50px;">
    <button type="button" class="btn btn-warning btn-sm action_btn_edit tooltip-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit Data" data-url="<?php route($controller . '/editlog', $id); ?>">
        <i class="fa fa-edit"></i>
    </button>
    <?php if ($this->auth->is_administrator()): ?>
    <button style="margin-left: 4px" type="button" class="btn btn-danger btn-sm action_btn_delete tooltip-btn" data-toggle="tooltip" data-placement="top" title="" data-original-title="Hapus Data" data-url="<?php route($controller . '/deletelog', $id); ?>">
        <i class="fa fa-remove"></i>
    </button>
    <?php endif; ?>
</div>