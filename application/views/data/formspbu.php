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
                  action="<?php isset($data->id) ? route("data/save", $data->id): route("data/savespbu"); ?>"
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
                <!--                <div class="form-group">-->
                <!--                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">soal</label>-->
                <!--                    <div class="col-md-6 col-sm-6 col-xs-12">-->
                <!--                        <textarea value="" class="form-control" rows="5" name="soal" required>--><?php //show_ifset($data->soal);?><!--</textarea>-->
                <!--                    </div>-->
                <!--                </div>-->
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">REGIONAL</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->regional);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="regional" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Witel</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->witel);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="witel" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Kode SPBU</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input value="<?php show_ifset($data->kodespbu);?>"
                               class="form-control col-md-7 col-xs-12"
                               type="text" name="kodespbu" required>
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
                            <option value=""><?php show_ifsetoption($data->kota)?></option>
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
                                <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" checked="checked" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> Instalasi
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="">
                                <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" checked="checked" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> BAPP
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="">
                                <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" checked="checked" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> WFM
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="">
                                <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" checked="checked" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> power on
                            </label>
                        </div>
                        <div class="checkbox">
                            <label class="">
                                <div class="icheckbox_flat-green" style="position: relative;"><input type="checkbox" class="flat" checked="checked" style="position: absolute; opacity: 0;"><ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins></div> kirim ke HO
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
                        <input value="<?php show_ifset($data->tanggal_start_instalasi, date('d-m-Y'), true); ?>" type="text" name="tanggal_start_instalasi" required class="datepicker form-control col-md-7 col-xs-12">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">selesai instalasi
                    </label>
                    <div class="col-md-3 col-sm-3 col-xs-12">
                        <input value="<?php show_ifset($data->tanggal_selesai_instalasi, date('d-m-Y'), true); ?>" type="text" name="tanggal_selesai_instalasi" required class="datepicker form-control col-md-7 col-xs-12">
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

<css>
    <link href="<?php assets('css/green.css') ?>"" rel="stylesheet">
    <link href="<?php assets('css/switchery.min.css') ?>"" rel="stylesheet">
    <link href="<?php assets('css/custom.min.css') ?>"" rel="stylesheet">
</css>

<js>
    <script src="<?php assets('js/icheck.min.js') ?>"></script>
    <script src="<?php assets('js/switchery.min.js') ?>"></script>
    <script src="<?php assets('js/custom.min.js') ?>"></script>

</js>