<?php

use core\classes\Store;
use core\models\Employeer;

$employee = new Employeer();

$list_employee = $employee->list_employee();
$ava = $employee->average_age();
$list_proj_conc = $employee->state_project();

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
                    <label><strong>List (Employee - Job): </strong></label>
                    <div class="col-2 my-3">
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



                <div class="row my-3">
                    <label><strong>List of projects pending between: </strong></label>
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
                        <input type="submit" name="submit4" value="Submit" class="btn btn-primary">
                    </div>
                    <div style="margin-top:1rem;">
                        
                        
                        <?php if (isset($_POST['submit4'])) : ?>   
                            <?php
                                $data1 = implode("/",array_reverse(explode("-",$_POST['date_1'])));
                                $data2 = implode("/",array_reverse(explode("-",$_POST['date_2'])));
                             ?>
                            <?php $list_proj_pend = $employee->project_pend(($data1), ($data2)); ?>
                            <?php foreach ($list_proj_pend as $b) : ?>
                            
                                <ul class="list-group list-group-horizontal">

                                    <li class="list-group-item"><?= $b->description ?></li>
                                    <li class="list-group-item">Value: <?= $b->value ?> €</li>
                                    <li class="list-group-item">Delivery Date: <?= $b->delivery_date ?></li>

                                </ul>
                            <?php endforeach; ?>

                        <?php endif; ?>


                    </div>

                </div>


                <div class="row my-3">
                    <label><strong> List Project (Completed): </strong> </label>
                    <div class="col-2 my-3">
                        <input type="submit" name="submit3" value="Submit" class="btn btn-primary">
                    </div>
                    <div>

                        <table class="table">
                            <?php if (isset($_POST['submit3'])) : ?>
                                <thead>
                                    <tr>
                                        <th scope="col">Description</th>
                                        <th scope="col">Value</th>
                                        <th scope="col">Delivery Date</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php foreach ($list_proj_conc as $b) : ?>
                                        <tr>
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