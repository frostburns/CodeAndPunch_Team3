<?php require_once "header.php" ?>

<div>
    <h1>Modify <?=$data["user"]["username"]?> information</h1>
    <form action="/modify/query/<?=$data["user"]["username"]?>" method="POST" enctype= "multipart/form-data">
        <?php
            if($_SESSION["sessionType"] == "Teacher") {
                echo "<input type='text' name='fullname' placeholder='Full Name' value='" . $data["user"]["fullname"] . "'>";
            }
        ?>
        <input type="password" name="password" placeholder="Password">
        <input type="password" name="confirm" placeholder="Confirm Password">
        <input type="email" name="email" placeholder="Email" value=<?=$data["user"]["email"]?> >
        <input type="tel" name="phone" placeholder="Phone Number" value=<?=$data["user"]["phone"]?> >
        <?= "$data[message]<br>" ?>
        <button type="submit" name="submit">Register</button>
    </form>
</div>

<?php require_once "footer.php" ?>