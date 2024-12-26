<div class="modal fade" id="customer-model" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">New Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="customer.php" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="hidden" name="idcard" value="<?= idgen("CUS","cus_id")?>">
                                <input type="text" name="name" placeholder="Customer Name" class="form-control cus_name" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="phone" name="phone" placeholder="Customer Phone" class="form-control cus_phone" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="finger" placeholder="Fingerprint Data" class="form-control" required>
                        <div class="invalid-feedback"></div>
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" id="add_cus" class="btn btn-primary" name="add_customer" value="CREATE CUSTOMER">
            </div>
            </form>
        </div>
    </div>
</div>


<!-- update -->


<div class="modal fade" id="customer-model-update" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">Update Customer</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="customer.php" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="hidden" name="id" class="form-control id-u">
                                <input type="text" name="name" placeholder="Customer Name" class="form-control name-u cus_name" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="phone" name="phone" placeholder="Customer Phone" class="form-control phone-u cus_phone" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group my-2">
                        <input type="text" name="finger" placeholder="Fingerprint Data" class="form-control finger-u" required>
                        <div class="invalid-feedback"></div>
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" id="up_cus" class="btn btn-primary" name="upd_customer" value="UPDATE CUSTOMER">
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    let cus_name = document.querySelectorAll(".cus_name")
    let cus_phone = document.querySelectorAll(".cus_phone")
    let add_cus = document.querySelector("#add_cus")
    let up_cus = document.querySelector("#up_cus")
    let cus_name_btn = false
    let cus_phone_btn = false

    // employee name
    cus_name.forEach((fullname)=>{
        fullname.addEventListener("input",()=>{
        // console.log(val_fullname.value.split(" ").length - 1);

            if(fullname.value.split(" ").length - 1 < 2){
                fullname.classList.remove("is-valid")
                fullname.classList.add("is-invalid")
                fullname.nextElementSibling.classList = "invalid-feedback"
                fullname.nextElementSibling.innerHTML = "Username Must Be At Least 3 Words";
                cus_name_btn = true
                disable_button()
            }else{
                fullname.classList.remove("is-invalid")
                fullname.classList.add("is-valid")
                fullname.nextElementSibling.classList = "valid-feedback"
                fullname.nextElementSibling.innerHTML = "";
                cus_name_btn = false
                disable_button()
            }
        })
    })

    cus_phone.forEach((phone)=>{
        phone.addEventListener("input",()=>{
            // console.log(phone.value.length);
            
            if(phone.value.length < 9 || phone.value.length >9){
                
                phone.classList.remove("is-valid")
                phone.classList.add("is-invalid")
                phone.nextElementSibling.classList = "invalid-feedback"
                phone.nextElementSibling.innerHTML = "Invalid phone number , please don't start with 0";
                cus_phone_btn = true
                disable_button()
                
            }else{
                $.ajax({
                    type: "POST",
                    url: 'includes/ajax.php',
                    data: {table:`customer`,name:phone.value,col:"phone",action:'is_exist'},
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
                            cus_phone_btn = false
                            disable_button()
                            
                        }else{
                            
                            
                            phone.classList.remove("is-valid")
                            phone.classList.add("is-invalid")
                            phone.nextElementSibling.classList = "invalid-feedback"
                            phone.nextElementSibling.innerHTML = "This Phone Already Exists";
                            cus_phone_btn = true
                            disable_button()
                        }
                    }
                })
            }
        })
    })





    function disable_button(){
        if(cus_name_btn == false && cus_phone_btn == false ){
            up_cus.disabled = false;
            add_cus.disabled = false;
        }else{
            up_cus.disabled = true;
            add_cus.disabled = true;
        }
    }
</script>