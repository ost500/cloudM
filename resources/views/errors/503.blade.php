<!DOCTYPE html>
<html>
<head>
    <title>Be right back.</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            color: #B0BEC5;
            display: table;
            font-weight: 100;
            font-family: 'Lato';
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .title {
            font-size: 72px;
            margin-bottom: 40px;
        }
    </style>


</head>
<body>
<div class="container">
    <div class="content">
        <div class="title">잘못된 경로입니다</div>
        <div class="content">3초 후 메인화면으로 이동합니다</div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function(){

        setTimeout(continueExecution, 3000);
    });


    function continueExecution() {
        window.location.assign("{{ url("/") }}");
    }
</script>


</body>
</html>
