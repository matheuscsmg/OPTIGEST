<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h3 class="text-center">New Employee</h3><br>


            <form action="?a=create_employee" method="post">

                <div class="my-3">
                    <label>Name</label>
                    <input type="text" name="text_name" placeholder="Full Name" class="form-control" required>
                </div>

                <div class="my-3">
                    <label>Age</label>
                    <input type="number" name="text_age" placeholder="Fill in your age" class="form-control" required>
                </div>

                <div class="my-3">
                    <label>Job</label>
                    <input type="text" name="text_job" placeholder="Office" class="form-control" required>
                </div>

                <div class="my-3">
                    <label>Salary</label>
                    <input type="text" name="text_salary" placeholder="Salary (0,00)" class="form-control" required>
                </div>

                <div class="my-3">
                    <label>Admission Date</label>
                    <input type="date" name="text_ad_date" placeholder="Date" class="form-control" required>
                </div>

                <div class="button-lign">
                        <input type="submit" name="create" value="Create employee" class="btn btn-primary">
                        <a href="?a=home">
                            <input type="button" name="back" value="Back" class="btn btn-primary">
                        </a>
                        
                        <?php if (isset($_POST['create'])) : ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Employee successfully registered !</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php endif; ?> 
                </div>

            </form>

        </div>
    </div>
</div>

</body>

</html>