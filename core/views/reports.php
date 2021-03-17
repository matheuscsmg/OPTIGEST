<?php

use core\models\Employeer;

$employee = new Employeer();
$list_employee = $employee->list_employee();
$ava = $employee->average_age();
foreach ($ava as $a) {
    foreach ($a as $value) {
        $result = $value;
    }
}
global $calc;
?>


<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h3 class="text-center">Reports</h3>

            <form action="?a=reports" method="post">

                <div class="description my-5">
                    <div>
                        <label for="description">Calculate average age of employees:&nbsp;
                            <span class="badge bg-primary" style="font-size:20px">

                                <?= intval($result); ?>

                            </span>
                        </label>

                    </div>

                </div>

                <div class="row">
                    <label>Salary Simulator: </label>
                    <div class="col-5">
                        <select class="form-control" id="sal_emp" name="sal_emp" required>
                            <option selected disabled value="">Select employee</option>
                            <?php foreach ($list_employee as $employee) : ?>
                                <option value="<?= $employee->salary ?>"> <?= $employee->name ?> - <?= $employee->salary ?>€ </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-1">
                        <h3>+</h3>
                    </div>
                    <div class="col-3">
                        <label class="visually-hidden" for="perc"></label>
                        <div class="input-group">
                            <input type="number" name="perc" class="form-control" id="perc">
                            <div class="input-group-text">%</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <input type="submit" value="Submit" class="btn btn-primary">
                        <?php
                        if (isset($_POST['submit'])) {
                            $employee2 = new Employeer();
                            $employee2->set_salary($_POST['sal_emp']);
                            $perc = ($_POST['perc']);
                            $calc = $employee->up_salary($perc);
                            
                        }

                        ?>
                    </div>
                    <div style="margin-top:1rem;">
                        <p>Result: <span class="badge bg-primary" style="font-size:20px"><?= 0 ?></span></p>
                    </div>
                </div>

                <!-- <div class="row my-3">
                    <label>List of projects pending between: </label>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="date" name="date_1" class="form-control" value="date_1">
                        </div>
                    </div>
                    <div class="col-1">
                        <h3>-</h3>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="date" name="date_2" class="form-control" value="date_2">
                        </div>
                    </div>
                    <div class="col-2">
                        <input type="submit" value="Submit" class="btn btn-primary">
                    </div>
                    <div style="margin-top:1rem;">
                        <p>Result: </p>
                    </div> -->
                    
                </div>

            </form>

        </div>
    </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>

</body>

</html>