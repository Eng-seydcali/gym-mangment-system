<div class="modal fade" id="expense-model" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">New Expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="expense.php" method="post">
                    <div class="row">
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                            <input type="hidden" name="emp_id" required value="<?= $_SESSION["employee_id"]?>">
                                <select class="form-control" name="expense_type" data-select2-selector="status" on required>
                                    <option value="success" data-bg="" selected disabled style="font-size:15px;">SELECT EXPENSE TYPE</option>
                                    <?php foreach(readAll("*","expense_type") as $e){ ?>
                                        <option value="<?=$e->id?>" data-bg=""><?=$e->name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                            <input type="hidden" name="emp_id" required value="<?= $_SESSION["employee_id"]?>">
                                <select class="form-control" name="expense_type" data-select2-selector="status" required>
                                    <option value="success" data-bg="" selected disabled style="font-size:15px;">SLECT EMPLOYEE</option>
                                    <?php foreach(readAll("*","employee") as $e){ ?>
                                        <option value="<?=$e->id?>" data-bg=""><?=$e->name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="decimal" name="amount" placeholder="Amount" class="form-control" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" class="btn btn-primary" name="add_expense" value="CREATE expense">
            </div>
            </form>
        </div>
    </div>
</div>


<!-- update -->


<div class="modal fade" id="expense-model-update" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">Update expense</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="expense.php" method="post">
                    <div class="row">
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <input type="hidden" name="id" class="id-u">
                            <div class="form-group my-2">
                                <select class="form-control expense_type-u" name="expense_type" data-select2-selector="status" required>
                                    <option value="success" data-bg="" selected disabled>SELECT EXPENSE TYPE</option>
                                    <?php foreach(readAll("*","expense_type") as $e){ ?>
                                        <option value="<?=$e->id?>" data-bg=""><?=$e->name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <input type="decimal" name="amount" placeholder="Amount" class="form-control amount-u" required>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" class="btn btn-primary" name="upd_expense" value="UPDATE EXPENSE">
            </div>
            </form>
        </div>
    </div>
</div>