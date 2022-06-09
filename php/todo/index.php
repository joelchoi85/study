<?php
include './dbconn.php';

$sql = 'SELECT * from todo order by id desc';
$result = $conn->query($sql);
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To-Do LIST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/style.css" />
</head>
<body>
<div id="toDo" class="container">
    <div class="row justify-content-sm-center">
        <div class="col-sm-5">
            <form action="./app/add.php" method="POST" class="add_section">
                <div class="card">
                    <h2 class="card-header text-center">To Do List</h2>
                    <div class="gw-example">
                        <div class="form-group">
                            <input type="text" name="title" class="form-control" placeholder="할 일 추가하기" autofocus/>
                        </div>
                        <div class="d-grid margin-top-2">
                            <button type="submit" class="btn btn-primary">추가</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="row justify-content-sm-center">
        <div class="col-sm-5">
            <section class="show_todo_section margin-top-2">
                <?php if($result->num_rows <= 0 ) : ?>
                <div class="card gw-example">
                    <div class="card-body box-shadow border-radius-1">등록된 To Do가 없음</div>
                </div>
                <?php else: while ($row = $result->fetch_assoc() ): ?>
                <div class="card card-body">
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" onclick="location.href='./app/check.php?id=<?=$row['id']?>'" <?= $row['checked'] ? 'checked' : '' ?> />
                        </div>
                        <h5 class="<?=$row['checked'] ?'gw-checked':'' ?>"><?=$row['title'] ?></h5>
                        <a href="./app/remove.php?id=<?=$row['id'] ?>" id="<?=$row['id'] ?>" class="btn btn-outline-secondary btn-sm">삭제</a>
                    
                    </div>
                    <small>등록일시: <?=$row['datetime'] ?></small>

                </div>
            
                <?php endwhile;endif; ?>
            </section>
        </div>
    </div>
</div>
</body>
</html>