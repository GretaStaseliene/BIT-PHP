<?php
    include __DIR__ . '/partials/header.php';
?>

<main class="form-signin w-100 m-auto">
  <form method="POST">
  <img src="https://lh3.googleusercontent.com/3zkP2SYe7yYoKKe47bsNe44yTgb4Ukh__rBbwXwgkjNRe4PykGG409ozBxzxkrubV7zHKjfxq6y9ShogWtMBMPyB3jiNps91LoNH8A=s500" alt="youtube logo" class="logo" style="width: 250px">
    <h4 class="mb-3 fw-normal">Please sign up</h4>

    <?php 
      include __DIR__ . '/partials/messages.php'; 
    ?>

    <div class="form-floating">
      <input type="text" class="form-control" name="user_name" placeholder="Your nickname">
      <label for="floatingInput">User name</label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" name="email" placeholder="name@example.com">
      <label for="floatingInput">Email address</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign up</button>
  </form>
</main>

<?php
    include __DIR__ . '/partials/footer.php';
?>