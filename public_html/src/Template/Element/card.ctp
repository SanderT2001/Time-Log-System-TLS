<?
/**
 * (Bootstrap) Card Element
 *
 * @code
 * <?= $this->Element('card', [
 *     // Text for at the front of the card.
 *     'front' => [
 *         'title' => string,
 *         'text'  => string
 *     ],
 *     // When this key is also given (and with values), a two-sides card will be created that flips
 *     //   when an :hover occurs.
 *     'back' => [
 *         'text'         => string,
 *         // Shows a Call to Action Button (ONLY WHEN THIS KEY IS GIVEN WITH A VALUE).
 *         'callToAction' => string/html
 *     ]
 * ]); ?>
 */
?>

<!-- CSS -->
<?= $this->Html->css('Elements/card'); ?>

<div class="card card-flippable h-100">
    <div class="card-front">
        <div class="card-header border-0 bg-dark text-white">
            <i class="fa fa-user fa-5x d-flex justify-content-center"></i>
        </div>

        <div class="card-body">
            <h3 class="card-title"><?= ($front['title'] ?? ''); ?></h3>
            <p class="card-text">
                <?= ($front['text'] ?? ''); ?>
            </p>
        </div>
    </div>

    <? if (!empty($back)): ?>
        <div class="card-back">
            <div class="card-header border-0 bg-dark text-white">
                <i class="fa fa-info-circle fa-5x d-flex justify-content-center"></i>
            </div>

            <div class="card-body">
                <p class="card-text"><?= ($back['text'] ?? ''); ?></p>
                <? if (!empty($back['callToAction'])): ?>
                    <div class="float-right">
                        <?= $back['callToAction']; ?>
                    </div>
                <? endif; ?>
            </div>
        </div>
    <? endif; ?>
</div>
