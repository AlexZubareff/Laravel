<?php foreach ($categoryList as $category): ?>
    <div class="category">
        <p><em><?=$category['categoryId']?></em>.
            <a href="<?=route('categoryNews', ['categoryId' => $category['categoryId']])?>"><?=$category['categoryName']?></em></a>
        </p>
    </div>
<?php endforeach; ?>
