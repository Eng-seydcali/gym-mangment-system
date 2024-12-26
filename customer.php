<?php

include "includes/init-admin.php";

if(isset($_POST["add_customer"])){
    $data = array(
        "idcard" => $_POST['idcard'],
        "name" => $_POST['name'],
        "phone" => $_POST['phone'],
        "fingerprint_data" => $_POST['finger']
    );
    insert($data,"customer");
}

if(isset($_POST['upd_customer'])){
    $data = array(
        "id" => $_POST["id"],
        "name" => $_POST['name'],
        "phone" => $_POST['phone'],
        "fingerprint_data" => $_POST['finger']
    );

    update($data,"customer");
}

?>


<div class="nxl-content">
            <!-- [ page-header ] start -->
            <div class="page-header">
                <div class="page-header-left d-flex align-items-center">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Customers</h5>
                    </div>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item">Customers</li>
                    </ul>
                </div>
                <div class="page-header-right ms-auto">
                    <div class="page-header-right-items">
                        <div class="d-flex d-md-none">
                            <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                <i class="feather-arrow-left me-2"></i>
                                <span>Back</span>
                            </a>
                        </div>
                        <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                            <?php if($_SESSION["role_id"] == 1){ ?>
                                <a href="javascript:void(0);" class="btn btn-icon btn-light-brand" data-bs-toggle="collapse" data-bs-target="#collapseOne">
                                    <i class="feather-bar-chart"></i>
                                </a>
                            <?php }?>
                            <div class="dropdown">
                                <a class="btn btn-icon btn-light-brand" data-bs-toggle="dropdown" data-bs-offset="0, 10" data-bs-auto-close="outside">
                                    <i class="feather-paperclip"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-filetype-pdf me-3"></i>
                                        <span>PDF</span>
                                    </a>
                                    <a href="javascript:void(0);" class="dropdown-item">
                                        <i class="bi bi-printer me-3"></i>
                                        <span>Print</span>
                                    </a>
                                </div>
                            </div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#customer-model">
                                <i class="feather-plus me-2"></i>
                                <span>Create Customer</span>
                            </button>
                        </div>
                    </div>
                    <div class="d-md-none d-flex align-items-center">
                        <a href="javascript:void(0)" class="page-header-right-open-toggle">
                            <i class="feather-align-right fs-20"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div id="collapseOne" class="accordion-collapse collapse page-header-collapse">
                <div class="accordion-body pb-2">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text avatar-xl rounded">
                                                <i class="feather-users"></i>
                                            </div>
                                            <a href="javascript:void(0);" class="fw-bold d-block">
                                                <span class="text-truncate-1-line">Total Customers</span>
                                                <span class="fs-24 fw-bolder d-block">26,595</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text avatar-xl rounded">
                                                <i class="feather-user-check"></i>
                                            </div>
                                            <a href="javascript:void(0);" class="fw-bold d-block">
                                                <span class="text-truncate-1-line">Active Customers</span>
                                                <span class="fs-24 fw-bolder d-block"><?= countTableWhere("customer","status","1")[0]->Tc?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card stretch stretch-full">
                                <div class="card-body">
                                    <div class="d-flex align-items-center justify-content-between">
                                        <div class="d-flex align-items-center gap-3">
                                            <div class="avatar-text avatar-xl rounded">
                                                <i class="feather-user-minus"></i>
                                            </div>
                                            <a href="javascript:void(0);" class="fw-bold d-block">
                                                <span class="text-truncate-1-line">Inactive Customers</span>
                                                <span class="fs-24 fw-bolder d-block"><?= countTableWhere("customer","status","0")[0]->Tc?></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ page-header ] end -->
            <!-- [ Main Content ] start -->
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="customerList">
                                        <thead>
                                            <tr>
                                                <th class="wd-30">
                                                    <div class="btn-group mb-1">
                                                        <div class="custom-control custom-checkbox ms-1">
                                                            <input type="checkbox" class="custom-control-input" id="checkAllCustomer">
                                                            <label class="custom-control-label" for="checkAllCustomer"></label>
                                                        </div>
                                                    </div>
                                                </th>
                                                <th>No</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Status</th>
                                                <th>End Date</th>
                                                <th class="text-end">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $num = 0;
                                                foreach(readAll("*","customer") as $c) {?>
                                            <tr class="single-item">
                                                <td>
                                                    <div class="item-checkbox ms-1">
                                                        <div class="custom-control custom-checkbox">
                                                            <input type="checkbox" class="custom-control-input checkbox" id="checkBox_1">
                                                            <label class="custom-control-label" for="checkBox_1"></label>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><?=++$num?></td>
                                                <td>
                                                    <span class="text-truncate-1-line"><?= $c->name ?></span>
                                                </td>

                                                <td><a href="tel:<?=$c->phone?>">+252 <?=$c->phone?></a></td>
                                                <td class="cus_status">
                                                    <?php
                                                        if($c->status == 0){?>
                                                            <span class="hstack">
                                                                <i class="wd-10 ht-10 border border-2 border-gray-1 bg-danger rounded-circle me-2"></i>
                                                                <span>Disactive</span>
                                                            </span>
                                                        <?php }else{ ?>
                                                            <span class="hstack">
                                                                <i class="wd-10 ht-10 border border-2 border-gray-1 bg-success rounded-circle me-2"></i>
                                                                <span>Active</span>
                                                            </span>
                                                        <?php }
                                                    ?>
                                                </td>
                                                <td class="end_date" id="<?=$c->id?>"><?= (!empty(readAllWhere("end_date","payment",$c->id,"customer_id")[0]->end_date)) ? readAllWhere("end_date","payment",$c->id,"customer_id")[0]->end_date:"N/A"?></td>
                                                <td>
                                                    <div class="hstack gap-2 justify-content-end">
                                                        <div class="dropdown">
                                                            <a href="javascript:void(0)" class="avatar-text avatar-md" data-bs-toggle="dropdown" data-bs-offset="0,21">
                                                                <i class="feather feather-more-horizontal"></i>
                                                            </a>
                                                            <ul class="dropdown-menu">
                                                                <li>
                                                                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#customer-model-update" onclick="getdata(<?=$c->id?>)">
                                                                        <i class="feather feather-edit-3 me-3"></i>
                                                                        <span>Edit</span>
                                                                    </button>
                                                                </li>
                                                                <li>
                                                                    <button type="button" class="dropdown-item" onclick="deletedata(<?=$c->id?>)">
                                                                        <i class="feather feather-trash-2 me-3"></i>
                                                                        <span>Delete</span>
                                                                    </button>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Main Content ] end -->
        </div>

 <?php include "includes/footer.php"; ?>

 
 <script src="assets/vendors/js/dataTables.min.js"></script>
    <script src="assets/vendors/js/dataTables.bs5.min.js"></script>
    <script src="assets/vendors/js/select2.min.js"></script>
    <script src="assets/vendors/js/select2-active.min.js"></script>
    
    <script src="assets/js/customers-init.min.js"></script>

    
 <?php include "modals/add_customer.php"; ?>

 <script>
    function getdata(id){
        $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        data: {table:`customer`,id:id,action:'getdata'},
        success: function(response)
        {
            var res = JSON.parse(response);
            console.log(res)
            // console.log(res[0].id);
            document.querySelector(".id-u").value = res[0].id
            document.querySelector(".name-u").value = res[0].name
            document.querySelector(".phone-u").value = res[0].phone
            document.querySelector(".finger-u").value = res[0].fingerprint_data
        }
        })
    }

    function deletedata(id){
        $.ajax({
        type: "POST",
        url: 'includes/ajax.php',
        data: {table:`customer`,id:id,action:'getdata'},
        success: function(response)
        {
            var res = JSON.parse(response);
            if(confirm("Are you Sure To Delete [" +res[0].name +"]")){
                $.ajax({
                    type: "POST",
                    url: 'includes/ajax.php',
                    data: {table:`customer`,id:id,action:'deletedata',location:"customer.php"},
                    success: function(response)
                    {
                        var res = JSON.parse(response);
                        window.location.reload();
                    }
                })
            }
        }
        })
    }
    setInterval(() =>{
        document.querySelectorAll(".end_date").forEach((e_date,i)=>{
            let start_date = new Date(getCurrentDateTime())
            let end_date = new Date(e_date.innerHTML)
            let result = end_date - start_date;

            if(result <= 0 ){
                $.ajax({
                    type: "POST",
                    url: 'includes/ajax.php',
                    data: {table:`customer`,id:e_date.id,action:'up_status_rej'},
                    success: function(response)
                    {
                        
                    }
                })
                e_date.innerHTML = "N/A"
                document.querySelectorAll(".cus_status")[i].innerHTML = `
                <span class="hstack">
                    <i class="wd-10 ht-10 border border-2 border-gray-1 bg-danger rounded-circle me-2"></i>
                    <span>Disactive</span>
                </span>`
            }
        })
    }, 10);
 </script>