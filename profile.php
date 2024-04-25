<?php
	if (!isset($_COOKIE['User'])) {
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Раточка В.Л.</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel=”stylesheet” href=”https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css” />
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
    <div class="col-10">
            <div class="logo">
            </div>
            
        <div class="nav_bar">
            <div class="nav_text">Обо мне
            </div>
        </div>
        </div>
        <div class="container">
            <div class="row">
                <p class="header1">Коротко обо мне!</p>
                <div class="col-8">
                        Раточка Вячеслав Леонидович, ведущий специалист по информационной опаности. Дайте мне Burp и 3 литра кофе и вы лишитесь 
                        не только доступности, но и конфидиенциальности с целостностью.
                </div>
                <div class="col-2">
                    <div class="row my_photo">
                    </div>
                    <div class="row"><p class="my_photo_title">Раточка В.Л.</p></div>
                </div>
                <div class="col-12">Не является публичной офертой, взлом сугубо в рамках легального договора.</div>
            </div>
        </div>
        <div>
            <div class="container">
                <div class="row">
                    <div class="button_js_col-12">
                        <button id="myButton">Click me!</button>
                        <p id="demo"></p>
                        <script type="text/javascript" src="js/sc1.js"></script>
                    </div>
                </div>
            </div>
            <div class="container">
    <div class="row">
        <div class="col-11">
            <!--форма под посты-->
            <h1 class="hello">
                Ну здарова, <?php echo $_COOKIE['User']; ?>
            </h1>
            <form class="form_align" method="POST" action="profile.php" enctype="multipart/form-data" name="upload"> 
                <div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Озаглавь че нить!"> 
                </div>
                <textarea name="text" class="form-control" rows="10" placeholder="Напиши че нить!"></textarea>
                <input type="file" name="file" /><br>
                <button type="submit" class="btn btn-danger" name="submit">Coхранить че нить!</button>
            </form>
        </div>
    </div>
</div>


</div>
</body>
</html>

<?php
require_once('db.php');

$link = mysqli_connect('db', 'root', 'kali', 'first');

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $main_text = $_POST['text'];


    if (!$title || !$main_text) die ("Заполните все поля");

    $sql = "INSERT INTO posts (title, main_text) VALUES ('$title', '$main_text')";

    if (!mysqli_query($link, $sql)) die ("Не удалось добавить пост");
    if(!empty($_FILES["file"]))
    {
        if (((@$_FILES["file"]["type"] == "image/gif") || (@$_FILES["file"]["type"] == "image/jpeg")
        || (@$_FILES["file"]["type"] == "image/jpg") || (@$_FILES["file"]["type"] == "image/pjpeg")
        || (@$_FILES["file"]["type"] == "image/x-png") || (@$_FILES["file"]["type"] == "image/png"))
        && (@$_FILES["file"]["size"] < 1024000))
        {
            move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
            echo "Load in:  " . "upload/" . $_FILES["file"]["name"];
        }
        else
        {
            echo "upload failed!";
        }
    }
}
?>
