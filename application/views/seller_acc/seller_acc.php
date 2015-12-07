<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<head>
<meta charset="utf-8">
<title>My Account</title>
</head>

<p id=your_acc>
	<b> Your Account </b>
</p>

<div id='results'>
    <?php echo $this->table->generate($users); ?>
</div>

<div id="left_side">
	<fieldset>
		<legend style="text-align:left"><b>Products:</b></legend>
		<br>
		<a href="<?php echo site_url('seller_acc/upload_form') ?>">Upload Product</a><br>
		<a href="<?php echo site_url('seller_acc/display_seller_prods') ?>">Display Uploaded Products</a><br>
		<a href="<?php echo site_url('seller_acc/edit_seller_prods') ?>">Edit Uploaded Product</a><br>
		<br>
		<br>
	</fieldset>
</div>


<div id="right_side">
	<fieldset>
	<legend style="text-align:left"><b>Settings</b></legend>
	<br>
	<a href="<?php echo site_url('seller_acc/update') ?>">Change Account Details</a>
	<br>
	<br>
	<br>
		<br>
		<br>
	</fieldset>
</div>

<div id ="center_s">
	<fieldset>
		<legend style="text-align:left"><b>UB sMart Wallet</b></legend>
		<br>
		Check Wallet Balance <br>
		Add money to wallet <br>
		<br>
		<br>
		<br>
	</fieldset>
</div>
<br>
<br>
<br>
<br>
<br>
