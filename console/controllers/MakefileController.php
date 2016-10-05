<?php
namespace console\controllers;
use yii\console\Controller;

Class MakefileController extends Controller
{
    public function actionMake(){
        // root of directory yii2
        // /var/www/html/<yii2>
        $rootyii = realpath(dirname(__FILE__).'/../../');
        // echo $rootyii;
        // exit();
 
        // create file <jam:menit:detik>.txt
        $filename = date('Y-m-d H-i-s') . '.txt';
        $folder = $rootyii.  DIRECTORY_SEPARATOR . 'cronjob';
        $filePath = $folder . DIRECTORY_SEPARATOR . $filename;
         //$filePath ='c:\\xampp\htdocs\yii-two\cronjob\53.txt';
        $f = fopen($filePath, 'w') or die("Unable to open file!");
        // echo $filename;
        // exit();
        $fw = fwrite($f, 'now : ' . $filePath);
        fclose($f);
    }
}