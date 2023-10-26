  <form method="POST" action="/login" class="col-3 m-auto">
      <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

      <div class="form-floating">
          <input required type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
          <label for="floatingInput">Email address</label>
      </div>

      <div class="form-floating">
          <input required aria-required="The email field is required" type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
          <label for="floatingPassword">Password</label>
      </div>

      <button class="btn btn-primary w-100 py-2 mt-2" type="submit">Sign in</button>
  </form>