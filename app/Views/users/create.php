<?php
$invalidData = null;
if (isset($_SESSION['invalideData']) && !empty($_SESSION['invalideData'])) {
    $invalidData = $_SESSION['invalideData'];
}
?>

<div class=" w-100">
    <div class="col-sm-12 col-lg-6 m-auto card">
        <div class="card-header">
            Create new user
        </div>
        <div class="card-body">
            <form method="POST" action="/users/create">
                <div class="input-group mb-3">
                    <span class="input-group-text">Username <span class="fw-900 text-danger">*</span></span>
                    <input required type="text" class="form-control" name="username" value="<?= $invalidData !== null ? htmlentities($invalidData['username']) : null?>">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Email <span class="fw-900 text-danger">*</span></span>
                    <input required type="text" class="form-control" name="email" value="<?= $invalidData !== null ? htmlentities($invalidData['email']) : null?>">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Role <span class="fw-900 text-danger">*</span></span>
                    <select name="role" class="form-control" id="">
                        <option value="user" selected>user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text">Password <span class="fw-900 text-danger">*</span></span>
                    <input required type="password" class="form-control" name="password">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Confirme Password <span class="fw-900 text-danger">*</span>
                        <input required type="password" class="form-control" name="cPassword">
                </div>


                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/users" class="btn btn-danger">Cancel</a>
            </form>

        </div>
    </div>
</div>

<?php
if (isset($_SESSION['invalideData']) && !empty($_SESSION['invalideData'])) {
    unset($_SESSION['invalideData']);
} 
?>