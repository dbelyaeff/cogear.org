<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?= $cogear->get('site.lang', 'en'); ?>">
    <head>
        <?= theme('head') ?>
    </head>
    <body>
        <?= theme('before') ?>
        <div class="container_12">
            <div class="grid_12" id="header">
                <a href="<?= Url::link() ?>"><img src="<?= $theme->getFolder() ?>/img/logo.png" alt="cogear framwork"/></a>
                <?= theme('header') ?>
            </div>
            <div class="grid_12" id="menu">
                <?= theme('menu') ?>
            </div>
            <? if ($featured = theme('featured')) { ?>
                <div class="grid_12">
                    <?= $featured ?>
                </div>
            <? } ?>
            <? $sidebar = theme('sidebar') ?>
            <div class="grid_<?= $sidebar ? '9' : '12' ?>" id="content">
                <?= theme('content') ?>
            </div>
            <? if ($sidebar): ?>
                <div class="grid_3" id="sidebar">
                    <?= $sidebar ?>
                </div>
            <? endif ?>
        </div>
        <div id="footer">
            <div class="container_12">
                <div class="grid_12">
                    <?= theme('footer') ?>
                </div>    
            </div>
        </div>
        <?= theme('after') ?>
    </body>
</html>