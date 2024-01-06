<?php
$user = null ;
if (isset($data)) {
    $user =  $data;
}
?>

<div class="col-sm-12 col-lg-6">
    <div class="card">
        <div class="card-header">
            Edit user
        </div>
        <div class="card-body">
            <form method="POST" action="/users/edit">
                <div class="input-group mb-3">
                    <span class="input-group-text">Username</span>
                    <input type="text" class="form-control" name="username" value="<?= $user !== null ? htmlentities($user -> getUsername()) : null ?>">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Email</span>
                    <input type="text" class="form-control" name="email" value="<?= $user !== null ? htmlentities($user -> getEMail()) : null ?>">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Role</span>
                    <select name="role" class="form-control" id="">
                        <option value="<?= $user !== null ? htmlentities($user -> getRole()) : "user" ?>" selected disabled><?= $user !== null ? htmlentities($user -> getRole()) : "user" ?></option>
                        <option value="user">user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/users" class="btn btn-danger">Cancel</a>
            </form>

        </div>
    </div>
</div>