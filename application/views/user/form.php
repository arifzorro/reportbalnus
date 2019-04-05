<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Form User<small>tambah data</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form class="form-horizontal form-label-left"
                  method="post"
                  action="<?php isset($user->id) ? route("user/save", $user->id ): route("user/save"); ?>"
                  data-parsley-validate
            >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nama
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($user->name); ?>" name="name" type="text" required="required" class="form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Username
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($user->username); ?>" type="text" name="username" required class="form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Role</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="role" class="form-control" required>
                            <option value="">Pilih Role</option>
                            <?php foreach ($roles as $role): ?>
                                <option <?php  echo isset($user->role) && $user->role == $role->id ? 'selected' : ''; ?>
                                        value="<?php echo $role->id; ?>">
                                    <?php echo ucfirst($role->role_name); ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password"
                               class="form-control col-md-7 col-xs-12"
                               type="password" name="password"
                               <?php echo isset($user->id) ? 'placeholder="Kosongkan password jika tidak ingin merubahnya"' : 'required' ?>
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Password Konfirmasi</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password_confirm"
                                <?php echo isset($user->id) ? 'placeholder="Kosongkan password jika tidak ingin merubahnya"' : 'required' ?>
                                data-parsley-equalto="#password"
                                class="form-control col-md-7 col-xs-12"
                                type="password"
                                name="password_confirm"
                        >
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Status</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="active" class="form-control" required>
                            <option value="1">Aktif</option>
                            <option <?php echo isset($user->active) && $user->active == 0 ? 'selected' : ''; ?> value="0">Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <a type="button" class="btn btn-primary" href="<?php route('user'); ?>">Cancel</a>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<js>
    <script>
    <?php if (isset($user->id)): ?>
        $('#password').change(function () {
            if ($(this).val().length > 0) {
                $('#password_confirm').attr('required', 'required');
            } else {
                $('#password_confirm').removeAttr('required');
            }
        });
    <?php endif; ?>
    </script>
</js>