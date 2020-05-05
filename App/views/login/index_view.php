<?php if(!defined('ROOT_APP_PATH')) die('can not access');?>

<div class="container">
	<div class="col-12 col-sm-12 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-6 offset-xl-3">
        
        <?php if($message === 'err'): ?>
            <div class="row my-2">
                <h5 class="text-center text-danger">tai khoan hoac mat khau khong dung</h5>
            </div>
        <?php elseif ($message === 'empty'): ?>
            <div class="row my-2">
                <h5 class="text-center text-danger">vui long nhap du lieu</h5>
            </div>
        <?php endif; ?>
        
	    <form class="my-3 p-3 border" action="?c=login&m=handle" method="post">
            <div class="form-group">
                <label for="username">User</label>
                <input type="text" id="username" name="user" class="form-control">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="pass" class="form-control">
            </div>
            <button class="btn btn-primary" type="submit" name="btnLogin">Login</button>
        </form>
	</div>
</div>
