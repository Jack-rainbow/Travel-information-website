<?php
header('Content-type:text/html;charset=utf8');
include 'sql.php';
$q = $_GET['q'];
$sql="SELECT ht_title,ht_id FROM ht_fabu ";
$result=$conn->query($sql);
$data=array();
$hre=array();
while($f=$result->fetch_assoc()){
	$data[] =$f['ht_title'];
	$hre[]=$f['ht_id'];
};
/*echo '<pre>';
var_dump($data);
var_dump($hre);
exit;*/
$resultStr = '';//符合你查找的数据进行一个拼接的变量
$resultIdStr = '';//符合你查找的数据进行一个拼接的变量
//	根据查找的数据  进行和后台数据一个匹配  长度 a 的长度为1，所以比较数据当中的第一个字符就可以 
$len = strlen($q);
for($i=0;$i<count($data);$i++)
{
	if( $q == substr($data[$i],0,$len) )
	{
		if( empty( $resultStr ) )
		{
			$resultIdStr .= $hre[$i];
			$resultStr.=$data[$i];
		}
		else
		{
			$resultIdStr.='---'.$hre[$i];
			$resultStr.='---'.$data[$i];
		};
	};	
};
$resultSt=explode('---', $resultStr);
$resultid=explode('---', $resultIdStr);

	
	for($k=0;$k<count($resultSt);$k++){
	
	?>

 	<a href="content.php?id=<?php echo $resultid[$k];?>"><?php echo $resultSt[$k]; ?></a>
	<br>

	<?php
	}
	
	
	?>