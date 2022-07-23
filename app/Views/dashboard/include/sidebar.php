<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            Dashboard
            <div class="profile-usertitle-name"><?= session('user_name') ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="active"><a href="<?php base_url('dashboard'); ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>

        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="<?= base_url('Expenses/add'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Expenses
                    </a></li>
                <li><a class="" href="<?= base_url('Expenses/list'); ?>">
                    <span class="fa fa-arrow-right">&nbsp;</span> All Expenses
                </a></li>
                <li><a class="" href="<?= base_url('Expenses/manage'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Manage Expenses
                    </a></li>
            </ul>

        </li>

        <li class="parent "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-navicon">&nbsp;</em>Expense Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li><a class="" href="<?= base_url('report/datewise'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Daywise Expenses
                    </a></li>
                <li><a class="" href="<?= base_url('report/monthwise'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Monthwise Expenses
                    </a></li>
                <li><a class="" href="<?= base_url('report/yearwise'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Yearwise Expenses
                    </a></li>

            </ul>
        </li>
        <li><a href="<?= base_url('Profile'); ?>"><em class="fa fa-user">&nbsp;</em> Profile</a></li>
        <li><a href="<?= base_url('changePassword'); ?>"><em class="fa fa-clone">&nbsp;</em> Change Password</a></li>
        <li><a href="<?= base_url('logout'); ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div>