<div class="container">
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            <h3 class="text-center">New Employeer</h3><br>


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


                <div class="my-4">
                    <input type="submit" value="Create employee" class="btn btn-primary">                 
                </div>

            </form>

        </div>
    </div>
</div>

<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/app.js"></script>

</body>
</html>