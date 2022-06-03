<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Папки</title>
    <link href="style.css" rel="stylesheet">
    <script src="index.js" type="module" r></script>
</head>
<body>
<?php
echo ('<div class="list-items" id="list-items">');
function getArr(){
    $conn=mysqli_connect("test1.com", "root", "root", "db");
    $query = "SELECT * from menu1";
    $result= mysqli_query($conn, $query);
    $arr = [];
    foreach ($result as $row){
        $arr[$row['id']]['hight']=$row['id_hight'];
        $arr[$row['id']]['name']=$row['name'];
        $arr[$row['id']]['low']=[];
        if(is_null($row['id_hight'])) continue;
        $arr[$row['id_hight']]['low'][$row['id']]=$row['id'];
    }
    mysqli_close($conn);
    return $arr;
}
$arr=getArr();
foreach ($arr as $item){
    if($item['hight']==""){
        render_menu($arr,$item);
    }
}
echo ('</div>');

function render_menu($arr, $item){
    if(count($item['low'])!=0){
        $div_head ="<div class=\"list-item \" data-parent>\n".
            "<div class=\"list-item__inner\">\n".
            "<img class=\"list-item__arrow\" src=\"./assets/img/chevron-down.png\" alt=\"chevron-down\" data-open>\n".
            "<img class=\"list-item__folder\" src=\"./assets/img/folder.png\" alt=\"folder\">\n".
            "<span>".$item['name']."</span>\n".
            "</div>\n".
            "<div class=\"list-item__items\">";
        echo($div_head);
        foreach ($item['low'] as $lower){
            render_menu($arr,$arr[$lower]);
        }
        echo('</div> </div>');
    }
    else{
        echo("<div class=\"list-item__inner\">\n".
            "<img class=\"list-item__folder\" src=\"./assets/img/folder.png\" alt=\"folder\">\n".
            "<span>".$item['name']."</span>\n".
            "</div>");
    }

}
?>

</body>
</html>