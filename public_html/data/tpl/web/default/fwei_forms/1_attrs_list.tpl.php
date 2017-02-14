<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li><a href="<?php  echo $this->createWebUrl('attributes', array('id'=>$rid,'act'=>'add'))?>">添加字段</a></li>
		<li class="active"><a href="<?php  echo $this->createWebUrl('attributes', array('id'=>$rid));?>">字段列表</a></li>
		<li><a href="<?php  echo $this->createWebUrl('values', array('id'=>$rid))?>">数据管理</a></li>
	</ul>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('forms_info', TEMPLATE_INCLUDEPATH)) : (include template('forms_info', TEMPLATE_INCLUDEPATH));?>
	<div class="panel panel-default">
		<div class="panel-heading">
			表单字段列表
		</div>
		<div class="panel-body">
			<table class="table table-hover">
				<thead class="navbar-inner">
					<tr>
						<th style="width:60px;" class="row-first">ID</th>						
	                    <th>标题</th>
						<th>描述</th>
						<th>类型</th>
						<th>参数</th>
						<th>默认值</th>
						<th class="hide">规则</th>
						<th>排序</th>
						<th style="text-align:center;">操作</th>
					</tr>
				</thead>
				<tbody>
					<?php  if(is_array($attrs)) { foreach($attrs as $row) { ?>
						<tr>		
							<td class="row-first"><?php  echo $row['attr_id'];?></td>
	                        <td><?php  echo $row['title'];?></td>
	                        <td><?php  echo $row['description'];?></td>
	                        <td><?php  echo $row['type_txt'];?></td>
	                        <td><?php  echo $row['extra_txt'];?></td>
	                        <td><?php  echo $row['defvalue'];?></td>
	                        <td class="hide"><?php  echo $row['rule'];?></td>
	                        <td><?php  echo $row['sort'];?></td>
							<td align="center">
								<a href="<?php  echo $this->createWebUrl('attributes', array('id'=>$row['rid'],'attr_id'=>$row['attr_id'], 'act'=>'add'));?>" >编辑</a> | 
	                        	<a href="<?php  echo $this->createWebUrl('attributes', array('id'=>$row['rid'],'attr_id'=>$row['attr_id'], 'act'=>'delete'));?>" onclick="return confirm('删除记录后不可恢复,确定要删除吗?')" >删除</a>
	                        </td>
						</tr>
					<?php  } } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>
