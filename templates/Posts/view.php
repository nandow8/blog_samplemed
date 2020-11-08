<div class="column-responsive ">
    <div class="row">
        <div class="card col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-2">
            <h3 class="text-center font-weight-bold"><strong><?= $post->title ?></strong></h3>
            <?php echo $this->Html->image($post->image, ['class' => 'card-img-top img-thumbnail rounded mx-auto d-block', 'alt' => 'CakePHP', 'border' => '0', 'data-src' => 'holder.js/100%x100']); ?>
            <div class="card-body">
                <p class="card-text"><?php echo $post->body ?></p>
            </div>
        </div>
    </div>

    <div class="column-responsive">
        <div class="posts form content">
            <?php if($userId): ?>
                <?php echo $this->Form->create(null, ['url' => ['controller' => 'Comments', 'action' => 'add']]); ?>
            <?php else: ?>
                <?php echo $this->Form->create(null, ['url' => ['controller' => 'Users', 'action' => 'login']]); ?>
            <?php endif; ?>

            <?= $this->Form->input('post_id', ['type' => 'hidden', 'value' => $post->id]); ?>
            <fieldset>
                <legend><?= __('Add Comment') ?></legend>
                <?php
                echo $this->Form->control('body', ['label' => '', 'cols' => 25, 'required' => true]);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>