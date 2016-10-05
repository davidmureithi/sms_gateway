<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;


/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<?= Html::csrfMetaTags() ?>
<meta charset="<?= Yii::$app->charset ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags()?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head()?>
</head>
<body>
    <?php $this->beginBody()?>
    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => 'Spotpata Products',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse navbar-fixed-top', //'span9 navbar navbar-static-top'
            ]
        ]);

        // $menuItems = [
        //     [
        //         'label' => 'Home',
        //         'url' => [
        //             '/site/index'
        //         ]
        //     ],           
        //     [
        //         'label' => 'Shop',
        //         'url' => [
        //             '/shop/index'
        //         ]
        //     ],
        //     [
        //         'label' => 'About',
        //         'url' => [
        //             '/site/about'
        //         ]
        //     ],
        //     [
        //         'label' => 'Contact',
        //         'url' => [
        //             '/site/contact'
        //         ]
        //     ]
        // ];
        // if (Yii::$app->user->isGuest) {
        //     $menuItems[] = [
        //         'label' => 'Signup',
        //         'url' => [
        //             '/site/signup'
        //         ]
        //     ];
        //     $menuItems[] = [
        //         'label' => 'Login',
        //         'url' => [
        //             '/site/login'
        //         ]
        //     ];
        // } else {
        //     $menuItems[] = [
        //         'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
        //         'url' => [
        //             '/site/logout'
        //         ],
        //         'linkOptions' => [
        //             'data-method' => 'post'
        //         ]
        //     ];
        //     $menuItems[] = [
        //         'label' => 'Administration',
        //         'url' => Yii::getAlias('@administration')
        //     ];
        // }

                $menuItems = [
                     [
                        'label' => 'Learning',
                        'url' => '',
                        'items' => [
                            ['label'=>'API',
                                'url'=> [
                                '/api/create'
                                ],
                            ],
                            ['label'=>'Import Excell',
                                'url'=>[
                                '/site/import-excel'
                                ],
                            ],
                            ['label'=>'Social LogIn',
                                'url'=> [
                                '/site/login'
                                ],
                            ],
                            ['label'=>'Phone Book',
                                'url'=> [
                                '/phonebook/index'
                                ],
                            ],
                            ['label'=>'One',
                                'url'=> [
                                '/api/api'
                                ],
                            ],
                            ['label'=>'One',
                                'url'=> [
                                '/api/api'
                                ],
                            ],
                        ],
                    ],
                ];

                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-right'],
                    'items' => $menuItems,
                    ]);
                NavBar::end();
        ?>

        <div class="container">
        <?=Breadcrumbs::widget(['links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : []])?>
        <?= Alert::widget()?>
        <?= $content?>
        </div>
    </div>

<!-- start: Footer -->
<!--footer id="footer">
    <div class="container">
        <div class="row-fluid">
            <div class="col-md-3 clearfix">
                <h3 class="widget-title">About Us</h3>
                <div class="widget-inner">
                    <p>
                        We are Spotpata
                    </p>
                    <address>
                        <ul class="unstyled">
                            <li>Find us on</li>
                            <li>Kindara road, Lavington, Nairobi, 20210</li>
                            <li>(070) 030-5374</li>
                            <li>(070) 049-4547</li>
                            <li><a href="mailto:#">info@spotpata.co.ke</a></li>
                        </ul>
                    </address>
                    <ul class="social clearfix">
                        <li>
                            <a class="facebook" href="#"></a>
                        </li>
                        <li>
                            <a class="twitter2" href="#"></a>
                        </li>
                        <li>
                            <a class="google-plus" href="#"></a>
                        </li>
                    </ul>               
                </div>
            </div>
            <div class="col-md-3 clearfix">
                <h3 class="widget-title">Shipping Info</h3>
                <div class="widget-inner">
                    <ul class="unstyled">
                        <li><a href="#">New products</a></li>
                        <li><a href="#">Top sellers</a></li>
                        <li><a href="#">Specials</a></li>
                        <li><a href="#">Manufacturers</a></li>
                        <li><a href="#">Suppliers</a></li>
                        <li><a href="#">Customer Service</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 clearfix">
                <h3 class="widget-title">Latest Tweets</h3>
                <!-- start: Twitter Widget --
                <div class="widget-inner">
                    <div id="twitter-foot"></div>
                </div>
                <!-- end: Twitter Widget --
            </div>

            <div class="col-md-3 clearfix">
                <!-- start: Flickr Widget --
                <section class="widget inner">
                    <h3 class="widget-title">Instagram Feed</h3>
                    <ul class="flickr clearfix"></ul>
                </section>
                <!-- end: Flickr Widget --
            </div>          
        </div>
    </div>
</footer>
<!-- end: Footer --

<!-- start: Footer menu --
<section id="footer-menu">
    <div class="container">
        <div class="row-fluid">
            <div class="payment col-md-6">
                <p class="pull-left">&copy; Spotpata</p>
                <p class="pull-right"></p>
            </div>
            <div class="col-md-6 payment">
                <img src="img/cards/visa_straight.png" alt=""/>
                <img src="img/cards/paypal.png" alt=""/>
                <img src="img/cards/discover.png" alt=""/>
                <img src="img/cards/aex.png" alt=""/>
                <img src="img/cards/maestro.png" alt=""/>
                <img src="img/cards/mastercard.png" alt=""/>
            </div>
        </div>
    </div>
</section-->
<!-- end: Footer menu -->

    <?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
