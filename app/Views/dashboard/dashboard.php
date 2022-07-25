<?= $this->extend('dashboard/index') ?>
<?= $this->section('dashboard-body') ?>

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-3">

            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>Today's Expense</h4>
                    
                    <?php 
                    $todayExpenseCost = 0;
                    foreach($todayExpense as $row) {

                        $todayExpenseCost = $todayExpenseCost+$row['ExpenseCost']; 
                    }
                    ?>
                    <div class="easypiechart" id="easypiechart-blue" data-percent="<?php echo $todayExpenseCost; ?>">
                    <span class="percent">
                        <?php if ($todayExpenseCost == "") {
                            echo "0";
                            } else {
                             echo $todayExpenseCost;
                             }?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>Yesterday's Expense</h4>
                    <?php
                        $yesterdayExpenseCost = 0;
                        foreach($todayExpense as $row) {

                            $yesterdayExpenseCost = $yesterdayExpenseCost+$row['ExpenseCost']; 
                        }
                    ?>
                    <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $yesterdayExpenseCost; ?>">
                        <span class="percent">
                            <?php if ($yesterdayExpenseCost == "") {
                                echo "0";
                            } else {
                            echo $yesterdayExpenseCost;
                            } ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <div class="panel-body easypiechart-panel">
                    <h4>Last 7day's Expense</h4>
                    <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo 0; ?>">
                        <span class="percent">
                            <?php //if ($last7Expense == "") {
                             echo "0";
                            //  } else {
                            //  echo $last7Expense;
                            //  }
                             ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">

                <div class="panel-body easypiechart-panel">
                    <h4>Last 30day's Expenses</h4>
                    <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo 0; ?>">
                    <span class="percent">
                        <?php //if ($last30Expense == "") {
                                echo "0";
                            // } else {
                            //     echo $last30Expense;
                            // }
                        ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">

                <div class="panel-body easypiechart-panel">
                    <h4>Current Year Expenses</h4>
                    <?php
                        $thisYearExpenseCost = 0;
                        foreach($todayExpense as $row) {

                            $thisYearExpenseCost = $thisYearExpenseCost+$row['ExpenseCost']; 
                        }
                    ?>
                    <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $thisYearExpenseCost; ?>">
                        <span class="percent">
                        <?php if ($thisYearExpenseCost == "") {
                                echo "0";
                            } else {
                                echo "(Rs) ". $thisYearExpenseCost;
                            }
                        ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">

                <div class="panel-body easypiechart-panel">
                    <h4>Total Expenses</h4>
                    <?php
                        $totalExpenseCost = 0;
                        foreach($todayExpense as $row) {

                            $totalExpenseCost = $totalExpenseCost+$row['ExpenseCost']; 
                        }
                    ?>
                    <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo $totalExpenseCost; ?>">
                    <span class="percent">
                        <?php if ($totalExpenseCost == "") {
                                echo "0";
                            } else {
                                echo "(Rs) ". $totalExpenseCost;
                            }
                            ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->

<?= $this->endSection() ?>