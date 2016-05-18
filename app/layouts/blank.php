<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="TestTask">
    <meta name="author" content="demian2g">

    <title>Show me everything</title>

    <script src="http://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<!--    <script src="/js/map.js" type="text/javascript"></script>-->

</head>
<body>
<style>
    html, body, #map {
        margin: 0;
        padding: 0;

        width: 100%;
        height: 100%;
    }
</style>
    <?php include 'app/views/'.$this->modelName.'/'.$view.'.php'; ?>
</body>
</html>