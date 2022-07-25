<?= $this->extend('app') ?>
<?= $this->section('main-body') ?>
<?php require(APPPATH . 'views/dashboard/include/sidebar.php') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Expense</li>
        </ol>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading"> <?= session('user_name')?> s'Expense</div>

                <div class="panel-body">
                    
                <!--success message -->
                <?php if (session()->getFlashdata('success')) { ?>
                    <p class="alert alert-success text-center"><?= session()->getFlashdata('success'); ?></p>
                <?php } ?>
                <!--error message -->
                <?php if (session()->getFlashdata('error')) { ?>
                    <p class="alert alert-danger text-center"><?= session()->getFlashdata('error'); ?></p>
                <?php } ?>

                    <div class="col-md-12">

                        <div class="table-responsive">
                            <table class="table table-bordered mg-b-0">
                                <thead>
                                    <tr>
                                        <th>S.NO</th>
                                        <th>Expense Item</th>
                                        <th>Expense Cost</th>
                                        <th>Expense Date</th>
                                        <th>Posting Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <?php
                                if ($count) :
                                    $cnt = 1;
                                    foreach ($expenses as $row) :
                                ?>
                                        <tbody>
                                            <tr>
                                                <td><?php echo $cnt; ?></td>

                                                <td><?php echo $row['ExpenseItem']; ?></td>
                                                <td><?php echo $row['ExpenseCost']; ?></td>
                                                <td><?php echo $row['ExpenseDate']; ?></td>
                                                <td><?php echo $row['NoteDate'] ?></td>
                                                <td><?php echo anchor("Expenses/delete/{$row['ID']}", 'Delete'); ?>

                                                </td>
                                            </tr>
                                        <?php
                                        $cnt = $cnt + 1;
                                    endforeach;
                                else :
                                        ?>
                                        <tr>
                                            <td colspan="5" style="color:red; text-align:center">No Record found</td>
                                        </tr>
                                    <?php endif; ?>

                                        </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div><!-- /.panel-->

        </div><!-- /.col-->
        <!-- might be below footer -->
    </div><!-- /.row -->
</div>
<!--/.main-->
<?= $this->endSection() ?>