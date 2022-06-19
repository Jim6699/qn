<?php
// 处理增加操作的页面 
require "dbconfig.php";
// 连接mysql
$link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败！");
// 选择数据库
mysql_select_db(DBNAME,$link);
// 编码设置
mysql_set_charset('utf8',$link);

// 获取增加的新闻
$name = $_POST['name'];
$uid = $_POST['uid'];
$zhuangtai = $_POST['zhuangtai'];
$zhengzhuang = $_POST['zhengzhuang'];
$mijie = $_POST['mijie'];
$jwd = $_POST['jwd'];
$dizhi = $_POST['dizhi'];
$zaixiao = $_POST['zaixiao'];
$shixi = $_POST['shixi'];
$fengxian = $_POST['fengxian'];
$token = $_POST['token'];
// 插入数据
// mysql_query("INSERT INTO qingning(XM,UID,ZK,ZZ,MJ,JW,DZ,ZX,SX,FX) VALUES ('$name','$uid','$zhuangtai','$zhengzhuang','$mijie','$jwd','$dizhi','$zaixiao','$shixi','$fengxian')",$link) or die('添加数据出错：'.mysql_error()); 

mysql_query("UPDATE qingning SET XM='$name',UID='$uid',ZK='$zhuangtai',ZZ='$zhengzhuang',MJ='$mijie',JW='$jwd',DZ='$dizhi',ZX='$zaixiao',SX='$shixi',FX='$fengxian',TK='$token' WHERE UID =$uid",$link) or die('修改数据出错：'.mysql_error()); 
$url = 'addnews.html';
// $txt = "提交成功!" + "\n" + "经纬度：$jwd" + "\n" + "地址：$dizhi";
echo '<script>alert("提交成功！后期注意打卡信息提醒");location.href="'.$url.'"</script>';
// header("Location:index.php");  
