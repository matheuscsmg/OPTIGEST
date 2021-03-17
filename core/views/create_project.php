<?php

use core\models\Employeer;
$employee = new Employeer();
$list_employee = $employee->list_employee();


?>

<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h3 class="text-center">New Project</h3>

            <form action="?a=create_project" method="post">

                <div class="description my-3" >
                    <label for="description">Description: </label>
                    <textarea rows="4" style="width: 100%" id="description" name="description" required></textarea>
                </div>

                <div class="state -my-3">
                    <label>State</label><br>
                    <label style="margin-right:1rem!important;">
                        <input type="radio" name="state" value="completed" checked>Completed
                    </label>
                    <label style="margin-right:1rem!important;">
                        <input type="radio" name="state" value="under">Under development
                    </label>
                    <label style="margin-right:1rem!important;">
                        <input type="radio" name="state" value="pending">Pending
                    </label>
                </div>

                <div class="my-3">
                    <label>Project value</label>
                    <input type="number" name="value_proj" placeholder="Value (0,00)" class="form-control" required>
                </div>

                <div class="my-3">
                    <label>Delivery Date</label>
                    <input type="date" name="text_dv_date" placeholder="Date" class="form-control" required>
                </div>

                <div class="campo my-3">
                    <label for="link_emp">Link employee: </label>
                    <select id="link_emp" name="link_emp" required>
                        <option selected disabled value="">Select</option>
                        <?php foreach ($list_employee as $employee) : ?>
                            <option value="<?= $employee->id ?>"> <?= $employee->name ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>



                <div class="my-4">
                    <input type="submit" value="Create project" class="btn btn-primary">
                </div>


            </form>

        </div>
    </div>
</div>

</body>
</html>