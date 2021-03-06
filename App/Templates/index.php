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
    <!-- Content here -->
    {% for news in article %}

    <article>

    <h1><a href="/news/one/?id={{news.id}}">{{news.title}}</a></h1>
    {{news.text}}
        {% if news.author is defined %}
        <p>Автор: {{news.author.firstname}}</p>
        {% endif %}

</article>

    {% endfor %}
    <!-- Content end -->
</div>
<div class="panel-footer">Copyright &copy {{ post.published_at|date("Y") }} || Load{{timer}}</div>
{{news.id}}
</body>
</html>