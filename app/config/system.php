<?php
$self_config=array(
'title'=>'新秀',
'desc'=>'新秀是一个专于XXXX的有限公司',
'keyword'=>'xx产品的专业公司',
'upload'=>'upload/',	//文件上传根目录
);
$dyanmic=storage_path().'/dyanmic.conf';
if(!File::exists($dyanmic)){
	File::put($dyanmic,'<?php return array(); ?>');
}
$storage_config=File::getRequire($dyanmic);
return array_merge($self_config,$storage_config);
?>