<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="main">
	<ul class="nav nav-tabs">
		<li class="active"><a href="<?php  echo $this->createWebUrl('attributes', array('id'=>$rid,'act'=>'add'))?>">添加字段</a></li>
		<li><a href="<?php  echo $this->createWebUrl('attributes', array('id'=>$rid));?>">字段列表</a></li>
		<li><a href="<?php  echo $this->createWebUrl('values', array('id'=>$rid))?>">数据管理</a></li>
	</ul>

	<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('forms_info', TEMPLATE_INCLUDEPATH)) : (include template('forms_info', TEMPLATE_INCLUDEPATH));?>
	<form action="" class="form-horizontal form" method="post" enctype="multipart/form-data">
		<input type="hidden" name="attr_id" value="<?php  echo $item['attr_id'];?>">
		<input type="hidden" name="formid" value="<?php  echo $forms['formid'];?>">
		<input type="hidden" name="token" value="<?php  echo $_W['token'];?>" />
		<div class="panel panel-default">
			<div class="panel-heading">
				添加字段
			</div>
			<div class="panel-body">
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">字段</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="title" value="<?php  echo $item['title'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">描述</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="description" value="<?php  echo $item['description'];?>" />
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">字段类型</label>
					<div class="col-sm-8">
						<label class="radio-inline ftype" for="i_radio">
							<input type="radio" id="i_radio" value="radio" name="type" <?php  if($item['type']=='radio') { ?>checked<?php  } ?>> 单选
						</label>
						<label class="radio-inline ftype" for="i_checkbox">
							<input type="radio" id="i_checkbox" value="checkbox" name="type" <?php  if($item['type']=='checkbox') { ?>checked<?php  } ?>> 多选
						</label>
						<label class="radio-inline ftype" for="i_select">
							<input type="radio" id="i_select" value="select" name="type" <?php  if($item['type']=='select') { ?>checked<?php  } ?>> 下拉选择
						</label>
						<label class="radio-inline ftype" for="i_text">
							<input type="radio" id="i_text" value="text" name="type" <?php  if($item['type']=='text') { ?>checked<?php  } ?>> 单行输入
						</label>
						<label class="radio-inline ftype" for="i_textarea">
							<input type="radio" id="i_textarea" value="textarea" name="type" <?php  if($item['type']=='textarea') { ?>checked<?php  } ?>> 多行输入
						</label>
						<label class="radio-inline ftype" for="i_date">
							<input type="radio" id="i_date" value="date" name="type" <?php  if($item['type']=='date') { ?>checked<?php  } ?>> 日期
						</label>
						<label class="radio-inline ftype" for="i_datetime">
							<input type="radio" id="i_datetime" value="datetime" name="type" <?php  if($item['type']=='datetime') { ?>checked<?php  } ?>> 日期时间
						</label>
						<label class="radio-inline ftype" for="i_images">
							<input type="radio" id="i_images" value="images" name="type" <?php  if($item['type']=='images') { ?>checked<?php  } ?>> 图片上传
						</label>
                                                <label class="radio-inline ftype" for="i_district">
							<input type="radio" id="i_district" value="district" name="type" <?php  if($item['type']=='district') { ?>checked<?php  } ?>> 地区联动
						</label>
					</div>
				</div>

				<div class="form-group <?php  if(in_array($item['type'], array('text','textarea','date','datetime','images','district'))) { ?> hide<?php  } ?>" id="extra_box">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">参数</label>
					<div class="col-sm-8">
						<textarea id="reply-add-text" name="extra" class="form-control" style="height:100px;"><?php  echo $item['extra'];?></textarea>
						<span class="help-block">
							<p><strong class="text-danger">参数说明：</strong>字段类型为单选、多选、下拉选择的参数格式每行一项!</p>
						</span>
					</div>
				</div>

				<div class="form-group <?php  if(in_array($item['type'], array('images','district'))) { ?> hide<?php  } ?>" id="default_box">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">默认值</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="defvalue" value="<?php  echo $item['defvalue'];?>" />
					</div>
				</div>

				<div class="form-group <?php  if($item['type']!='text' && $item['type']!='textarea') { ?> hide<?php  } ?>" id="rule_box">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">验证规则</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="rule" name="rule" value="<?php  echo $item['rule'];?>" placeholder="正则验证,如果为空则不限制！" />
					</div>
					<div class="col-sm-2">
						<select id="rule_tpl" class="form-control" autocomplete="off" name="rule_tpl">
							<option value="">常用验证规则</option>
							<option value="^[\x{4e00}-\x{9fa5}]+$">中文汉字</option>
							<option value="^[a-zA-Z0-9]+$">英文数字</option>
							<option value="^[A-Za-z]+$">英文字符</option>
							<option value="^[\x{4e00}-\x{9fa5}a-zA-Z0-9]+$">英文数字汉字</option>
							<option value="^[1-9]\d*|0$">0或正整数</option>
							<option value="^[0-9]{1,30}$">正整数</option>
							<option value="^[-\+]?\d+(\.\d+)?$">小数</option>
							<option value="\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*">邮箱</option>
							<option value="^13[0-9]{9}$|^15[0-9]{9}$|^18[0-9]{9}$">手机</option>
						</select>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">是否必填</label>
					<div class="col-sm-8">
						<label class="radio-inline" for="is_must_1">
							<input type="radio" id="is_must_1" value="1" name="is_must" <?php  if($item['is_must']=='1') { ?>checked<?php  } ?>> 是
						</label>
						<label class="radio-inline" for="is_must_0">
							<input type="radio" id="is_must_0" value="0" name="is_must" <?php  if($item['is_must']=='0') { ?>checked<?php  } ?>> 否
						</label>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">后台列表显示</label>
					<div class="col-sm-8">
						<label class="radio-inline">
							<input type="radio" value="1" name="is_show" <?php  if($item['is_show']=='1') { ?>checked<?php  } ?>> 是
						</label>
						<label class="radio-inline">
							<input type="radio" value="0" name="is_show" <?php  if($item['is_show']=='0') { ?>checked<?php  } ?>> 否
						</label>
						<span class="help-block">
							<p><strong class="text-danger">说明：</strong>是否在后台数据报告详细列表页显示此字段!</p>
						</span>
					</div>
				</div>

				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">排序</label>
					<div class="col-sm-8">
						<input type="text" class="form-control" name="sort" value="<?php  echo $item['sort'];?>" />
					</div>
				</div>
				<div class="form-group">
					<label class="col-xs-12 col-sm-3 col-md-2 control-label">&nbsp;</label>
					<div class="col-sm-9">
						<button type="submit" class="btn btn-primary col-lg-1" name="submit" value="提交">提交</button>
					</div>
				</div>
			</div>
		</div>

	</form>
</div>
<script language='javascript' type="text/javascript">
$(function () {
	$(".ftype").on('click', function(){
		var afor = $(this).attr('for');
		$("#default_box").removeClass('hide');
		if( afor == 'i_text' || afor == 'i_textarea' || afor == 'i_date' || afor == 'i_datetime' ){
			$("#extra_box").addClass('hide');
			$("#rule_box").removeClass('hide');
		} else {
			if( afor == 'i_images' || afor == 'i_district'){
				$("#extra_box").addClass('hide');
				$("#rule_box").addClass('hide');
				$("#default_box").addClass('hide');
			} else {
				$("#extra_box").removeClass('hide');
				$("#rule_box").addClass('hide');
			}
		}
	});
	$("#rule_tpl").on('change', function(){
		$("#rule").val( $(this).val() );
	})
	if( $("#rule").val() ){
		$("#rule_tpl").val( $("#rule").val() );
	}
});

    
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 1) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>