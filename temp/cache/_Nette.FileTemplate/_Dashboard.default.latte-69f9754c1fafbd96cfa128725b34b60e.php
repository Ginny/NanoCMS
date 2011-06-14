<?php //netteCache[01]000388a:2:{s:4:"time";s:21:"0.26451900 1308008855";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:66:"/var/www/MojoCMS/app/AdminModule/templates/Dashboard/default.latte";i:2;i:1308006453;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"d5b50dc released on 2011-06-03";}}}?><?php

// source file: /var/www/MojoCMS/app/AdminModule/templates/Dashboard/default.latte

?><?php list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'bd31chb4nt')
;//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lb5985c79b44_content')) { function _lb5985c79b44_content($_l, $_args) { extract($_args)
?>

<?php call_user_func(reset($_l->blocks['title']), $_l, get_defined_vars())  ?>

<p><a href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($control->link("add")) ?>
">Add new page</a></p>

<table class="grid">
    <tr>
        <th>Title</th>
        <th>Text</th>
        <th>Slug</th>
        <th></th>
    </tr>

<?php $iterations = 0; foreach ($iterator = $_l->its[] = new Nette\Iterators\CachingIterator($pages) as $page): ?>
    <tr>
        <td><?php echo Nette\Templating\DefaultHelpers::escapeHtml($page->title, ENT_NOQUOTES) ?></td>
        <td><?php echo Nette\Templating\DefaultHelpers::escapeHtml($template->truncate($page->text, 50), ENT_NOQUOTES) ?></td>
        <td><?php echo Nette\Templating\DefaultHelpers::escapeHtml($page->slug, ENT_NOQUOTES) ?></td>
        <td>            
            <a href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($control->link("edit", array($page->id))) ?>
">Edit</a>
            <a href="<?php echo Nette\Templating\DefaultHelpers::escapeHtml($control->link("delete", array($page->id))) ?>
">Delete</a>
        </td>
    </tr>
<?php $iterations++; endforeach; array_pop($_l->its); $iterator = end($_l->its) ?>

</table><?php
}}

//
// block title
//
if (!function_exists($_l->blocks['title'][] = '_lb8e3fabd8c3_title')) { function _lb8e3fabd8c3_title($_l, $_args) { extract($_args)
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
