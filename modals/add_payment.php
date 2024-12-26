<div class="modal fade" id="payment-model" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">New payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="payment.php" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            
                            <div class="form-group my-2">
                                <select class="form-control customer" name="customer"  data-select2-selector="status" required>
                                    <option value="" data-bg="" selected disabled>SELECT CUSTOMER</option>
                                    <?php foreach(readAllWhere("*","customer",0,"status") as $e){ ?>
                                        <option value="<?=$e->id?>" data-bg=""><?=$e->name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <select class="form-control period" name=""  data-select2-selector="status" required>
                                    <option value="" data-bg="" selected disabled>SELECT PERIOD</option>
                                        <option value="0" data-bg="">Months</option>
                                        <option value="1" data-bg="">Days</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="hidden" name="emp_id" required value="<?= $_SESSION["employee_id"]?>">
                                <input type="number" value="" name="" placeholder="" required class="form-control duration" oninput="change_end_date(this.value)">
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="decimal"  name="amount"  placeholder="Amount" class="form-control amount" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="date-time" readonly name="end_date" id="end_date" class="form-control end_date" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" class="btn btn-primary" name="add_payment" value="CREATE payment">
            </div>
            </form>
        </div>
    </div>
</div>


<!-- update -->


<div class="modal fade" id="payment-model-update" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">Update payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="payment.php" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="hidden" name="id" class="form-control id-u">
                                <input type="text" name="name" placeholder="payment Name" class="form-control name-u">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="phone" name="phone" placeholder="payment Phone" class="form-control phone-u">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="text" name="position" placeholder="payment Position" class="form-control position-u">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="text" name="salary" placeholder="payment Salary" class="form-control salary-u">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" class="btn btn-primary" name="upd_payment" value="UPDATE payment">
            </div>
            </form>
        </div>
    </div>
</div>


<script>
    let period = document.querySelector(".period")
    let duration = document.querySelector(".duration")
    let amount = document.querySelector(".amount")
    let end_date = document.querySelector(".end_date")
    let customer = document.querySelector(".customer")

    amount.style= "display:none;"
    duration.style= "display:none;"
    end_date.style= "display:none;"

    period.addEventListener("change",()=>{
        duration.style= "display:block;";
        duration.value = "";
        end_date.value = "";
        (period.value== 0) ? duration.placeholder= "How many months" : duration.placeholder= "How many days";
    })

    function change_end_date(input){

        if(period.value == 1 && duration.value != null){
            end_date.value = getday(duration.value)
            ifdate(end_date.value,customer.value)
            amount.style= "display:block;"
            end_date.style= "display:block;"
            
            
        }else{
            end_date.value = getmonth(duration.value)
            amount.style= "display:block;"
            end_date.style= "display:block;"
        }
        
    }



    function getday(days){
        const today = new Date(); // Get today's date
        today.setDate(today.getDate() + parseInt(days)); // Add the number of days to today
        
        // Format the date to yyyy/mm/dd
        const year = today.getFullYear();
        const month = (today.getMonth() + 1).toString().padStart(2, '0'); // Months are zero-indexed, so we add 1 and ensure two digits
        const day = today.getDate().toString().padStart(2, '0'); // Ensure two digits for day
        let hour = String(today.getHours().toString().padStart(2, '0'));
        let min = String(today.getMinutes().toString().padStart(2, '0'));
        let sec = String(today.getSeconds().toString().padStart(2, '0'));

        return`${year}-${month}-${day} ${hour}:${min}:${sec}`;
    }

    function getmonth(input){
        let today = new Date();

        // Add one month
        today.setMonth(today.getMonth() + parseInt(input));
        // Format the result as yyyy-mm-dd
        let year = today.getFullYear();
        let month = String(today.getMonth() + 1).padStart(2, '0'); // Add leading zero if needed
        let day = String(today.getDate()).padStart(2, '0'); // Add leading zero if needed
        let hour = String(today.getHours().toString().padStart(2, '0'));
        let min = String(today.getMinutes().toString().padStart(2, '0'));
        let sec = String(today.getSeconds().toString().padStart(2, '0'));

        return`${year}-${month}-${day} ${hour}:${min}:${sec}`;
    }

    function ifdate(end,id){
        $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        data: {table:`payment`,id:id,action:'getalldata'},
        success: function(response)
        {
            var res = JSON.parse(response);
            // console.log(res)
            res.forEach((r)=>{
                if(r.customer_id == id){
                    // console.log(r.end_date);
                }
            })

        }
        })
    }
</script>