<ul id="product_menu">
    <? foreach ($menu as $key => $item): ?>
        <li id="<?= trim('user_menu_'.str_replace('/', '_', trim($key, '/')),'_') ?>" <? if (is_double($item->order)) { ?> class="subitem"<? } ?>><a <? if ($item->active()): ?> class="active"<? endif ?> href="<?= $item->getUri() ?>"><?= $item->value ?></a></li>
    <? endforeach; ?>
</ul>

