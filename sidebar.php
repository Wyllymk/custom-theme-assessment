<div id="sidebar" class="widgets-area sidebar">
    <?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
        <ul id="sidebar">
            <?php dynamic_sidebar( 'sidebar-1' ); ?>
        </ul>
    <?php endif; ?>
</div>
<article>
    <aside className="general-sidebar aside1 w-calc">foo
    </aside>
    <div className="center-page">bar</div>
    <aside className="general-sidebar aside2 w-calc">baz
    </aside>
</article>