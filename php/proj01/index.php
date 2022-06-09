<?php
include './dbconn.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body>
<div class="container">
    <h4 class="display-4 text-center">로그인</h4>
    <form action="./login_check.php" method="post">
        <div class="mb-3">
            <label for = "mb_id">아이디</label>
            <input type="text" id= "mb_id" name="mb_id" class="form-control" />
        </div>
        <div class="mb-3">
            <label for = "mb_pw">비밀번호</label>
            <input type="password" id= "mb_pw" name="mb_pw" class="form-control" />
        </div>
        <button type="submit" class="btn btn-primary">로그인</button>
        <a href="./register.php" class="btn btn-secondary">회원가입</a>
    </form>
</div>
</body>
</html>