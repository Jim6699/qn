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
$uid = $_POST['uid'];
// 插入数据
// mysql_query("INSERT INTO qingning(XM,UID,ZK,ZZ,MJ,JW,DZ,ZX,SX,FX) VALUES ('$name','$uid','$zhuangtai','$zhengzhuang','$mijie','$jwd','$dizhi','$zaixiao','$shixi','$fengxian')",$link) or die('添加数据出错：'.mysql_error()); 

$result = mysql_query("SELECT * FROM qingning WHERE UID =$uid",$link) or die('修改数据出错：'.mysql_error()); 
echo '<script>alert("提交成功！");location.href="'.$url.'"</script>';
