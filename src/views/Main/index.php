<main>
    <section class="movies" id="movies">
        <h2>Grid</h2>
        <div class="row">
            <?php if(!empty($products)): ?>
                <?php foreach ($products as $product): ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <article class="card">
                            <header class="title-header">
                                <h3><?=$product['title']?></h3>
                            </header>
                            <div class="card-block">
                                <div class="img-card">
                                    <img src="https://placehold.it/300x250" alt="Movie" title="Movie" class="w-100" />
                                </div>
                                    <p class="tagline card-text text-xs-center"><?=$product['content']?></p>
                                    <a href="#" class="btn btn-primary btn-block"><i class="fa fa-eye"></i> € <?=$product['price']?></a>
                            </div>
                        </article>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
</main>