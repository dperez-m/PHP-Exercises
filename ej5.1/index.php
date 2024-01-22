<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiero irme a mi casa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
  <?php
  require_once "connection.php";
  require_once "insertuser.php";

  $email = null;
  $pwd = null;
  $pwd2 = null;
  $role = null;
  $check = false;

  $roles = findAllRoles();

  if (isset($_POST["inputEmail"])) {
    $email = $_POST["inputEmail"];
    if (isset($_POST["inputPassword"])) {
      $pwd = $_POST["inputPassword"];
    }
    if (isset($_POST["inputPassword2"])) {
      $pwd2 = $_POST["inputPassword2"];
    }
    if (isset($_POST["inputRole"])) {
      $role = $_POST["inputRole"];
    }
    if (checkPwd($pwd, $pwd2)) {
      if (checkemail($email)) {
        insertuser($email, $pwd, $role);
      }
    }
  }
  ?>
  <h1>Sign up</h1>
  <form class="row gx-3 gy-2 align-items-center" method="post">
    <div class="col-sm-3">
      <label class="visually-hidden" for="inputEmail">Email</label>
      <div class="input-group">
        <div class="input-group-text">📧</div>
        <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="email@domain.com">
      </div>
    </div>
    </div>
    <div class="col-sm-3">
      <label class="visually-hidden" for="inputPassword">Password</label>
      <div class="input-group">
        <div class="input-group-text">🔐</div>
        <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Your password">
      </div>
    </div>
    <div class="col-sm-3">
      <label class="visually-hidden" for="inputPassword2">Repeat Password</label>
      <div class="input-group">
        <div class="input-group-text">🔐</div>
        <input type="password" class="form-control" id="inputPassword2" name="inputPassword2" placeholder="Repeat password">
      </div>
    </div>
    <div class="col-sm-3">
      <label class="visually-hidden" for="specificSizeSelect">Preference</label>
      <select class="form-select" id="inputRole" name="inputRole">
        <option selected>Choose role</option>
        <?php
        if (count($roles) > 0) :
          foreach ($roles as $role) :
        ?>
            <option value="<?= $role["id"] ?>"><?= $role["name"] ?></option>
        <?php
          endforeach;
        endif;
        ?>
      </select>
    </div>
    <div class="col-auto">
      <button type="submit" class="btn btn-primary">Sign up</button>
    </div>
  </form>
  <?php
  function findAllRoles(): array
  {

    $condb = getConnection();

    $pdostmt = $condb->prepare("SELECT * FROM rol");

    $pdostmt->execute();
    $rol_arr = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
    return $rol_arr;
  }

  function checkPwd(string $pwd, string $pwd2): bool
  {
    if ($pwd != $pwd2) {
      echo '<div class="alert alert-danger" role="alert"> The passwords are not the same!</div>';
      return false;
    } else return true;
  }

  function checkEmail(string $email): bool {
    $condb = getConnection();

    $pdostmt = $condb->prepare("SELECT email FROM usuario WHERE email LIKE :search");
    $pdostmt->bindParam(":search", $email);

    $pdostmt->execute();
    $rol_arr = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
    if (!empty($rol_arr)) {
      echo '<div class="alert alert-danger" role="alert"> The email is already registered!</div>';
      return false;
  } else return true;
}
  ?>
</body>
</html>