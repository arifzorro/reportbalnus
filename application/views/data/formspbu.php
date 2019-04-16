<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>SPBU REPORT<small>NTB</small></h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br>
            <form data-parsley-validate
                  class="form-horizontal form-label-left"
                  method="post"
                  action="<?php isset($data->id) ? route("data/save_spbu", $data->id): route("data/save_spbu"); ?>"
            >
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Tanggal create
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input value="<?php show_ifset($data->tanggal, date('d-m-Y'), true); ?>" type="text" name="tanggal" required class="datepicker form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">REGIONAL</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" class="form-control" readonly="readonly" placeholder="Regional 5" name="regional" value="Regional 5">
                    </div>
                </div>

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Witel</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="heard" class="form-control" required="" name="witel">
                            <option value="<?php show_ifsetoption($data->witel)?>" name="<?php show_ifsetoption($data->witel)?>"><?php show_ifsetoption($data->witel)?></option>
                            <option value="Mataram" name="Mataram">Mataram</option>
                            <option value="Kupang" name="Kupang">Kupang</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kode SPBU</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->kode_spbu);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="kode_spbu" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Alamat</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->alamat);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="alamat" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kota</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <select id="heard" class="form-control" required="" name="kota">
                            <option value="<?php show_ifsetoption($data->kota)?>" name="<?php show_ifsetoption($data->kota)?>"><?php show_ifsetoption($data->kota)?></option>
                            <option value="Mataram" name="Mataram">Mataram</option>
                            <option value="Lombok Timur" name="Lombok Timur">Lombok Timur</option>
                            <option value="Lombok Barat" name="Lombok Barat">Lombok Barat</option>
                            <option value="Lombok Tengah" name="Lombok Tengah">Lombok Tengah</option>
                            <option value="Lombok Utara" name="Lombok Utara">Lombok Utara</option>
                            <option value="Sumbawa" name="Sumbawa">Sumbawa</option>
                            <option value="Bima" name="Bima">Bima</option>
                            <option value="Dompu" name="Dompu">Dompu</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 col-sm-3 col-xs-12 control-label">status
                    </label>

                    <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="checkbox">
                            <label class="">
                                <div class="icheckbox_flat-green" style="position: relative; value=":;">
                                    <input type="checkbox" name=instalasi value="instalasi" class="flat" <?php show_ifset_checkbar($data->instalasi) ?> style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div> Instalasi
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="">
                                <div class="icheckbox_flat-green" style="position: relative;">
                                    <input type="checkbox" name="bapp" value="bapp" class="flat" <?php show_ifset_checkbar($data->bapp) ?> style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div> BAPP
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="">
                                <div class="icheckbox_flat-green" style="position: relative;">
                                    <input type="checkbox" name="wfm" value="wfm" class="flat" <?php show_ifset_checkbar($data->wfm) ?> style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div> WFM
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="">
                                <div class="icheckbox_flat-green" style="position: relative;">
                                    <input type="checkbox" name="power" value="power" class="flat" <?php show_ifset_checkbar($data->power) ?> style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div> power on
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="">
                                <div class="icheckbox_flat-green" style="position: relative;">
                                    <input type="checkbox" name="kirim_ho" value="kirim_ho" class="flat" style="position: absolute; opacity: 0;">
                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                </div> kirim ke HO
                            </label>
                        </div>

                    </div>
                </div>

                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Mitra</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->mitra);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="mitra" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">start instalasi
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input value="<?php show_ifset($data->start_instalasi, date('d-m-Y'), true); ?>" type="text" name="start_instalasi" required class="datepicker form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">selesai instalasi
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input value="<?php show_ifset($data->selesai_instalasi, date('d-m-Y'), true); ?>" type="text" name="selesai_instalasi" required class="datepicker form-control col-md-7 col-xs-12">
                    </div>
                </div>
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

<css>
    <link href="<?php assets('css/green.css') ?>"" rel="stylesheet">
<!--    <link href="--><?php //assets('css/switchery.min.css') ?><!--"" rel="stylesheet">-->
<!--    <link href="--><?php //assets('css/custom.min.css') ?><!--"" rel="stylesheet">-->
</css>

<js>
    <script src="<?php assets('js/icheck.min.js') ?>"></script>
<!--    <script src="--><?php //assets('js/switchery.min.js') ?><!--"></script>-->
    <script src="<?php assets('js/custom.min.js') ?>"></script>
<!--    <script src="--><?php //assets('js/gethtmldatawithajax/saveformwithajax.js') ?><!--"></script>-->

</js>

