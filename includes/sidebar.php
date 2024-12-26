
    <!--! ================================================================ !-->
    <!--! [Start] Navigation Manu !-->
    <!--! ================================================================ !-->
    <nav class="nxl-navigation">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="index.html" class="b-brand">
                    <!-- ========   change your logo hear   ============ -->
                    <img src="assets/images/logo-full.png" alt="" class="logo logo-lg" />
                    <img src="assets/images/logo-abbr.png" alt="" class="logo logo-sm" />
                </a>
            </div>
            <div class="navbar-content">
                <ul class="nxl-navbar">
                    <?php if($_SESSION["role_id"] == 1){ ?>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="home.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-airplay"></i></span>
                            <span class="nxl-mtext">Dashboard</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="employee.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user"></i></i></span>
                            <span class="nxl-mtext">Employees</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    <?php }?>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="customer.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></i></span>
                            <span class="nxl-mtext">Customers</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    <?php if($_SESSION["role_id"] == 1){ ?>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="customer_notification.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-bell"></i></i></span>
                            <span class="nxl-mtext">Customer Notifications</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    
                    <li class="nxl-item nxl-hasmenu">
                        <a href="expense.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></i></span>
                            <span class="nxl-mtext">Expenses</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    
                    <li class="nxl-item nxl-hasmenu">
                        <a href="expense_type.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></i></span>
                            <span class="nxl-mtext">Expense Type</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    <?php }?>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="payment.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-dollar-sign"></i></i></span>
                            <span class="nxl-mtext">Payment</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    <?php if($_SESSION["role_id"] == 1){ ?>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="user.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-user-check"></i></i></span>
                            <span class="nxl-mtext">Users</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="role.php" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-users"></i></i></span>
                            <span class="nxl-mtext">Roles</span><span class="nxl-arrow"></span>
                        </a>
                    </li>
                    <li class="nxl-item nxl-hasmenu">
                        <a href="javascript:void(0);" class="nxl-link">
                            <span class="nxl-micon"><i class="feather-cast"></i></span>
                            <span class="nxl-mtext">Reports</span><span class="nxl-arrow"><i class="feather-chevron-right"></i></span>
                        </a>
                        <ul class="nxl-submenu">
                            <li class="nxl-item"><a class="nxl-link" href="r_daily.php">Daily Report</a></li>
                        </ul>
                    </li>
                    <?php }?>
                    
                </ul>
               
            </div>
        </div>
    </nav>
    <!-- sidebar -->
    <!--! ================================================================ !-->
    <!--! [End]  Navigation Manu !-->