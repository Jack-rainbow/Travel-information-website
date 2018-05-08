<?php
	include 'head.php';
	include 'sql.php';
	$id=$_GET['id'];
	$sql="SELECT * FROM ht_fabu WHERE ht_id=$id";
	$result=$conn->query($sql);
	$f=$result->fetch_assoc();
?>
            <form method="post" action="dedit.php?id=<?php echo $id;?>" enctype="multipart/form-data">
            	<div class="form-group">
                    <label for="exampleInputEmail1">文章标题</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" 
                    	value="<?php echo $f['ht_title'];?>" placeholder="文章标题">
                  </div>
                <div class="form-group">
                    <label for="column">栏目名称</label>
                    <select class="form-control" name="column">
                      <option <?PHP if($f['ht_column']=='健身1'){echo 'selected';}?> >健身1</option>
                      <option <?PHP if($f['ht_column']=='健身2'){echo 'selected';}?> >健身2</option>
                      <option <?PHP if($f['ht_column']=='健身3'){echo 'selected';}?> >健身3</option>
                      <option <?PHP if($f['ht_column']=='健身4'){echo 'selected';}?> >健身4</option>
                      <option <?PHP if($f['ht_column']=='健身5'){echo 'selected';}?> >健身5</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="describe">文章描述</label>
                    <textarea class="form-control" rows="3" id="describe" name="describe"> <?php echo $f['ht_describe'];?></textarea>
                  </div>
                <div class="form-group">
                    <label for="keyworld">关键词</label>
                    <input type="text" class="form-control" id="keyworld" name="keyworld" placeholder="关键词"
                    	value="<?php echo $f['ht_keyword'];?>">
                  </div>
                  <h5>文章内容</h5>
                 <!--style给定宽度可以影响编辑器的最终宽度-->
				<script type="text/plain" id="myEditor" style="width:100%;height:300px;">
                    <p><?php echo $f['ht_content'];?></p>
                </script>
                <hr>
                <div class="form-group">
                    <label for="exampleInputFile">上传缩略图</label>
                    <input type="file" id="exampleInputFile" name="thumbnail"> 
                 </div>
                <input type="submit" class="btn btn-success" value="修改文章">
                <input type="reset" class="btn btn-danger" value="重置内容">
                </form>
                <script type="text/javascript">
                    //实例化编辑器
                    var um = UM.getEditor('myEditor');
                   
                    
                </script>
            </div>
        </div>
        <div class="panel-footer" style="margin-top:50px;">
    		Copyright1999-2016 Face健身 .All Rights Reserved 京ICP证161188号
    	</div>
    </div>
</body>
</html>