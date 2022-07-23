<?= $this->extend('app') ?>
<?= $this->section('main-body') ?>
<?php require(APPPATH . 'views/dashboard/include/sidebar.php') ?>
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
            <div class="panel-heading">Datewise Expense Report</div>
            <div class="panel-body">
                <div class="col-md-12">
                    <h5 align="center" style="color:blue">Datewise Expense Report from <?php echo $fromdate; ?> to <?php echo $todate; ?></h5>
                    <hr />
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                            <tr>
                                <th>S.NO</th>
                                <th>Date</th>
                                <th>Expense Amount</th>
                            </tr>
                            </tr>
                        </thead>
                        <?php
                        if (count($reportdetails)) :
                            $cnt = 1;
                            foreach ($reportdetails as $row) :

                        ?>

                                <tr>
                                    <td><?php echo $cnt; ?></td>

                                    <td><?php echo $row->ExpenseDate; ?></td>
                                    <td><?php echo $ttlsl = $row->ExpenseCost; ?></td>


                                </tr>
                            <?php
                                $totalsexp += $ttlsl;
                                $cnt = $cnt + 1;
                            endforeach; ?>

                            <tr>
                                <th colspan="2" style="text-align:center">Grand Total</th>
                                <td><?php echo $totalsexp; ?></td>
                            </tr>
                        <?php else : ?>
                            <tr>
                                <th colspan="3" style="text-align:center; color:red">No Record Found</th>

                            </tr>
                        <?php endif; ?>
                    </table>

                </div>
            </div>
        </div><!-- /.panel-->

    </div><!-- /.col-->
    <!-- might be below footer -->
</div><!-- /.row -->
</div>
<!--/.main-->
<?= $this->endSection() ?>