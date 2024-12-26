<?php include "includes/check_role.php";
include "includes/init-admin.php";
// print_r(d_report());

$dates = [];
$totalAmount = [];
foreach(d_report() as $key){
    array_push($dates,$key->Date);
    array_push($totalAmount,$key->TotalAmount);
};

// last-five-days-report
$months = [];
$m_totalAmount = [];
foreach(m_report() as $key){
    array_push($months,$key->Month);
    array_push($m_totalAmount,$key->TotalAmount);
};


// last-five-months-report

$customer_data = [21,(int)countTableWhere("customer","status","1")[0]->Tc,(int)countTableWhere("customer","status","0")[0]->Tc];
$users_data = [(int)countTableWhere("employee","perifillage","1")[0]->Tc,(int)countTableWhere("employee","perifillage","0")[0]->Tc];

?>


<div class="nxl-content">
    <!-- [ page-header ] start -->

    <!-- [ page-header ] end -->
    <!-- [ Main Content ] start -->
    <div class="main-content">
        <div class="row">
            <?php
                // print_r($_SESSION["role_id"] );
            ?>
            <!-- [Invoices Awaiting Payment] start -->
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between ">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-gray-200">
                                    <i class="feather-users"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark"><span class="counter totalCustomer"><?= countTable("customer","id","Count")[0]->Tc ?></span></div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Customer</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between ">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-gray-200">
                                    <i class="feather-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark"><span class="counter">$ <?= countTable("payment","amount","SUM")[0]->Tc ?></span></div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Payments</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between ">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-gray-200">
                                    <i class="feather-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark"><span class="counter">$ <?= countTable("expense","amount","SUM")[0]->Tc ?></span></div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Expenses</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card stretch stretch-full">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between ">
                            <div class="d-flex gap-4 align-items-center">
                                <div class="avatar-text avatar-lg bg-gray-200">
                                    <i class="feather-dollar-sign"></i>
                                </div>
                                <div>
                                    <div class="fs-4 fw-bold text-dark"><span class="counter"> $ <?= (countTable("payment","amount","SUM")[0]->Tc) - (countTable("expense","amount","SUM")[0]->Tc) ?></span></div>
                                    <h3 class="fs-13 fw-semibold text-truncate-1-line">Profit</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Last five days report</h5>
                    </div>
                    <div class="card-body custom-card-action p-0">
                        <div id="last-five-days-report"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Customer Report</h5>
                    </div>
                    <div class="card-body custom-card-action">
                        <div id="leads-overview-donut"></div>
                        <div class="row g-2">
                            <div class="col-4">
                                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                    <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #3454d1"></span>
                                    <span>New<span class="fs-10 text-muted ms-1"><?= $customer_data[0] ?></span></span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                    <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #2196f3"></span>
                                    <span>Active<span class="fs-10 text-muted ms-1"><?= $customer_data[1] ?></span></span>
                                </a>
                            </div>
                            <div class="col-4">
                                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                    <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #aad6fa"></span>
                                    <span>Inactive<span class="fs-10 text-muted ms-1"><?= $customer_data[2] ?></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Users Report</h5>
                    </div>
                    <div class="card-body custom-card-action">
                        <div id="Users-report"></div>
                        <div class="row g-2">
                            <div class="col-6">
                                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                    <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #3454d1"></span>
                                    <span>Active<span class="fs-10 text-muted ms-1"><?= $users_data[0] ?></span></span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="javascript:void(0);" class="p-2 hstack gap-2 rounded border border-dashed border-gray-5">
                                    <span class="wd-7 ht-7 rounded-circle d-inline-block" style="background-color: #aad6fa"></span>
                                    <span>Inactive<span class="fs-10 text-muted ms-1"><?= $users_data[1] ?></span></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="card stretch stretch-full">
                    <div class="card-header">
                        <h5 class="card-title">Last five month report</h5>
                    </div>
                    <div class="card-body custom-card-action p-0">
                        <div id="last-five-Months-report"></div>
                    </div>
                </div>
            </div>
            <!-- [Invoices Awaiting Payment] end -->
            <!-- [Converted Leads] start -->
           
        </div>
    </div>
    <!-- [ Main Content ] end -->
</div>

 <?php include "includes/footer.php"; ?>
 <script>
    setInterval(() => {
        $.ajax({
            type: "POST",
            url: 'includes/ajax.php',
            data: {table:`customer`,col:"id",op:"COUNT",action:'countTable'},
            success: function(response)
            {
                var res = JSON.parse(response);
                document.querySelector(".totalCustomer").innerHTML = res[0].Tc;
            }
        })
    }, 3000);


 </script>
 <!-- charts -->
 <script>
    const dates = <?php echo json_encode($dates); ?>;
    const totalAmount = <?php echo json_encode($totalAmount); ?>;
    $(document).ready(function(){
        new ApexCharts(document.querySelector("#last-five-days-report"),{
            chart:{type:"bar",height:335,fontFamily:"inherit",toolbar:{show:!1}},
            legend:{show:!1},
            series:[{name:"Dollars",data:totalAmount}],
            colors:["#3454d1","#ffa21d","#ea4d4d","#25b865","#283c50"],
            grid:{strokeDashArray:4,
            position:"back",
            xaxis:{lines:{show:!0}},
            yaxis:{lines:{show:!1}}},
            plotOptions:{bar:{columnWidth:"15%",horizontal:!1,distributed:!0,endingShape:"rounded",dataLabels:{position:"top"}}},
            labels:{show:!1},dataLabels:{enabled:!1},stroke:{show:!1},xaxis:{categories:dates,axisTicks:{show:!0},axisBorder:{show:!1}},
            yaxis:{labels:{show:!0},axisTicks:{show:!1},axisBorder:{show:!1}}}).render()
    })
    // last-five-days-report
    const customer_data = <?php echo json_encode($customer_data); ?>;
    $(document).ready(function(){new ApexCharts(document.querySelector("#leads-overview-donut"),{
        chart:{width:307,type:"pie"},dataLabels:{enabled:!1},
        series:customer_data,
        labels:["New","Active","Inactive"],
        colors:["#3454d1","#2196f3","#aad6fa"],
        stroke:{width:0,lineCap:"round"},
        legend:{show:!1,position:"bottom",fontFamily:"Inter",fontWeight:500,
        labels:{colors:"#A0ACBB",fontFamily:"Inter"},markers:{width:10,height:10},itemMargin:{horizontal:20,vertical:5}},plotOptions:{pie:{donut:{size:"85%",labels:{show:!1,name:{show:!1,fontSize:"16px",colors:"#A0ACBB",fontFamily:"Inter"},value:{show:!1,fontSize:"30px",fontFamily:"Inter",color:"#A0ACBB",formatter:function(e){return e}}}}}},responsive:[{breakpoint:380,options:{chart:{width:280},legend:{show:!1}}}],tooltip:{y:{formatter:function(e){return+e+" Customer"}},style:{colors:"#A0ACBB",fontFamily:"Inter"}}}).render()
    })
    // Customers Report
    const users_data = <?php echo json_encode($users_data); ?>;
    $(document).ready(function(){new ApexCharts(document.querySelector("#Users-report"),{
        chart:{width:307,type:"donut"},dataLabels:{enabled:!1},
        series:users_data,
        labels:["Active","Inactive"],
        colors:["#3454d1","#aad6fa"],
        stroke:{width:0,lineCap:"round"},
        legend:{show:!1,position:"bottom",fontFamily:"Inter",fontWeight:500,
        labels:{colors:"#A0ACBB",fontFamily:"Inter"},markers:{width:10,height:10},itemMargin:{horizontal:20,vertical:5}},plotOptions:{pie:{donut:{size:"85%",labels:{show:!1,name:{show:!1,fontSize:"16px",colors:"#A0ACBB",fontFamily:"Inter"},value:{show:!1,fontSize:"30px",fontFamily:"Inter",color:"#A0ACBB",formatter:function(e){return e}}}}}},responsive:[{breakpoint:380,options:{chart:{width:280},legend:{show:!1}}}],tooltip:{y:{formatter:function(e){return+e+" User"}},style:{colors:"#A0ACBB",fontFamily:"Inter"}}}).render()
    })
    // user report
    const months = <?php echo json_encode($months); ?>;
    const m_totalAmount = <?php echo json_encode($m_totalAmount); ?>;
    
    $(document).ready(function(){
        new ApexCharts(document.querySelector("#last-five-Months-report"),{
            chart:{type:"bar",height:335,fontFamily:"inherit",toolbar:{show:!1}},
            legend:{show:!1},
            series:[{name:"Dollars",data:m_totalAmount}],
            colors:["#3454d1","#ffa21d","#ea4d4d","#25b865","#283c50"],
            grid:{strokeDashArray:4,
            position:"back",
            xaxis:{lines:{show:!0}},
            yaxis:{lines:{show:!1}}},
            plotOptions:{bar:{columnWidth:"15%",horizontal:!1,distributed:!0,endingShape:"rounded",dataLabels:{position:"top"}}},
            labels:{show:!1},dataLabels:{enabled:!1},stroke:{show:!1},xaxis:{categories:months,axisTicks:{show:!0},axisBorder:{show:!1}},
            yaxis:{labels:{show:!0},axisTicks:{show:!1},axisBorder:{show:!1}}}).render()
    })
 </script> 

 <!-- <script src="assets/vendors/js/apexcharts.min.js"></script>
 <script src="assets/js/common-init.min.js"></script> -->
<!-- <script src="assets/js/widgets-charts-init.min.js"></script> -->