<div class="modal fade" id="customer_notification-model" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">New customer_notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="customer_notification.php" method="post">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <select class="form-control customer" name="customer"  data-select2-selector="status">
                                    <option value="" data-bg="" selected disabled>SELECT CUSTOMER</option>
                                    <?php foreach(readAll("*","customer") as $e){ ?>
                                        <option value="<?=$e->id?>" data-bg=""><?=$e->name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <textarea name="message" id="" placeholder="Wrire Your Message" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" class="btn btn-primary" name="add_customer_notification" value="SEND MESSAGE">
            </div>
            </form>
        </div>
    </div>
</div>


<!-- update -->


<div class="modal fade" id="customer_notification-model-update" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">Update customer_notification</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="customer_notification.php" method="post">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                            <input type="hidden" name="id" class="id-u">
                            <select class="form-control customer customer-u" name="customer"  data-select2-selector="status">
                                    <option value="" data-bg="" selected disabled>SELECT CUSTOMER</option>
                                    <?php foreach(readAll("*","customer") as $e){ ?>
                                        <option value="<?=$e->id?>" data-bg=""><?=$e->name?></option>
                                    <?php }?>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="form-group my-2">
                                <textarea name="message" id="" placeholder="Wrire Your Message" class="form-control message-u"></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" class="btn btn-primary" name="upd_customer_notification" value="UPDATE customer_notification">
            </div>
            </form>
        </div>
    </div>
</div>