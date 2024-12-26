<div class="modal fade" id="employee-model" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">New Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="employee.php" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="hidden" name="idcard" required value="<?= idgen("EMP","emp_id")?>">
                                <input type="text" name="name" placeholder="Employee Name" class="form-control em_name" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="number" name="phone" placeholder="Employee Phone" class="form-control em_phone" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="text" name="position" placeholder="Employee Position" class="form-control" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="text" name="salary" placeholder="Employee Salary" class="form-control" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" id="add_emp" class="btn btn-primary" name="add_employee" value="CREATE EMPLOYEE">
            </div>
            </form>
        </div>
    </div>
</div>


<!-- update -->


<div class="modal fade" id="employee-model-update" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">Update Employee</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="employee.php" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="hidden" name="id" class="form-control id-u">
                                <input type="text" name="name" placeholder="employee Name" class="form-control name-u em_name" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="number" name="phone" placeholder="employee Phone" class="form-control phone-u em_phone" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="text" name="position" placeholder="Employee Position" class="form-control position-u" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="text" name="salary" placeholder="Employee Salary" class="form-control salary-u " required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit"  id="up_emp"class="btn btn-primary" name="upd_employee" value="UPDATE EMPLOYEE">
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    let em_name = document.querySelectorAll(".em_name")
    let em_phone = document.querySelectorAll(".em_phone")
    let add_emp = document.querySelector("#add_emp")
    let up_emp = document.querySelector("#up_emp")
    let em_name_btn = false
    let em_phone_btn = false

    // employee name
    em_name.forEach((fullname)=>{
        fullname.addEventListener("input",()=>{
        // console.log(val_fullname.value.split(" ").length - 1);

            if(fullname.value.split(" ").length - 1 < 2){
                fullname.classList.remove("is-valid")
                fullname.classList.add("is-invalid")
                fullname.nextElementSibling.classList = "invalid-feedback"
                fullname.nextElementSibling.innerHTML = "Username Must Be At Least 3 Words";
                em_name_btn = true
                disable_button()
            }else{
                fullname.classList.remove("is-invalid")
                fullname.classList.add("is-valid")
                fullname.nextElementSibling.classList = "valid-feedback"
                fullname.nextElementSibling.innerHTML = "";
                em_name_btn = false
                disable_button()
            }
        })
    })

    em_phone.forEach((phone)=>{
        phone.addEventListener("input",()=>{
            // console.log(phone.value.length);
            
            if(phone.value.length < 9 || phone.value.length >9){
                
                phone.classList.remove("is-valid")
                phone.classList.add("is-invalid")
                phone.nextElementSibling.classList = "invalid-feedback"
                phone.nextElementSibling.innerHTML = "Invalid phone number , please don't start with 0";
                em_phone_btn = true
                disable_button()
                
            }else{
                $.ajax({
                    type: "POST",
                    url: 'includes/ajax.php',
                    data: {table:`employee`,name:phone.value,col:"phone",action:'is_exist'},
                    success: function(response)
                    {
                        var res = JSON.parse(response);
                        // console.log(res.length);
                        // console.log(res[0].username);
                            // console.log(val_b_types.value.toUpperCase() + " = " + res[0].username.toUpperCase());
                        if(res.length == 0){
                            // phone.value = phone.value.slice(0,9)
                            phone.classList.remove("is-invalid")
                            phone.classList.add("is-valid")
                            phone.nextElementSibling.classList = "valid-feedback"
                            phone.nextElementSibling.innerHTML = "";
                            em_phone_btn = false
                            disable_button()
                            
                        }else{
                            
                            
                            phone.classList.remove("is-valid")
                            phone.classList.add("is-invalid")
                            phone.nextElementSibling.classList = "invalid-feedback"
                            phone.nextElementSibling.innerHTML = "This Phone Already Exists";
                            em_phone_btn = true
                            disable_button()
                        }
                    }
                })
            }
        })
    })





    function disable_button(){
        if(em_name_btn == false && em_phone_btn == false ){
            up_emp.disabled = false;
            add_emp.disabled = false;
        }else{
            up_emp.disabled = true;
            add_emp.disabled = true;
        }
    }
</script>