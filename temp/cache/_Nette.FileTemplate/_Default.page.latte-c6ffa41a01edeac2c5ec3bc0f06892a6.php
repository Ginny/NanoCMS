<?php //netteCache[01]000375a:2:{s:4:"time";s:21:"0.78765200 1307924402";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:53:"/var/www/app/FrontModule/templates/Default/page.latte";i:2;i:1307924365;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"37828b8 released on 2011-05-30";}}}?><?php

// source file: /var/www/app/FrontModule/templates/Default/page.latte

?><?php list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'w4pwb9413u')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbf811f41561_content')) { function _lbf811f41561_content($_l, $_args) { extract($_args)
?>

<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<p><h1><?php echo Nette\Templating\DefaultHelpers::escapeHtml($page->title, '') ?></h1></p>
<p><?php echo $page->text ?></p>
<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbbddaf3868f_title')) { function _lbbddaf3868f_title($_l, $_args) { extract($_args)
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
} elseif (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
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
