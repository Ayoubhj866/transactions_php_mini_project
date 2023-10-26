<?php
$invalideData = null;
if (isset($_SESSION['invalideData'])) {
    $invalideData = $_SESSION['invalideData'];
}
?>
<form method="POST" action="/register" class="col-3 m-auto">
    <h1 class="h3 mb-3 fw-normal">Registration</h1>

    <div class="form-floating">
        <input required type="text" name="username" class="form-control" id="floatingInput" placeholder="Yubi" value="<?= $invalideData !== null ? htmlentities($invalideData['username']) : null ?>">
        <label for="floatingInput">Username</label>
    </div>

    <div class="form-floating">
        <input required type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= $invalideData !== null ? htmlentities($invalideData['email']) : null ?>">
        <label for="floatingInput">Email address</label>
    </div>

    <div class="form-floating">
        <input required type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
        <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating">
        <input required type="password" name="cPassword" class="form-control" id="floatingPassword" placeholder="Confirm password">
        <label for="floatingPassword">Confirm password</label>
    </div>

    <div class="form-floating">
        <select name="role" class="form-control">
            <option selected value="<?= $invalideData === null ? "user" : $invalideData['role'] ?>" ><?= $invalideData === null ? "user" : $invalideData['role'] ?></option>
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select>
        <label for="floatingPassword">Select user role</label>
    </div>
    <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Register</button>
</form>

<?php unset($_SESSION['invalideData']) ?>