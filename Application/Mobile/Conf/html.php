<?php
return array(
    'VIEW_PATH'       =>'./Template/mobile/', // 改变某个模块的模板文件目录
    'DEFAULT_THEME'    =>'longmi', // 模板名称
    'TMPL_PARSE_STRING'  =>array(
        //                '__PUBLIC__' => '/Common', // 更改默认的/Public 替换规则
        '__STATIC__'     => '/Template/mobile/longmi/Static', // 增加新的image  css js  访问路径  后面给 php 改了
        "__DefaultUserImages__"=>"/Public/images/default/user.png",
        "__DefaultUserBackgroundImages__"=>"/Public/images/default/userBg.jpg",
        '__DefaultGoodsgroundImages__'=>'/Public/images/default/goodsimg.jpg',
    ),
    //'DATA_CACHE_TIME'=>60, // 查询缓存时间
);
?>