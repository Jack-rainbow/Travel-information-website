<?php
	include 'head.php';
?>
            <form method="post" action="publish_fb.php" enctype="multipart/form-data">
            	<div class="form-group">
                    <label for="exampleInputEmail1">文章标题</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="title" placeholder="文章标题">
                  </div>
                <div class="form-group">
                    <label for="column">栏目名称</label>
                    <select class="form-control" name="column">
                      <option>去哪儿网</option>
                      <option>携程旅游</option>
                      <option>同程旅游</option>
                      <option>蜜蜂旅游</option>
                      <!-- <option>健身1</option> -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="describe">文章描述</label>
                    <textarea class="form-control" rows="3" id="describe" name="describe"></textarea>
                  </div>
                <div class="form-group">
                    <label for="keyworld">关键词</label>
                    <input type="text" class="form-control" id="keyworld" name="keyworld" placeholder="关键词">
                  </div>
                  <h5>文章内容</h5>
                 <!--style给定宽度可以影响编辑器的最终宽度-->
				<script type="text/plain" id="myEditor" style="width:100%;height:300px;">
                    <p>请添加文章内容……</p>
                </script>
                <hr>
                <div class="form-group">
                    <label for="exampleInputFile">上传缩略图</label>
                    <input type="file" id="exampleInputFile" name="thumbnail"> 
                 </div>
                <input type="submit" class="btn btn-success" value="发布文章"> <input type="reset" class="btn btn-danger" value="重置内容">
                </form>
                <script type="text/javascript">
                    //实例化编辑器
                    var um = UM.getEditor('myEditor');
                   
                    
                </script>
            </div>
        </div>
        <div class="panel-footer" style="margin-top:50px;">
    		Copyright1999-2016 Face博客 .All Rights Reserved 京ICP证161188号
    	</div>
    </div>
</body>
</html>