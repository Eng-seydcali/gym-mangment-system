<?php include "includes/check_role.php";
include "includes/init-admin.php";

?>


<div class="nxl-content">
    <!-- [ page-header ] start -->

    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <!-- [Leads Overview] start -->
            <div class="col-xxl-4">
                <div class="card stretch stretch-full">
                    <div class="card-body custom-card-action">
                        <div id="leads-overview-donut"></div>
                        <div class="row g-2">
                            <div class="col-3">
                                <div class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                    <div class="d-flex justify-content-around align-items-center w-100" >
                                        <div class="" style="font-size:25px;">DAY:</div>
                                        <div class="">
                                            <select name="" id="Days" class="border form-control r_daily" >
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                    <div class="d-flex justify-content-around align-items-center w-100" >
                                        <div class="" style="font-size:25px;">MONTH:</div>
                                        <div class="">
                                            <select name="" id="Month" class="border form-control r_daily" >
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                    <div class="d-flex justify-content-around align-items-center w-100" >
                                        <div class="" style="font-size:25px;">YEAR:</div>
                                        <div class="">
                                            <select name="" id="Year" class="border form-control r_daily" >
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [Leads Overview] end -->
            <!-- [Latest Leads] start -->
            <div class="col-xxl-8">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Daily Report</h5>
                        <div class="card-header-action">
                            <div class="card-header-btn">
                                <div data-bs-toggle="tooltip" title="Refresh">
                                    <a href="javascript:void(0);" class="avatar-text avatar-xs bg-warning" data-bs-toggle="refresh"> </a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="avatar-text avatar-sm" data-bs-toggle="dropdown" data-bs-offset="25, 25">
                                    <div data-bs-toggle="tooltip" title="Options">
                                        <i class="feather-more-vertical"></i>
                                    </div>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item"><i class="bi bi-printer"></i>Print</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body custom-card-action p-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr class="border-b">
                                        <th scope="row">No.</th>
                                        <th scope="row">CustomerID</th>
                                        <th scope="row">Customer</th>
                                        <th>Amount</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody id="dataholder">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <ul class="list-unstyled d-flex align-items-center gap-2 mb-0 pagination-common-style">
                            <li>
                                <a href="javascript:void(0);"><i class="bi bi-arrow-left"></i></a>
                            </li>
                            <li><a href="javascript:void(0);" class="active">1</a></li>
                            <li><a href="javascript:void(0);">2</a></li>
                            <li>
                                <a href="javascript:void(0);"><i class="bi bi-dot"></i></a>
                            </li>
                            <li><a href="javascript:void(0);">8</a></li>
                            <li><a href="javascript:void(0);">9</a></li>
                            <li>
                                <a href="javascript:void(0);"><i class="bi bi-arrow-right"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

 <?php include "includes/footer.php"; ?>


 <script>


        // Default DAte
        let months = [
            "January", "February", "March", "April", "May", "June",
            "July", "August", "September", "October", "November", "December"
        ];
        let daysOption = document.querySelector("#Days");
        let MonthOption = document.querySelector("#Month");
        let YearOption = document.querySelector("#Year");
        daysOption.innerHTML = "";
        MonthOption.innerHTML = "";
        YearOption.innerHTML = "";
        
        function getDaysInMonth(year, month) {
            // month is 0-indexed (0 for January, 11 for December)
            return new Date(year, month + 1, 0).getDate();
        }
        let ListOfDays = getDaysInMonth((new Date().getMonth()), (new Date().getDate()))
        // today
        for(i= 1 ; i<= ListOfDays ; i++){
            if(new Date().getDate() == i){
                daysOption.innerHTML += `<option value="${i}" selected>${i}</option>`
            }else{
                daysOption.innerHTML += `<option value="${i}">${i}</option>`
            }
            
        };
        // Month
        for(i= 0 ; i<= 11 ; i++){
            if(new Date().getMonth() == i){
                MonthOption.innerHTML += `<option value="${i+1}" selected>${months[i]}</option>`
            }else{
                MonthOption.innerHTML += `<option value="${i+1}">${months[i]}</option>`
            }
        };
        // Years
        for(i= new Date().getFullYear(); i>= 2024 ; i--){
            if(new Date().getFullYear() == i){
                YearOption.innerHTML += `<option value="${i}" selected>${i}</option>`
            }else{
                YearOption.innerHTML += `<option value="${i}">${i}</option>`
            }
            
        };
        // Default Date



        let selectedDate = YearOption.value + "-"+MonthOption.value+"-"+daysOption.value;
        getdata(selectedDate);
        function getdata(date){
            $.ajax({
            type: "POST",
            url: 'includes/ajax.php',
            data: {table:`payment`,date:date,action:'getdata_r_daily'},
            success: function(response)
            {
                var res = JSON.parse(response);
                // console.log(res)
                if(res.length == 0){
                    document.querySelector("#dataholder").innerHTML = `<div class="d-flex justify-content-center w-100 py-3 fs-15"><div>No data</div></div>`
                    
                }else{
                    let index = 1;
                    let i = 0;
                    document.querySelector("#dataholder").innerHTML =``
                    res.forEach((r)=>{
                        document.querySelector("#dataholder").innerHTML +=`
                        
                                    <tr>
                                        <td>
                                            <span class="badge bg-gray-200 text-dark">${index++}</span>
                                        </td>
                                        <td class="cusId"></td>
                                        <td>
                                            <div class="d-flex align-items-center gap-3">
                                                
                                                <a href="javascript:void(0);">
                                                    <span class="d-block cusName"></span>
                                                    <span class="fs-12 d-block fw-normal text-muted">+252 <span class="cusPhone"></span></span>
                                                </a>
                                            </div>
                                        </td>
                                        <td class="">
                                            ${r.amount}
                                        </td>
                                        <td class="">
                                            ${r.date}
                                        </td>
                                    </tr>
                    `
                        $.ajax({
                            type: "POST",
                            url: 'includes/ajax.php',
                            data: {table:`customer`,id:r.customer_id,action:'getdata'},
                            success: function(response)
                            {
                                var res = JSON.parse(response);
                                document.querySelectorAll(".cusId")[i].innerHTML = res[0].idcard
                                document.querySelectorAll(".cusName")[i].innerHTML = res[0].name
                                document.querySelectorAll(".cusPhone")[i++].innerHTML = res[0].phone
                                
                                
                            }
                            })
                    })
                    
                }
                // console.log(res[0].id);
                // document.querySelector(".id-u").value = res[0].id
                // document.querySelector(".name-u").value = res[0].name
                // document.querySelector(".phone-u").value = res[0].phone
                // document.querySelector(".position-u").value = res[0].position
                // document.querySelector(".salary-u").value = res[0].salary
            }
            })
        }
        
        
        // let options = ["daysOption","MonthOption","YearOption"]
        // console.log(options[0].value);
        document.querySelectorAll(".r_daily").forEach((option)=>{
            option.addEventListener("change",()=>{
                selectedDate = YearOption.value + "-"+MonthOption.value+"-"+daysOption.value;
                getdata(selectedDate);
                
            })
        })
        
 </script>