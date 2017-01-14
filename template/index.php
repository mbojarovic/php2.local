<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Php2, 1 урок</title>
</head>
<body>

<?php foreach ($article as $articles): ?>
    <h1><a href="/article.php?id=<?php echo $articles->id; ?>"><?php echo $articles->title; ?></a></h1>
<article><?php echo $articles->text; ?></article>

<?php endforeach ?>

</body>
</html>