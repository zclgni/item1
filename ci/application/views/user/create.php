<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
    .form-input{
        margin-top: 20px;
    }
	</style>
</head>
<body>

<div id="container">
	<h1><?php echo $title; ?></h1>

	<div id="body">
        <?php echo validation_errors(); ?>
        <?php echo @$error; ?></h1>
        <?php echo form_open_multipart('user/insert'); ?>

        <div class="form-input">
            <label for="title">用户名:</label>
            <input type="text" name="username" value="<?php echo set_value('username'); ?>" /><br />
        </div>

        <div class="form-input">
            <label for="title">手机号:</label>
            <input type="text" name="mobile" value="<?php echo set_value('mobile'); ?>" /><br />
        </div>

        <div class="form-input">
            <label for="title">年&nbsp;&nbsp;&nbsp;龄:</label>
            <input type="text" name="age" value="<?php echo set_value('age'); ?>" /><br />
        </div>

        <div class="form-input">
            <label for="title">头&nbsp;&nbsp;&nbsp;像:</label>
            <input type="file" name="avatar"  /><br />
        </div>
        <input type="submit" name="submit" value="提交" />

        </form>
    </div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>

</body>
</html>