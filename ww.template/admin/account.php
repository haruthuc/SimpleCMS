<?php include_once 'header.php'; ?>
<body>
	<?php include_once 'menu.php';?>
 
    <script>
        $(document).ready(function(){
            
            // $("#myModal").modal();
            
        });
        
       
    
    </script>

 	<div class="container well well-large">
            
        <div class="row">
    
         <?php MessageHelper::renderMessages();?>
                
    
            
        </div>    
            
    	<div class="row">
        	
        
        	<div class="span3">
            	<div class="row">
                	<div class="span3">
                  
                    	 <form class="form-search">
                          <legend>Hello ! <strong>Admin </strong>(<a href="#">Logout</a>)</legend>
                        	 <div class="input-append">
                             	<input type="text" class="span2 search-query">
                             	<button type="submit" class="btn">Search</button>
                             </div>
                        
                     	   </form>
                   
                    	
                    
                    
                    </div>
                
                
                </div>
            
			          
                <div class="row">
                    <div class="span3">
                        <ul class="nav nav-list">
                            <li class="nav-header">Người dùng</a></li>
                            <li class="nav-header"> <a href="#"> <i class="icon-th-large"></i> Danh sách người dùng</a></li>
 							<li class="nav-header"> <a href="#"> <i class="icon-glass"></i> Danh sách người hướng dẫn</a></li>
                            <li class="nav-header"> <a href="#"> <i class="icon-adjust"></i> Danh sách quản trị</a></li>
                            <li class="nav-header"> <a href="#"> <i class="icon-random"></i> Đăng ký nhận bản tin</a></li>
                            <li class="nav-header"> <a href="#"> <i class="icon-trash"></i> Người dùng Đã xóa</a></li>
                            <li class="divider"></li>        
                        </ul>
                    </div>
                 </div>  
                 
                 <div class="row">
                    <div class="span3">
                        <ul class="nav nav-list">
                            <li class="nav-header">Lượt sử truy cập </a></li>
                            <li class="nav-header"> <a href="#">Xem trong ngày</a></li>
                            <li class="nav-header"> <a href="#">Xem trong tháng</a></li>
                            <li class="nav-header"> <a href="#">Xem tất cả</a></li>
                     
                            <li class="divider"></li>        
                        </ul>
                    </div>
                 </div>  
                 
                 <div class="row">
                	<div class="span3">
               			<h3><small>Số thành viên:</small> 22</h3>
                        <h3><small>Tổng số bài học:</small> 22</h3>
                  	    <h3><small>Tổng số khóa học:</small> 32</h3>
                    </div>
                
                </div>   
                    
            </div>
            
        	<div class="span9">
            
            	<div class="row">
                	<div class="span9"> 
                    	<div class="page-header"> <h4> <i class="icon-user"></i> Danh sách Người dùng <a href="#myAccountModal" class="btn" role="button" data-toggle="modal" ><i class="icon-plus"></i> Tạo mới Người dùng</a></h4></div>
                    
                    </div>
                </div>
                
            	<div class="row">
                
                	<div class="span9">
                    
                    
                    	<!--  Begin table row -->
                    	<div class="row">
                        	<div class="span9">
                            	<table class="table table-striped table-bordered">
                            	<thead>
                                	<tr>
                                    	<th>#</th>
                                    	<th>Username</th>
                                    	<th>Email</th>
                                        <th>Role</th>
                                        <th>Thao tác</th>
                                    </tr>
                                
                                </thead>
                                
                                <tbody>
                                    <!--Begin table row -->
                               
                                    <?php
                                        foreach ($results as $key => $result) {
                                            $str = "<tr>";
                                            $str .= "<td>".($key+1)."</td>";
                                            $str .= "<td>".$result['username']."</td>";
                                            $str .= "<td>".$result['email']."</td>";
                                            $str .="<td>".$result['role']."</td>";
                                            $str .=' <td>
                                            <a href="#" class="btn btn-mi btn-info"  rel="tooltip" title="Chỉnh sửa"><i class="icon-edit"></i></a>
                                            <a href="../account/test/'.$result['id'].'" class="btn btn-mi btn-danger" rel="tooltip" title="Xóa"><i class="icon-remove"></i></a>
                                            </td>';
                                            $str .="</tr>";
                                            echo $str;
                                        
                                             
                                             
                                        }
                                           
                                            
                                            
                                            
                                            
                                
                                    
                                    
                                    ?>
                                      
                            	</tbody>
                            </table>
                            
                            
                            
                            </div>
                            
                        </div>	
                        
                        <!--  End table row -->
                        
                        
                            
                            
                            
                            
                            
                            
                  
                          
                            
                    
                    </div>
                
                </div>
         		

            </div>
        
        
        </div>
        
        
                <!-- Modal -->
        <div id="myAccountModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <form name="user" action="../account/create" method="post">    
            
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Tạo tài khoản người dùng</h3>
        </div>
        
            
        <div class="modal-body">
            
          
                           
                                    <div class="controls">
                                		<label class="span2">Tên đăng nhập</label>
                                		<input class="span4" type="text" placeholder="Tên đăng nhập" name="username" autocomplete="off"/>
        							</div>
                                    <div class="controls">
                                    	<label class="span2">Mật khẩu</label>
                                		<input class="span4" type="password" placeholder="Mật khẩu" name="password" autocomplete="off"/>
                                    </div>
                                  
                                    <div class="controls">
                                    	<label class="span2">Email</label>
                                    	<input class="span4" type="text" placeholder="Email" name="email" autocomplete="off"/>
                                    </div>

                                     <div class="controls">
                                    	<label class="span2">Phân quyền</label>
                                    	<select class="span2" name="permission">
                                        	<option>Người dùng</option>
                                        	<option>Người đăng bài</option>
                                            <option>Quản trị</option>
                                        </select>
                                    
                                    </div>
            
        </div>
        <div class="modal-footer">
        <button  type="reset" class="btn" data-dismiss="modal" aria-hidden="true">Đóng</button>
        <button type="submit" class="btn btn-primary">Tạo tài khoản</button>
        </div>
        </div>    
         </form>

                    <!-- Modal -->
    
    </div>  
 
	

</body>
</html>
