<?php //netteCache[01]000400a:2:{s:4:"time";s:21:"0.63946700 1307914026";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:78:"/home/users/ginny/ginny.jecool.net/web/app/AdminModule/templates/Sign/in.latte";i:2;i:1307816153;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"37828b8 released on 2011-05-30";}}}?><?php

// source file: /home/users/ginny/ginny.jecool.net/web/app/AdminModule/templates/Sign/in.latte

?><?php list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'hg4ss87o4b')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb80a9fbd281_content')) { function _lb80a9fbd281_content($_l, $_args) { extract($_args)
?>

<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<?php $_ctrl = $control->getWidget("signInForm"); if ($_ctrl instanceof Nette\Application\UI\IPartiallyRenderable) $_ctrl->validateControl(); $_ctrl->render() ?>

<p>Default username is <i>demo</i>, with password <i>xxx</i></p>
<?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lbac75162c90_title')) { function _lbac75162c90_title($_l, $_args) { extract($_args)
?>
<h1>Administrace</h1>
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
$robots = 'noindex' ?>

<?php if (!$_l->extends) { call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()); }  
// template extending support
if ($_l->extends) {
	ob_end_clean();
	Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
