<div class="modal fade" id="role-model" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">New role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="role.php" method="post">
                    <div class="form-group my-2">
                        <input type="text" name="name" placeholder="Role" class="form-control">
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" class="btn btn-primary" name="add_role" value="CREATE role">
            </div>
            </form>
        </div>
    </div>
</div>


<!-- update -->


<div class="modal fade" id="role-model-update" aria-hidden="true" aria-labelledby="languageSelectModalLabel" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="languageSelectModalLabel">Update role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="role.php" method="post">
                    <div class="form-group my-2">
                        <input type="hidden" name="id" class="form-control id-u">
                        <input type="text" name="name" placeholder="Role " class="form-control name-u">
                    </div>
            </div>
            <div class="modal-footer ">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">CLOSE</button>
                <input type="submit" class="btn btn-primary" name="upd_role" value="UPDATE role">
            </div>
            </form>
        </div>
    </div>
</div>