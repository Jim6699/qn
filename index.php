<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>青柠打卡后台管理系统</title>
</head>
<style type="text/css">
.wrapper {margin:auto;width:auto;}
h2 {text-align: center;}
.add {margin-bottom: 20px;}
.add a {text-decoration: none;color: #fff;background-color: green;padding: 6px;border-radius: 5px;}
td {text-align: center;}
</style>
<!--<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=no">-->
<body>
	<div class="wrapper">
	    <h2>流海后台管理系统</h2>
		<div class="add">
			<a href="addnews.html">增加账号</a>
		</div>
		<table width="1560" border="1">
			<tr>
				<th>姓名</th>
				<th>账号UID</th>
				<th>身体状态</th>
				<th>出现症状</th>
				<th>密接情况</th>
				<th>经纬度</th>
				<th>地址</th>
				<th>在校情况</th>
				<th>实习情况</th>
				<th>风险等级</th>
				<th>token</th>
				<th>操作</th>
			</tr>

			<?php
				// 1.导入配置文件
				require "dbconfig.php";
				// 2. 连接mysql
				$link = @mysql_connect(HOST,USER,PASS) or die("提示：数据库连接失败！");
				// 选择数据库
				mysql_select_db(DBNAME,$link);
				// 编码设置
				mysql_set_charset('utf8',$link);

				// 3. 从DBNAME中查询到news数据库，返回数据库结果集,并按照addtime降序排列  
				$sql = 'select * from qingning';
				// 结果集
				$result = mysql_query($sql,$link);
				// var_dump($result);die;

				// 解析结果集,$row为新闻所有数据，$newsNum为新闻数目
				$newsNum=mysql_num_rows($result);  

				for($i=0; $i<$newsNum; $i++){
					$row = mysql_fetch_assoc($result);
					echo "<tr>";
					echo "<td>{$row['XM']}</td>";
					echo "<td>{$row['UID']}</td>";
					echo "<td>{$row['ZK']}</td>";
					echo "<td>{$row['ZZ']}</td>";
					echo "<td>{$row['MJ']}</td>";
					echo "<td>{$row['JW']}</td>";
					echo "<td>{$row['DZ']}</td>";
					echo "<td>{$row['ZX']}</td>";
					echo "<td>{$row['SX']}</td>";
					echo "<td>{$row['FX']}</td>";
					echo "<td>{$row['TK']}</td>";
					echo "<td>
							<a href='javascript:del({$row['id']})'>删除</a>
						  </td>";
					echo "</tr>";
				}
				// 5. 释放结果集
				mysql_free_result($result);
				mysql_close($link);
			?>

		</table>
	</div>

	<script type="text/javascript">
		function del (id) {
            	var person=prompt("请输入管理员密码","");
            	if (person!="147258369"){
                    if (confirm("你没有该权限!")){
            	    window.location = "index.php";
            	}
            }else{
            	 if (confirm("确定删除这条数据吗？")){
            	 window.location = "action-del.php?XM="+XM;
            	}
			}
		}
	</script>
</body>
</html>
