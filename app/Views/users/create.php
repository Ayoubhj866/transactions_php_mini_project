<div class=" w-100">
    <div class="col-sm-12 col-lg-6 m-auto card">
        <div class="card-header">
            Create new user
        </div>
        <div class="card-body">
            <form method="POST" action="/transactions/create">
                <div class="input-group mb-3">
                    <span class="input-group-text">Username</span>
                    <input type="text" class="form-control" name="username">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Email</span>
                    <input type="text" class="form-control" name="email">
                </div>

                <div class="input-group mb-3">
                    <span class="input-group-text">Role</span>
                    <select name="role" class="form-control" id="">
                        <option value="user" selected >user</option>
                        <option value="admin">admin</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
                <a href="/users" class="btn btn-danger">Cancel</a>
            </form>

        </div>
    </div>
</div>