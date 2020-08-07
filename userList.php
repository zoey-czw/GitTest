<?php
header("Content-Type:text/html;charset=utf-8");

$type = $_GET['type'];
$page = $_GET['page'];
$name = $_GET['name'];
$sex = $_GET['sex'];
$age = $_GET['age'];
$phone = $_GET['phone'];
$userId = $_GET['userId'];

//打开数据库
$link = mysqli_connect('localhost','root','123456789','zoey2');
if(!$link){
    echo "{'err':0,'msg':'数据库链接失败'}";
    die();
}

//设置编码
mysqli_set_charset($link,'utf-8');

//判断数据请求  翻页----页面打开
if($type=='page') {
    $all_sql = 'select *from userlist ';
    $all_res = mysqli_query($link,$all_sql);

    //获取数据总条数
    $total = mysqli_affected_rows($link);

    //获取每页起始位置
    $start = ($page-1)*8;
    // 查询当前页码的数据
    $page_sql = "select * from userlist order by id limit $start,8";
    $page_res = mysqli_query($link,$page_sql);
    $page_arr = mysqli_fetch_all($page_res,1);
    $data = json_encode($page_arr);
    if (count($page_arr) > 0) {
        echo '{"err":1,"msg":"分页数据","total":'.$total.',"data":'.$data.'}';
    } else {
        echo '{"err":0,"msg":"暂无数据","total":"","data":""}';
    }
}else if($type === 'update'){
    //更新数据
    $update_sql = "update userlist set name='$name',sex='$sex',age='$age',phone='$phone' where id='$userId'";
    $update_res = mysqli_query($link, $update_sql);
    $num = mysqli_affected_rows($link);
    if($num>0){
        echo '{"err":1,"msg":"修改成功"}';
    }else{
        echo '{"err":0,"msg":"修改失败"}';
    }
}else if($type === 'delete'){

}
mysqli_close($link);

?>