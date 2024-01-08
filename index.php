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
    $email = null;
    $pwd = null;
    $pwd2 = null;
    $check = false;

    $roles = findAllRoles();

    if (isset($_POST["inputEmail"])) {
        if (isNotEmpty($_POST["inputEmail"])) {
            $email = $_POST["inputEmail"];
        }
        if (isset($_POST["inputPassword"]) && isNotEmpty($_POST["inputPassword"])) {
            $pwd = $_POST["inputPassword"];
        }
        if (isset($_POST["inputPassword2"]) && isNotEmpty($_POST["inputPassword2"])) {
            $pwd2 = $_POST["inputPassword2"];
        }
        $check = checkPwd($pwd, $pwd2);
    }
    ?>
        <h1>Sign in your account</h1>
    <form class="row gx-3 gy-2 align-items-center" method="post">
  <div class="col-sm-3">
    <label class="visually-hidden" for="inputEmail">Email</label>
    <div class="input-group">
      <div class="input-group-text">📧</div>
    <input type="email" class="form-control" id="inputEmail" placeholder="email@domain.com">
    </div>
  </div>
  </div>
  <div class="col-sm-3">
    <label class="visually-hidden" for="inputPassword">Password</label>
    <div class="input-group">
      <div class="input-group-text">🔐</div>
      <input type="password" class="form-control" id="inputPassword" placeholder="Your password">
    </div>
  </div>
  <div class="col-sm-3">
    <label class="visually-hidden" for="inputPassword2">Repeat Password</label>
    <div class="input-group">
      <div class="input-group-text">🔐</div>
      <input type="password" class="form-control" id="inputPassword2" placeholder="Repeat password">
    </div>
  </div>
  <div class="col-sm-3">
    <label class="visually-hidden" for="specificSizeSelect">Preference</label>
    <select class="form-select" id="specificSizeSelect">
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
    <button type="submit" class="btn btn-primary">Sign in</button>
  </div>
</form>
<?php
if (!$check && !is_null($pwd)) {
    echo '<div class="alert alert-danger" role="alert">
    The passwords are not the same!
  </div>';
}
?>

<?php
function findAllRoles(): array {

    $condb = getConnection();

    $pdostmt = $condb->prepare("SELECT * FROM rol");

    $pdostmt->execute();
    $rol_arr = $pdostmt->fetchAll(PDO::FETCH_ASSOC);
    return $rol_arr;
}

function checkPwd(string $pwd, string $pwd2): bool {
    return $pwd != $pwd2;
}
?>
</body>
</html>