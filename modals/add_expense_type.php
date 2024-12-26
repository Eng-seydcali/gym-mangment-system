<div class="modal fade" id="expense_type-model" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">New Expense Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="expense_type.php" method="post">
                    <div class="form-group my-2">
                        <input type="text" name="name" placeholder="Expense Type" class="form-control ex_name" required>
                        <div class="invalid-feedback"></div>
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" id="add_ex" class="btn btn-primary" name="add_expense_type" value="CREATE EXPENSE TYPE">
            </div>
            </form>
        </div>
    </div>
</div>


<!-- update -->


<div class="modal fade" id="expense_type-model-update" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">Update Expense Type</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="expense_type.php" method="post">
                    <div class="form-group my-2">
                        <input type="hidden" name="id" class="form-control id-u">
                        <input type="text" name="name" placeholder="Expense Type" class="form-control name-u ex_name" required>
                        <div class="invalid-feedback"></div>
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" class="btn btn-primary" id="up_ex" name="upd_expense_type" value="UPDATE EXPENSE TYPE">
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    let ex_name = document.querySelectorAll(".ex_name")
    let add_ex = document.querySelector("#add_ex")
    let up_ex = document.querySelector("#up_ex")
    let em_name_btn = false
    let ex_name_btn = false

    // employee name


    ex_name.forEach((name)=>{
        name.addEventListener("input",()=>{
            // console.log(name.value.length);
            
            if(name.value.length < 3){
                
                name.classList.remove("is-valid")
                name.classList.add("is-invalid")
                name.nextElementSibling.classList = "invalid-feedback"
                name.nextElementSibling.innerHTML = "Expense type mast be greater than 3 letters";
                ex_name_btn = true
                disable_button()
                
            }else{
                $.ajax({
                    type: "POST",
                    url: 'includes/ajax.php',
                    data: {table:`expense_type`,name:name.value,col:"name",action:'is_exist'},
                    success: function(response)
                    {
                        var res = JSON.parse(response);
                        // console.log(res.length);
                        // console.log(res[0].username);
                            // console.log(val_b_types.value.toUpperCase() + " = " + res[0].username.toUpperCase());
                        if(res.length == 0){
                            // name.value = name.value.slice(0,9)
                            name.classList.remove("is-invalid")
                            name.classList.add("is-valid")
                            name.nextElementSibling.classList = "valid-feedback"
                            name.nextElementSibling.innerHTML = "";
                            ex_name_btn = false
                            disable_button()
                            
                        }else{
                            
                            
                            name.classList.remove("is-valid")
                            name.classList.add("is-invalid")
                            name.nextElementSibling.classList = "invalid-feedback"
                            name.nextElementSibling.innerHTML = "This name Already Exists";
                            ex_name_btn = true
                            disable_button()
                        }
                    }
                })
            }
        })
    })





    function disable_button(){
        if(em_name_btn == false && ex_name_btn == false ){
            up_ex.disabled = false;
            add_ex.disabled = false;
        }else{
            up_ex.disabled = true;
            add_ex.disabled = true;
        }
    }
</script>