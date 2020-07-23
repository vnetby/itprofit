<section class="section__about">
    <div class="container">
        <div class="about__inner">
            <div class="about__choose">
                <? $arrButton = [];
                $arrText = [];
                for ($i = 1; $i <= 3; $i++) {
                    if (get_field("button_$i")) {
                        $arrButton[] = get_field("button_$i");
                    }
                    if (get_field("text_$i")) {
                        $arrText[] = get_field("text_$i");
                    }
                }
                if ($arrButton) : ?>
                    <? foreach ($arrButton as $key => $item): ?>
                        <span><a href="#about<?= ($key + 1) ?>" class="link__about link2 like__h2 <? if($key == 0): ?>active<? endif; ?>"><?= $item ?></a></span>
                    <? endforeach; ?>
                <? endif; ?>
            </div>
            <div class="parent__txt">
                <? if ($arrText) : ?>
                    <? foreach ($arrText as $key => $item): ?>
                        <div class="about__txt" id='about<?= ($key + 1) ?>'>
                            <?= $item ?>
                        </div>
                    <? endforeach; ?>
                <? endif; ?>
            </div>
        </div>
    </div>
</section>
