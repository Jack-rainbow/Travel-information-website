<?php
	include 'head.php';
	include 'sql.php';
	$sql='SELECT *FROM ht_fabu';
	$result=$conn->query($sql);
?>
  <!--SQL数据如何查询某一条 
  sql数据如何降序     -->     
            	<table class="table">
                    <tr>
                        <th>id</th>
                        <th>文章标题</th>
                        <th>发布日期</th>
                        <th>操作</th>
                    </tr>
                   
                   <?php
                   	if($result->num_rows>0){
						while($f = $result->fetch_assoc())
						{	
                   			
                   ?>
                    <tr>
                        <td><?php echo $f['ht_id'];?></td>
                        <td><?php echo mb_substr($f['ht_title'],0,35,'utf8');?></td>
                        <td><?php date_default_timezone_set('UTC');echo date('Y-m-d H:i:s',$f['ht_date']);?></td>
                        <td><a href="delete.php?id=<?php  echo $f['ht_id'];?>">删除</a> 
                        	
                        	<a href="edit.php?id=<?php  echo $f['ht_id'];?>">修改</a>
                        </td>
                    </tr>
                    <?php
                   		}
					}
                   ?>           
                </table>

            </div>
        </div>
        <div class="panel-footer" style="margin-top:50px;">
    		Copyright1999-2016 Face健身 .All Rights Reserved 京ICP证8888号
    	</div>
    </div>
</body>
</html>