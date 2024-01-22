<?php
//setcookie("cookieTest[uno]", 1, time() + 3600);
//setcookie("cookieTest[dos]", 2, time() + 3600);
//setcookie("cookieTest[tres]", 3, time() + 3600);

if (isset($_COOKIE['cookiesTabla'])) {
    if(isset($_POST["btn-eliminar"])){
        foreach ($_COOKIE['cookiesTabla'] as $key => $value) {
            setcookie("cookiesTabla[$key]", false, time() - 3600);
        }
        header("Refresh:0");
    } 
}
?>
    <h1>Cookies Creadas</h1>
    <table class="table table-striped">
        <thead>
            <th>Cookie Name</th>
            <th>Cookie Value</th>
        </thead>
        <tbody>
<?php
        if(isset($_COOKIE['cookiesTabla'])){
            foreach ($_COOKIE['cookiesTabla'] as $key => $value) {
                echo "<tr><td>$key</td><td>$value</td></tr>";
            }
        }
?>
        </tbody>
    </table>
    <form method="post">
        <button  type="submit" class="btn btn-danger" name="btn-eliminar">Eliminar</button>
    </form>

