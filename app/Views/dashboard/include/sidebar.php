<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="https://th.bing.com/th/id/OIP.Mimjn5PGZo50szD7_ApU8gHaLJ?pid=ImgDet&rs=1" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name"><?= session('user_name') ?></div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>
    <ul class="nav menu">
        <li class="<?php if(isset($dashboard)){echo $dashboard;}?>"><a href="<?= base_url('dashboard'); ?>"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>

        <li class="parent <?php if(isset($expense)){echo $expense;}?>"><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em>Expenses <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li class="active"><a class="" href="<?= base_url('Expenses/add'); ?>">
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

        <li class="parent <?php if(isset($report)){echo $report;}?> "><a data-toggle="collapse" href="#sub-item-2">
                <em class="fa fa-navicon">&nbsp;</em>Expense Report <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-2">
                <li><a class="" href="<?= base_url('report/datewise'); ?>">
                        <span class="fa fa-arrow-right">&nbsp;</span> Daywise Expenses
                </a></li>
            </ul>
        </li>
        <li class="<?php if(isset($profile)){echo $profile;}?>"><a href="<?= base_url('Profile'); ?>"><em class="fa fa-user">&nbsp;</em> Profile</a></li>

        <li class="<?php if(isset($changePassword)){echo $changePassword;}?>"><a href="<?= base_url('changePassword'); ?>"><em class="fa fa-clone">&nbsp;</em> Change Password</a></li>
        <li><a href="<?= base_url('logout'); ?>"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div>