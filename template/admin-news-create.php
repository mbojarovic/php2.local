<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <title>Php2, 1 урок</title>
</head>
<body>
<div class="container-fluid">

    <?php if (true == $_POST) : ?>

        <div class="alert alert-info" role = "alert" >
            <h4 class="top-name center-block text-center alert-heading" > Well done!</h4 >
            <p class = "top-name center-block text-center" > Your Article is </p >
            <p class="mb-0 top-name center-block text-center" > CREATED .</p >
        </div >

<?php else : ?>

    <form method="post" action="/admin-news-create.php">
        <div class="form-group">

            <label for="comment">Title:</label>
            <textarea class="form-control" rows="2" id="comment" name="title"></textarea>

            <label for="comment">Text:</label>
            <textarea class="form-control" rows="30" id="comment" name="text"></textarea>

            <input type="submit" value="Создать" class="btn btn-info">
            <?php endif; ?>
        </div>
    </form>
</div>
</body>
</html>