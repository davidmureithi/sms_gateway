<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');
Yii::setAlias('@images', '/yii-two/frontend/web');
Yii::setAlias('@administration', '/yii-two/backend/web/');
Yii::setAlias('@publicface', '/yii-two/frontend/web/');