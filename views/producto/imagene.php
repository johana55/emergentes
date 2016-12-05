<!DOCTYPE html>
<html>
<head>
    <title>Multiple file upload Demo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width">
    <style>
        .MultiFile-list {
            width: 100%;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .MultiFile-label {
            background-color: #DADADA;
            border: 1px solid #EEEEEE;
            font-size: 16px;
            padding: 10px;
            width: 300px;
        }

        .MultiFile-list a {
            color: red;
            text-decoration: none;
        }

        .MultiFile-list span {

        }
    </style>
    <script src='assets/js/help-multiFile.js' type="text/javascript"></script>
    <script src='assets/js/multi-file.js' type="text/javascript" language="javascript"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('#demo1').MultiFile({
                list: '#demo1-list'
            });
        });
    </script>
</head>
<body>
<form action="" method="post">
        <input id="demo1" name="imagen[]" type="file" class="multi" accept="gif|jpg|png" maxlength="3" />
        <div id="demo1-list"></div>
        <p><input type="submit" name="upload" value="subir" /></p>
</form>

</body>
</html>