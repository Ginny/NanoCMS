<?php //netteCache[01]000370a:2:{s:4:"time";s:21:"0.49891700 1307924412";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:48:"/var/www/app/AdminModule/templates/@layout.latte";i:2;i:1307833560;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"37828b8 released on 2011-05-30";}}}?><?php

// source file: /var/www/app/AdminModule/templates/@layout.latte

?><?php list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'czxiqutynr')
;//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb0e5e8cc588_title')) { function _lb0e5e8cc588_title($_l, $_args) { extract($_args)
;
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
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Language" content="en" />

	<meta name="description" content="Nette Framework example" />
<?php if (isset($robots)): ?>
	<meta name="robots" content="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($robots, '"') ?>" />
<?php endif ?>

	<title><?php if (!$_l->extends) { ob_start(); call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars()); echo $template->trim($template->striptags(ob_get_clean())); } ?> | Nette example</title>

	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($basePath, '"') ?>/css/site.css" />
	<script src="http://nette.github.com/resources/js/netteForms.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($basePath, '"') ?>/js/jquery.livequery.js" type="text/javascript"></script>
	<script src="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($basePath, '"') ?>/js/jquery.nette.js" type="text/javascript"></script>
	<script src="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($basePath, '"') ?>/js/script.js" type="text/javascript"></script>
</head>

<body>
<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($flashes) as $flash): ?>
	<div class="flash <?php echo Nette\Templating\DefaultHelpers::escapeHtml($flash->type, '"') ?>
"><?php echo Nette\Templating\DefaultHelpers::escapeHtml($flash->message, '') ?></div>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

	<div id="content">

<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParams()) ?>
	</div>

<?php if ($user->loggedIn): ?>
	<p id="logged-in">Signed in as <?php echo Nette\Templating\DefaultHelpers::escapeHtml($user->identity->real_name, '') ?>
. <a href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($control->link("Sign:out")) ?>
">Sign out</a></p>
<?php endif ?>
</body>
</html>
<?php 
// template extending support
if ($_l->extends) {
	ob_end_clean();
	Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render();
}
