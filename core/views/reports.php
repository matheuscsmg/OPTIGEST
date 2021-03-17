<?php

use core\models\Employeer;

$employee = new Employeer();

$list_employee = $employee->list_employee();
$ava = $employee->average_age();
$list_proj_conc = $employee->project_comp();

foreach ($ava as $a) {
    foreach ($a as $value) {
        $result = $value;
    }
}
?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h3 class="text-center">Reports</h3>

            <form action="?a=reports" method="post">

                <div class="description my-5">
                    <div>
                        <label for="description"><strong>Calculate average age of employees:</strong>&nbsp;
                            <span class="badge bg-primary" style="font-size:20px">

                                <?= intval($result); ?>

                            </span>
                        </label>

                    </div>

                </div>


                <div class="row">
                    <label><strong>Salary Simulator: </strong></label>
                    <div class="col-5">
                        <select class="form-control" id="sal_emp" name="sal_emp">
                            <option selected disabled value="">Select employee</option>
                            <?php foreach ($list_employee as $emp) : ?>
                                <option value="<?= $emp->salary ?>"> <?= $emp->name ?> - <?= $emp->salary ?>€ </option>
                            <?php endforeach; ?>
                            <?php
                            $employee->set_salary($_POST['sal_emp']);
                            ?>
                        </select>
                    </div>
                    <div class="col-1">
                        <h3>+</h3>
                    </div>
                    <div class="col-3">
                        <label class="visually-hidden" for="perc"></label>
                        <div class="input-group">
                            <input type="number" name="perc" class="form-control" id="perc" min="0" value="0">
                            <div class="input-group-text">%</div>
                        </div>
                    </div>
                    <div class="col-3">
                        <input type="submit" name="submit" value="Submit" class="btn btn-primary">
                    </div>
                    <div style="margin-top:1rem;">
                        <p>Result: <span class="badge bg-primary" style="font-size:20px">
                                <?php
                                if (isset($_POST['submit'])) {
                                    echo $employee->up_salary($_POST['perc']);
                                } else {
                                    echo '0';
                                };

                                ?>
                            </span></p>
                    </div>
                </div>


                <div class="row my-3">
                    <div class="button-lign">
                        <label><strong>List (Employee - Job): </strong></label>
                        <input type="submit" name="submit2" value="List" class="btn btn-primary">
                    </div>
                    <div>
                        <?php if (isset($_POST['submit2'])) : ?>
                            <ul class="list-group">
                                <?php foreach ($list_employee as $emp) : ?>
                                    <li class="list-group-item">
                                        <?= $emp->name ?> - <?= $emp->job ?>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php endif; ?>
                    </div>
                </div>
                

                <div class="row my-5">
                    <label><strong>List of projects pending between: </strong></label>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="date" name="date_1" class="form-control">
                        </div>
                    </div>
                    <div class="col-1">
                        <h3>-</h3>
                    </div>
                    <div class="col-4">
                        <div class="input-group">
                            <input type="date" name="date_2" class="form-control">
                        </div>
                    </div>
                    <div class="col-2">
                        <input type="submit" name="submit4" value="Submit" class="btn btn-primary">
                    </div>
                    <div style="margin-top:1rem;">

                        <table class="table">
                            <?php if (isset($_POST['submit4'])) : ?>
                                <?php $list_proj_pend = $employee->project_pend(($_POST['date_1']), ($_POST['date_2'])); ?>
                                <thead>
                                    <tr>
                                        <th scope="col">Employee</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Delivery Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                <?php foreach ($list_proj_pend as $b) : ?>
                                        <tr>
                                            <td><?=$b->name ?></td>
                                            <td><?= $b->description ?></td>
                                            <td><?= $b->value ?> €</td>
                                            <td><?= $b->delivery_date ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php endif; ?>
                        </table>

                    </div>

                </div>

                <div class="row">
                    <div class="button-lign" >
                        <label><strong> List Project (Completed): </strong> </label>
                        <input type="submit" name="submit3" value="List" class="btn btn-primary">
                    </div>
                    <div>

                        <table class="table">
                            <?php if (isset($_POST['submit3'])) : ?>
                                <thead>
                                    <tr>
                                        <th scope="col">Employee</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Delivery Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($list_proj_conc as $b) : ?>
                                        <tr>
                                            <td><?=$b->name ?></td>
                                            <td><?= $b->description ?></td>
                                            <td><?= $b->value ?> €</td>
                                            <td><?= $b->delivery_date ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php endif; ?>
                        </table>
                    </div>
                </div>
                                   
            </form>

        </div>
    </div>
</div>
</body>

</html>