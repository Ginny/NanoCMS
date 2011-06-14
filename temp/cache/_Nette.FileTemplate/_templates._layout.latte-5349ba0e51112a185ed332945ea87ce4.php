<?php //netteCache[01]000370a:2:{s:4:"time";s:21:"0.99815700 1307922274";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:48:"/var/www/app/FrontModule/templates/@layout.latte";i:2;i:1307889120;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"37828b8 released on 2011-05-30";}}}?><?php

// source file: /var/www/app/FrontModule/templates/@layout.latte

?><?php list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'uxzg5k77o3')
;
// snippets support
if (isset($presenter, $control) && $presenter->isAjax() && $control->isControlInvalid()) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
	<title>Web</title>
	<link rel="stylesheet" type="text/css" media="screen" href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($basePath, '"') ?>/css/site.css" />
</head>

<body>
	<h1>Webík</h1>

<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParams()) ?>

</body>
</html>