<?php //netteCache[01]000380a:2:{s:4:"time";s:21:"0.59027700 1307924425";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:58:"/var/www/app/AdminModule/templates/Dashboard/default.latte";i:2;i:1307893380;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"37828b8 released on 2011-05-30";}}}?><?php

// source file: /var/www/app/AdminModule/templates/Dashboard/default.latte

?><?php list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'mshkawqqgs')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb0f141c0fa4_content')) { function _lb0f141c0fa4_content($_l, $_args) { extract($_args)
?>

<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<p><a href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($control->link("add")) ?>
">Add new page</a></p>

<table class="grid">
<tr>
	<th>Title</th>
	<th>Text</th>
	<th>Slug</th>
</tr>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($pages) as $page): ?>
<tr>
	<td><?php echo Nette\Templating\DefaultHelpers::escapeHtml($page->title, '') ?></td>
	<td><?php echo Nette\Templating\DefaultHelpers::escapeHtml($page->text, '') ?></td>
	<td><?php echo Nette\Templating\DefaultHelpers::escapeHtml($page->slug, '') ?></td>
</tr>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

</table><?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb725c2bf84c_title')) { function _lb725c2bf84c_title($_l, $_args) { extract($_args)
?>
<h1>My pages</h1>
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
