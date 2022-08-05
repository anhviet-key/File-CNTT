<?php 
  Role::set_logout();
  Helper::redirect(Helper::get_url('Admincp/?v=common&a=login'));
?>
