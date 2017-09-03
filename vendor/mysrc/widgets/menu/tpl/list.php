<li>
    <a title="<?=$category['title']?>" href="?id=<?=$id?>"><?=$category['title']?></a>
    <?php if(isset($category['childs'])):?>
        <ul>
            <?= $this->getMenuHtml($category['childs']); ?>
        </ul>
    <?php endif; ?>
</li>