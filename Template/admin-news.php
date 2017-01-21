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
    <div class="col-md-15 col-md-offset-1">

        <div class="panel-body">
            <table class="table table-striped table-bordered table-list">
                <thead>
                <tr>
                    <th><em class="fa fa-cog"><a class="btn btn-info" href="/admin-news-create.php">Create New Article<em class="fa fa-trash"></em></a></em></th>
                    <th>Title</th>
                </tr>
                </thead>
                <tbody>

                <?php foreach ($news as $article): ?>

                    <tr>
                        <td align="center">
                            <a class="btn btn-warning" href="/admin-news-update.php?id=<?php echo $article->id ?>">UPDATE<em class="fa fa-trash"></em></a>
                            <a class="btn btn-danger" href="/admin-news-delete.php?id=<?php echo $article->id ?>">DELETE<em class="fa fa-trash"></em></a>
                        </td>
                        <td><?php echo $article->title; ?></td>
                    </tr>

                <?php endforeach; ?>

                </tbody>
            </table>

        </div>
    </div>
</body>
</html>