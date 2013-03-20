<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php $this->register->assets->render(); ?>  
        <title>Admin CP</title>
    </head>

    <body>
        <div class="container">
            <div class="row">


                <div class="span3"></div>


                <div class="span6 well well-large loginbox">
                    <form class="form-horizontal" method="POST" action="../admin/index/login">
                        <legend> <strong> Admin </strong> Login Page</legend>
                        <div class="control-group">
                            <label class="control-label" for="txtUsername">Username </label>
                            <div class="controls">
                                <input type="text" id="txtUsername" placeholder="Username" name="username">
                            </div>

                        </div>
                        <div class="control-group">
                            <label class="control-label" for="txtPassword">Password </label>
                            <div class="controls">
                                <input type="password" id="txtPassword"  placeholder="Password" name="password">
                            </div>

                        </div>


                        <button type="submit" class="btn btn-block btn-primary btn-large"> <i class="icon-user"></i>  <strong> Login</strong> </button>




                    </form>


                </div>

                <div class="span3"></div>

            </div>
            
      
            
        </div>

    </body>
</html>
