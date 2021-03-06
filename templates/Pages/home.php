<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.10.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */
use Cake\Cache\Cache;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Datasource\ConnectionManager;
use Cake\Error\Debugger;
use Cake\Http\Exception\NotFoundException;

$this->disableAutoLayout();

if (!Configure::read('debug')) :
    throw new NotFoundException(
        'Please replace templates/Pages/home.php with your own version or re-enable debug mode.'
    );
endif;

$cakeDescription = 'CakePHP: the rapid development PHP framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">

    <?= $this->Html->css(['cake', 'home', 'bootstrap.min']) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <header>
        <div class="container text-center">
            <a href="https://cakephp.org/" target="_blank" rel="noopener">
                <img alt="CakePHP" src="https://cakephp.org/v2/img/logos/CakePHP_Logo.svg" width="350" />
            </a>
            <h1>
                Welcome to CakePHP Blog

            </h1>
            <a href="/posts/add" class="btn btn-primary">ADD Post</a>
        </div>
    </header>
    <main class="main">
        <div class="container-fluid">
            <div class="content">
                <div class="row">
                    <?php foreach ($posts as $post): ?>
                        <div class="card col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4 mt-2">
                            <img class="card-img-top img-thumbnail rounded mx-auto d-block" src="<?= $post->image ?>" alt="<?= $post->slug ?>">
                            <?php echo $this->Html->image($post->image, array('class' => 'card-img-top img-thumbnail rounded mx-auto d-block', 'alt' => 'CakePHP', 'border' => '0', 'data-src' => 'holder.js/100%x100')); ?>
                            <div class="card-body">
                                <h5 class="card-title"><?= $post->title ?></h5>
                                <!-- <p class="card-text"><?php echo $post->body ?></p> -->
                                <?= $this->Html->link($post->slug, ['controller' => 'Posts', 'action' => 'view', $post->slug]) ?>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </main>

    <?php echo $this->Html->script(['jquery.min', 'bootstrap.min']); ?>
</body>
</html>
