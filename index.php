<?php
    function finMax5($array){
        for($i=0;$i<count($array);$i++){
            for($j = $i+1; $j<count($array);$j++){
                if($array[$i]<$array[$j]){
                    $temp = 0;
                    $temp = $array[$i];
                    $array[$i] = $array[$j];
                    $array[$j] = $temp;
                }
            }
        }
        return array_slice($array,0,5);
    }

    function findFrequent($array){
        $b=[];
        $max = 1;
        for($i=0;$i<count($array);$i++){
            $b[$i] = 0;
        }
        for($i=0;$i<count($array);$i++){
            for($j=$i;$j<count($array);$j++){
                if($array[$i] === $array[$j]){
                   $b[$i]++;
                }
            }
        }
        for($i=0;$i<count($array);$i++){
            if($b[$i] > $max){
                $max = $b[$i];
            }
        }
        for($i=0;$i<count($array);$i++){
            if($b[$i] == $max){
                $string = '';
                $string = $array[$i];
                if($string === true){
                    $string = 'true';
                }
                if($string === false){
                    $string = 'false';
                }
                if($string === null){
                    $string = 'null';
                }
                echo 'Ký tự '.$string.' lặp lại '.$b[$i].' lần<br>';
            }
        }
    }
    function echoHtml($array){
        for($i=0; $i<count($array);$i++){
            echo ' '.$array[$i];
        }

    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
        integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
    </script>
    <title>Bài test</title>
</head>

<body>
    <div class="container">
        <div class="row" style="margin-top:30px">
            <div class="col">
                <?php 
                echo "<h4>5 số lớn nhất ra đầu mảng</h4> <br>";
                echo "findMax5([3,4,5,3,2,3,10,11])<br>=>";
                echoHtml(finMax5([3,4,5,3,2,3,10,11]));
                echo "<br>";
                echo "findMax5([14,12,38,17,10,36,12,29,45,34,48,22])<br>=>";
                echoHtml(finMax5([14,12,38,17,10,36,12,29,45,34,48,22]));
                echo "<br>";
                echo "findMax5([10,11,2,30,22,6,8,9,11,12,22]) <br>=>";
                echoHtml(finMax5([10,11,2,30,22,6,8,9,11,12,22]));
                echo "<h4>trả ra phần tử xuất hiện nhiều lần nhất trong mảng</h4> <br>";
                echo "findFrequent([3, 7, 3])<br>=>";
                findFrequent([3, 7, 3]);
                echo 'findFrequent([null, "hello", true, null])<br>=>';
                findFrequent([null, "hello", true, null]);
                echo 'findFrequent([false, "up", "down", "left", "right", true, false])<br>=>';
                findFrequent([false, "up", "down", "left", "right", true, false]);
            ?>
            </div>
            <div class="col">
                <form method=post action="xuly.php">
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Họ Và Tên</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Số Điện Thoại</label>
                        <input type="number" class="form-control" name="phone" id="phone" required>
                    </div>
                    <div class="mb-3">
                        <label for="floatingTextarea2" class="form-label">Nội Dung Liên Hệ</label>
                        <textarea class="form-control" id="floatingTextarea2" name="content" id="content"
                            style="height: 100px"></textarea>
                    </div>

                    <button type="reset" class="btn btn-primary">Clear</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
        <div class="row">
            <?php
                require_once "config.php";
                $sql = "SELECT * FROM lienhe";
                $result = $conn->query($sql);
            ?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Họ Và tên</th>
                        <th scope="col">Email</th>
                        <th scope="col">Số Điện Thoại</th>
                        <th scope="col">Nội Dung</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        ?>
                        <tr>
                            <th scope="row"></th>
                            <td><?=$row['name']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['phone']?></td>
                            <td><?=$row['content']?></td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>