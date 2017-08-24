<div class="container list-grid-demo">
    <div class="well well-sm">
        <strong>Display</strong>
        <div class="btn-group">
            <a href="#" id="list" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-th-list"></span>List
            </a>
            
            <a href="#" id="grid" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-th"></span>Grid
            </a>
        </div>
    </div>
	
    <div id="products" class="list-group-wrapper row">
    <?php if(!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="item  col-xs-4 col-lg-4">
                <div class="thumbnail clearfix">
                    <img src="http://placehold.it/400x250/000/fff" alt="" />
                    <div class="caption">
                        <h4 class="h3 "><?=$product['name']?></h4>
                        <p class="caption-text"><?=$product['content']?></p>
                        <div class="price-buy-spacing">
                            <div class="lead"> € <?=$product['price']?></div>
                            <div>
                                <a class="btn btn-success" href="#">zum Shop</a>
                            </div>		 
                        </div>		 
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>
</div>
