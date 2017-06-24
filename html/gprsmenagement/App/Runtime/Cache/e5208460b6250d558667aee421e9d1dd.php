<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title></title>
    <script src="__ROOT__/Public/jquery/js/jquery-1.3.2.min.js" type="text/javascript"></script>
    <link href="__ROOT__/Public/jquery/mini/lib/ligerUI/skins/Aqua/css/ligerui-all.css" rel="stylesheet" type="text/css" />
    <script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/core/base.js" type="text/javascript"></script>
    <script src="__ROOT__/Public/jquery/mini/lib/ligerUI/js/plugins/ligerTree.js" type="text/javascript"></script>
    <script type="text/javascript">
        $(function ()
        {
            $("#tree1").ligerTree({ checkbox: true });
            $("#tree2").ligerTree({ checkbox: false });
            $("#tree3").ligerTree({ checkbox: false, parentIcon: null, childIcon: null });
        });
    </script>
</head>
<body style="padding:10px">  
    <!--带复选框和Icon-->
    <div style="width:200px; height:300px; margin:10px; float:left; border:1px solid #ccc; overflow:auto;  ">
    <ul id="tree1">
        <li>
            <span>节点1</span>
            <ul>
                <li>
                    <span>节点1.1</span>
                     <ul>
                        <li><span>节点1.1.2</span></li>
                        <li><span>节点1.1.2</span></li>
                     </ul>
                 </li>
                 <li><span>节点1.2</span></li>
            </ul>
        </li> 
        <li><span>节点2</span></li>
        <li>
            <span>节点3</span>
            <ul>
                <li><span>节点3.1</span></li>
                <li><span>节点3.2</span></li>
            </ul>
        </li>
        <li>
            <span>节点4</span>
            <ul>
                <li  isexpand="false">
                    <span>节点4.1</span>
                    <ul>
                        <li>
                            <span>节点4.1.1</span>
                            <ul>
                                <li><span>节点4.1.1.2</span></li>
                                <li><span>节点4.1.1.2</span></li>
                            </ul>
                        </li>
                        <li><span>节点4.1.2</span></li>
                    </ul>
                </li>
                <li><span>节点4.2</span></li>
            </ul>
        </li>
    </ul>
    </div> 

    <!--不带复选框-->
    <div style="width:200px; height:300px; margin:10px; float:left; border:1px solid #ccc; overflow:auto;  ">
    <ul id="tree2">
        <li>
            <span>节点1</span>
            <ul>
                <li>
                    <span>节点1.1</span>
                     <ul>
                        <li><span>节点1.1.2</span></li>
                        <li><span>节点1.1.2</span></li>
                     </ul>
                 </li>
                 <li><span>节点1.2</span></li>
            </ul>
        </li> 
        <li><span>节点2</span></li>
        <li isexpand="false">
            <span>节点3</span>
            <ul>
                <li><span>节点3.1</span></li>
                <li><span>节点3.2</span></li>
            </ul>
        </li>
    </ul>
    </div>

    <!--简易模式-->     
    <div style="width:200px; height:300px; margin:10px; float:left;  border:1px solid #ccc; overflow:auto;  ">
    <ul id="tree3">
        <li>
            <span>节点1</span>
            <ul>
                <li url='test.htm'>
                    <span>节点1.1</span>
                     <ul>
                        <li><span>节点1.1.2</span></li>
                        <li><span>节点1.1.2</span></li>
                     </ul>
                 </li>
                 <li><span>节点1.2</span></li>
            </ul>
        </li> 
        <li><span>节点2</span></li>
        <li isexpand="false">
            <span>节点3</span>
            <ul>
                <li><span>节点3.1</span></li>
                <li><span>节点3.2</span></li>
            </ul>
        </li>
    </ul>
    </div>

        <div style="display:none">
     
    </div>
</body>
</html>