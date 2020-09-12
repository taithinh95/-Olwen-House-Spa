<?php
    $con = mysqli_connect('localhost','root','','test_db_project');
    mysqli_query($con,"set names 'utf8'");
    
/*
    mysqli_query($con,"set name utf8");
    mysqli_query($con,"SET character_set_results=utf8");
	mb_language('uni');
	mb_internal_encoding('UTF-8');
    mysqli_select_db($con,'test_db_project');
    */
    