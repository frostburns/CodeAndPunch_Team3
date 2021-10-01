<?php
    require_once "header.php";
?>

<div>
    <h1>Login</h1>
    <p>Don't have account? <a href="/register">Register here</a></p>
    <form action="/" method="POST" enctype= "multipart/form-data">
        <input type="text" name="username" placeholder="Username">
        <input type="password" name="password" placeholder="Password">
        <button type="submit" name="submit">Login</button>
    </form>
</div>

<?php
    require_once "footer.php";
?>
