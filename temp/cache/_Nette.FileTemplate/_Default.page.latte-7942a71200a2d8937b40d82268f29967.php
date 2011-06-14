<?php //netteCache[01]000383a:2:{s:4:"time";s:21:"0.48012200 1308002364";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:61:"/var/www/MojoCMS/app/FrontModule/templates/Default/page.latte";i:2;i:1307924365;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"d5b50dc released on 2011-06-03";}}}?><?php

// source file: /var/www/MojoCMS/app/FrontModule/templates/Default/page.latte

?><?php list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'm8c118h47y')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb8754cd0e8a_content')) { function _lb8754cd0e8a_content($_l, $_args) { extract($_args)
?>

<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<p><h1><?php echo Nette\Templating\DefaultHelpers::escapeHtml($page->title, ENT_NOQUOTES) ?></h1></p>
<p><?php echo $page->text ?></p>
<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbf879b08f8b_title')) { function _lbf879b08f8b_title($_l, $_args) { extract($_args)
?>
<h1>My page</h1>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extends) ? FALSE : $template->_extends; unset($_extends, $template->_extends);


if ($_l->extends) {
	ob_start();
} elseif (!empty($control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
// template extending support
if ($_l->extends) {
	ob_end_clean();
	Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
