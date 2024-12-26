<div class="modal fade" id="user-model" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">New user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="user.php" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="text" name="username" placeholder="Username" class="form-control val_username" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="password" name="password" placeholder="password" class="form-control val_password" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <select class="form-control my-2 employee" name="employee"  data-select2-selector="status" required>
                                <option value="" data-bg="" selected disabled>SELECT EMPLOYEE</option>
                                <?php foreach(readAllWhere("*","employee","0","perifillage") as $e){ ?>
                                    <option value="<?=$e->id?>" data-bg=""><?=$e->name?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <select class="form-control my-2 role" name="role"  data-select2-selector="status" required>
                                <option value="" data-bg="" selected disabled>SELECT ROLE</option>
                                <?php foreach(readAll("*","role") as $e){ ?>
                                    <option value="<?=$e->id?>" data-bg=""><?=$e->role?></option>
                                <?php }?>
                            </select>
                        </div>
                        
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" id="add_user" class="btn btn-primary" name="add_user" value="CREATE user">
            </div>
            </form>
        </div>
    </div>
</div>


<!-- update -->


<div class="modal fade" id="user-model-update" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">Update user</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="user.php" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="hidden" name="id" class="form-control id-u">
                                <input type="text" name="username" placeholder="Username" class="form-control username-u val_username" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="password" name="password" placeholder="password" class="form-control password-u val_password" required>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <select class="form-control my-2 employee employee-u" name="employee"  data-select2-selector="status" required>
                                <option value="" data-bg="" selected disabled>SELECT EMPLOYEE</option>
                                <?php foreach(readAllWhere("*","employee","0","perifillage") as $e){ ?>
                                    <option value="<?=$e->id?>" data-bg=""><?=$e->name?></option>
                                <?php }?>
                            </select>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <select class="form-control my-2 role role-u" name="role"  data-select2-selector="status" required>
                                <option value="" data-bg="" selected disabled>SELECT ROLE</option>
                                <?php foreach(readAll("*","role") as $e){ ?>
                                    <option value="<?=$e->id?>" data-bg=""><?=$e->role?></option>
                                <?php }?>
                            </select>
                        </div>
                        
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" id="up_user" class="btn btn-primary" name="upd_user" value="UPDATE user">
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    let val_username = document.querySelectorAll(".val_username")
    let val_password = document.querySelectorAll(".val_password")
    let add_user = document.querySelector("#add_user")
    let up_user= document.querySelector("#up_user")
    let val_password_btn = false
    let val_username_btn = false

    // employee name


    val_username.forEach((name)=>{
        name.addEventListener("input",()=>{
            // console.log(name.value.length);
            
            if(name.value.length < 3){
                
                name.classList.remove("is-valid")
                name.classList.add("is-invalid")
                name.nextElementSibling.classList = "invalid-feedback"
                name.nextElementSibling.innerHTML = "Expense type mast be greater than 3 letters";
                val_username_btn = true
                disable_button()
                
            }else{
                $.ajax({
                    type: "POST",
                    url: 'includes/ajax.php',
                    data: {table:`user`,name:name.value,col:"username",action:'is_exist'},
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
                            val_username_btn = false
                            disable_button()
                            
                        }else{
                            
                            
                            name.classList.remove("is-valid")
                            name.classList.add("is-invalid")
                            name.nextElementSibling.classList = "invalid-feedback"
                            name.nextElementSibling.innerHTML = "This name Already Exists";
                            val_username_btn = true
                            disable_button()
                        }
                    }
                })
            }
        })
    })

    val_password.forEach((pass)=>{
        pass.addEventListener("input",()=>{
            if(pass.value.length < 8 || pass.value.length > 16 ){
                pass.classList.remove("is-valid")
                pass.classList.add("is-invalid")
                pass.nextElementSibling.classList = "invalid-feedback"
                pass.nextElementSibling.innerHTML = "Password mast be between 16 letters";
                val_password_btn = true
                disable_button()
            }else{
               if(!isValidPassword(pass.value)){
                    pass.classList.remove("is-valid")
                    pass.classList.add("is-invalid")
                    pass.nextElementSibling.classList = "invalid-feedback"
                    pass.nextElementSibling.innerHTML = "Password mast be contain number, symbol and text";
                    val_password_btn = true
                    disable_button()
               }else{
                    pass.classList.remove("is-invalid")
                    pass.classList.add("is-valid")
                    pass.nextElementSibling.classList = "invalid-feedback"
                    pass.nextElementSibling.innerHTML = "";
                    val_password_btn = false
                    disable_button()
               }
            }
        })
    })




    function disable_button(){
        if(val_password_btn == false && val_username_btn == false ){
            up_user.disabled = false;
            add_user.disabled = false;
        }else{
            up_user.disabled = true;
            add_user.disabled = true;
        }
    }

    function isValidPassword(password) {
    // Check if password contains at least one letter (case insensitive), one number, and one special symbol
        const hasLetter = /[a-zA-Z]/.test(password); // checks for any letter (uppercase or lowercase)
        const hasNumber = /\d/.test(password); // checks for any digit
        const hasSymbol = /[!@#$%^&*(),.?":{}|<>]/.test(password); // checks for special symbols
        const hasNoSpace = !/\s/.test(password); // checks that there are no spaces

        // If all conditions are met, return true
        return hasLetter && hasNumber && hasSymbol && hasNoSpace;
    }
</script>