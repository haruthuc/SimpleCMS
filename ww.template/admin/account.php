<?php include_once 'header.php'; ?>
<body>
	<?php include_once 'menu.php';?>
 


 	<div class="container well well-large">
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
                    	<div class="page-header"> <h4> <i class="icon-user"></i> Danh sách Người dùng <button class="btn" type="button"><i class="icon-plus"></i> Tạo mới Người dùng</button></h4></div>
                    
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
                                            <a href="#" class="btn btn-mi btn-danger" rel="tooltip" title="Xóa khóa học"><i class="icon-remove"></i></a>
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
                        
                        
                            
                            
                            
                            
                            
                            
                         <div class="row">
                         		<div class="span9">
                                	<div class="pagination pagination-right">
           							 <ul>
                                        <li><a href="#">&laquo;</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li><a href="#">&raquo;</a></li>
                                     </ul>
          					  </div>
                                
                                </div>
                         	
                         </div> 
                          
                            
                    
                    </div>
                
                </div>
         		

            </div>
        
        
        </div>
        
        
    
    
    </div>  
 
	

</body>
</html>
