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
                            echo "<i class='fa fa-inr'></i> 0";
                            } else {
                             echo  "<i class='fa fa-inr'></i> ". $todayExpenseCost;
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
                        foreach($yesterdayExpense as $row) {

                            $yesterdayExpenseCost = $yesterdayExpenseCost+$row['ExpenseCost']; 
                        }
                    ?>
                    <div class="easypiechart" id="easypiechart-orange" data-percent="<?php echo $yesterdayExpenseCost; ?>">
                        <span class="percent">
                            <?php if ($yesterdayExpenseCost == "") {
                                echo "<i class='fa fa-inr'></i> 0";
                            } else {
                            echo "<i class='fa fa-inr'></i> " .$yesterdayExpenseCost;
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
                    <?php
                        $last7daysExpenseCost = 0;
                        foreach($last7daysExpense as $row) {

                            $last7daysExpenseCost = $last7daysExpenseCost+$row->ExpenseCost; 
                        }
                    ?>
                    <div class="easypiechart" id="easypiechart-teal" data-percent="<?php echo 0; ?>">
                        <span class="percent">
                            <?php if ($last7daysExpense == "") {
                             echo "<i class='fa fa-inr'></i> 0";
                                } else {
                                echo "<i class='fa fa-inr'></i>".$last7daysExpenseCost;
                                }
                             ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-xs-6 col-md-3">
            <div class="panel panel-default">
                <?php
                    $last30daysExpenseCost = 0;
                    foreach($last30daysExpense as $row) {

                        $last30daysExpenseCost = $last30daysExpenseCost+$row->ExpenseCost; 
                    }
                    ?>
                <div class="panel-body easypiechart-panel">
                    <h4>Last 30day's Expenses</h4>
                    <div class="easypiechart" id="easypiechart-red" data-percent="<?php echo 0; ?>">
                    <span class="percent">
                        <?php if (empty($last30daysExpense)) {
                                echo "<i class='fa fa-inr'></i> 0";
                             } else {
                                echo $last30daysExpenseCost;
                             }
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
                        foreach($thisYearExpense as $row) {

                            $thisYearExpenseCost = $thisYearExpenseCost+$row['ExpenseCost']; 
                        }
                    ?>
                    <div class="easypiechart" id="easypiechart-green" data-percent="<?php echo $thisYearExpenseCost; ?>">
                        <span class="percent">
                        <?php if ($thisYearExpenseCost == "") {
                                echo "<i class='fa fa-inr'></i> 0";
                            } else {
                                echo "<i class='fa fa-inr'></i> ". $thisYearExpenseCost;
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
                        foreach($totalExpense as $row) {

                            $totalExpenseCost = $totalExpenseCost+$row['ExpenseCost']; 
                        }
                    ?>
                    <div class="easypiechart" id="easypiechart" data-percent="<?php echo $totalExpenseCost; ?>">
                    <span class="percent">
                        <?php if ($totalExpenseCost == "") {
                                echo "<i class='fa fa-inr'></i> 0";
                            } else {
                                echo "<i class='fa fa-inr' aria-hidden=true></i>' ". $totalExpenseCost;
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