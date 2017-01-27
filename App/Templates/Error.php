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

    <style type="text/css">
        html{
        }
        body{
            margin: 0;
            padding: 0;
            background: #e7ecf0;
            font-family: Arial, Helvetica, sans-serif;
        }
        *{
            margin: 0;
            padding: 0;
        }
        p{
            font-size: 12px;
            color: #373737;
            font-family: Arial, Helvetica, sans-serif;
            line-height: 18px;
        }
        p a{
            color: #218bdc;
            font-size: 12px;
            text-decoration: none;
        }
        a{
            outline: none;
        }
        .f-left{
            float:left;
        }
        .f-right{
            float:right;
        }
        .clear{
            clear: both;
            overflow: hidden;
        }
        #block_error{
            width: 845px;
            height: 384px;
            border: 1px solid #cccccc;
            margin: 72px auto 0;
            -moz-border-radius: 4px;
            -webkit-border-radius: 4px;
            border-radius: 4px;
            background: #fff url(http://www.ebpaidrev.com/systemerror/block.gif) no-repeat 0 51px;
        }
        #block_error div{
            padding: 100px 40px 0 186px;
        }
        #block_error div h2{
            color: #218bdc;
            font-size: 24px;
            display: block;
            padding: 0 0 14px 0;
            border-bottom: 1px solid #cccccc;
            margin-bottom: 12px;
            font-weight: normal;
        }
    </style>
</head>

<body>
<div class="container-fluid">
    <body marginwidth="0" marginheight="0">
    <div id="block_error">
        <div>
            <h5><?php echo 'Возникла ошибка: ' . $errors; ?></h5>
        </div>
    </div>
    </body>

</div>
</body>
</html>