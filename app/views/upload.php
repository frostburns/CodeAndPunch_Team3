<?php require_once "header.php" ?>

<div>
    <h1>Upload your file</h1>
    <form action="/upload/<?=$data["type"]?>" method="POST" enctype= "multipart/form-data">
        <label>Homework:</label>
        <input type="file" name="file" accept=".pdf, .doc, .docx, .txt">
        <label>Deadline:</label>
        <input type="date" id="deadline" name="deadline" value="<?=date("Y-m-d")?>" min="<?=date("Y-m-d")?>">
        <?= "$data[message]<br>" ?>
        <button type="submit" name="submit">Upload</button>
    </form>
</div>

<?php require_once "footer.php" ?>