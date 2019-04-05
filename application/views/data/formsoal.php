<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>FORM TAMBAH SOAL<small>tambah data</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form data-parsley-validate
                  class="form-horizontal form-label-left"
                  method="post"
                  action="<?php isset($data->id_soal) ? route("data/save", $data->id_soal ): route("data/save"); ?>"
            >

<!--                <div class="form-group">-->
<!--                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nama Vendor-->
<!--                    </label>-->
<!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                        <input disabled value="--><?php //echo $vendor->nama?><!--" type="text" required class="form-control col-md-7 col-xs-12">-->
<!--                        <input name="vendor_id" type="hidden" value="--><?php //echo $vendor->id; ?><!--">-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal create
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input value="<?php show_ifset($data->tanggal, date('d-m-Y'), true); ?>" type="text" name="tanggal" required class="datepicker form-control col-md-7 col-xs-12">
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">soal</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea value="" class="form-control" rows="5" name="soal" required><?php show_ifset($data->soal);?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">pilihan A</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->a);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="a" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">pilihan B</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->b);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="b" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">pilihan C</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->c);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="c" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">pilihan D</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->d);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="d" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">pilihan E</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->e);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="e" required>
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">kategori</label>-->
<!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                        <select class="custom-select d-block w-100" id="state" required="">-->
<!--                            <option name="tkp">TKP</option>-->
<!--                            <option name="twk">TWK</option>-->
<!--                        </select>-->
<!--                    </div>-->
<!--                </div>-->
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">kategori</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                <select id="heard" class="form-control" required="" name="kategori">
                    <option value="">Choose..</option>
                    <option value=twk name="twk">TWK</option>
                    <option value="tiu" name="tiu">TIU</option>
                    <option value="tkp" name="tkp">TKP</option>
                </select>
                    </div>
                </div>
<!--                <div class="form-group">-->
<!--                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">No Telp. Pelanggan</label>-->
<!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
<!--                        <input value="--><?php //show_ifset($data->pelanggan_telepon); ?><!--"-->
<!--                               class="form-control col-md-7 col-xs-12"-->
<!--                               type="text" name="pelanggan_telepon">-->
<!--                    </div>-->
<!--                </div>-->



                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Pelaksana <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input name="pelaksana" type="text" value="<?php show_ifset($data->pelaksana, $this->auth->get_name()); ?>" class="date-picker form-control col-md-7 col-xs-12" required>
                    </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button type="button" class="btn btn-primary" onclick="location.reload()">Cancel</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>