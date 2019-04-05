<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
    <div class="menu_section">
        <ul class="nav side-menu">
            <li>
                <a href="<?php route('data/inputdatagpon'); ?>">
                    <i class="fa fa-upload"></i> Input Gpon
                </a>
            </li>

            <li>
                <a href="<?php route('data'); ?>">
                    <i class="fa fa-file"></i> Semua Data
                </a>
            </li>
            <li>
                <a href="<?php route('data/logbook'); ?>">
                    <i class="fa fa-upload"></i> Input Logbook
                </a>
            </li>
            <li>
                <a href="<?php route('data/listlog'); ?>">
                    <i class="fa fa-upload"></i> Logbook
                </a>
            </li>
            <?php if ($this->auth->is_administrator()): ?>
                <li>
                    <a href="<?php route('user'); ?>">
                        <i class="fa fa-user"></i> User/Pelaksana
                    </a>
                </li>
            <?php endif; ?>
            <li class=""><a><i class="fa fa-edit"></i> Graphic kunjungan <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu" style="display: none;">
                    <li><a href="<?php route('data/chart'); ?>">General Form</a></li>
<!--                    <li><a href="form_advanced.html">Advanced Components</a></li>-->
<!--                    <li><a href="form_validation.html">Form Validation</a></li>-->
<!--                    <li><a href="form_wizards.html">Form Wizard</a></li>-->
<!--                    <li class="current-page"><a href="form_upload.html">Form Upload</a></li>-->
<!--                    <li><a href="form_buttons.html">Form Buttons</a></li>-->
                </ul>
            </li>
            <li>
                <a href="<?php route('data/input_gpon'); ?>">
                    <i class="fa fa-upload"></i> GPON
                </a>
            </li>
        </ul>
    </div>
</div>
