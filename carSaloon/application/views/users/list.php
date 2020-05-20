<!DOCTYPE html>
<html>
<head>
  <title>Luxury Car Sales Blog</title>
  <link rel="stylesheet" href="https://bootswatch.com/3/cerulean/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css">
  <script src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>
<body>
<nav class ="navbar navbar-inverse">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="<?php echo base_url(); ?>">Luxury Car Sales</a>
    </div>
    <div id = "navbar">
      <ul class="nav navbar-nav">
        <li><a href="<?php echo base_url(); ?>">Home</a></li>
        <li><a href="<?php echo base_url(); ?>about">About</a></li>
        <li><a href="<?php echo base_url(); ?>posts">Blog</a></li>
        <li><a href="<?php echo base_url(); ?>categories">Categories</a></li>
        <li><?php echo anchor(base_url('users/list/'),'Users');?></li>
        
        
        

      </ul>
      <ul class="nav navbar-nav navbar-right">
        <?php if(!$this->session->userdata('logged_in')): ?>
        <li><a href="<?php echo base_url(); ?>users/register">Register</a></li>


        <li><a href="<?php echo base_url(); ?>users/login">Login</a></li>



      <?php endif; ?>
      <?php if($this->session->userdata('logged_in')): ?>
        <li><a href="<?php echo base_url(); ?>posts/create">Create Post</a></li>
        <li><a href="<?php echo base_url(); ?>categories/create">Create Category</a></li>
        <li><a href="<?php echo base_url(); ?>users/logout">Logout</a></li>

      <?php endif; ?>


      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <?php if($this->session->flashdata('user_registered')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_registered').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_created').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_updated')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_updated').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('category_created')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('category_created').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('post_deleted')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('post_deleted').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('login_failed')): ?>
    <?php echo '<p class="alert alert-danger">'.$this->session->flashdata('login_failed').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_loggedin')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
  <?php endif; ?>

  <?php if($this->session->flashdata('user_loggedout')): ?>
    <?php echo '<p class="alert alert-success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
  <?php endif; ?>


  <?php  
 $connect = mysqli_connect("localhost", "root", "root", "luxurycar");  
 $query ="SELECT * FROM posts ORDER BY id desc";  
 $result = mysqli_query($connect, $query); 
 ?>  




























  


<?php foreach($users as &$user): ?> 
<div class="well">     
    <table class="table">
      <thead>
        <tr>
          <th>ID</th>
          <th>zipcode</th>
          <th>name</th>
          <th>email</th>
          <th>username</th>   
          <th>admin</th>      
          <th style="width: 36px;"></th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><?=$user->id?></td>
          <td><?=$user->name?></td>
          <td><?=$user->zipcode?></td>
          <td><?=$user->email?></td>
          <td><?=$user->username?></td>
          <td><?=$user->admin?></td>
          <td>
        </tr>
      </tbody>
       
    </table>
    
    </div>
   <?php endforeach; ?>






   