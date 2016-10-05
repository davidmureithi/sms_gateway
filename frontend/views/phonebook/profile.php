<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ContactOne */

//$this->title = $model;
?>
<div class="contact-one-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <div id="" class="page-wrapper">
        <div class="page-content">
            <div class="row">           
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="entry-content">
                        <h2 class="pageHeader"></h2>
                        <form class="profileForm">
                            <div class="row">
                                <input type="hidden" name="up_avatar" id="up_avatar" 
                                value="
                                <?php 
                                    if(1 == 2) { 
                                        print_r($model->avatar); 
                                    } else { 
                                        print_r($model->avatar_default); 
                                    } ?>
                                ">
                                <div class="submit_container">
                                    <div class="submit_container_header">Avatar Photo</div>
                                    <div id="upload-container">
                                        <div id="aaiu-upload-container">
                                            <div id="aaiu-upload-imagelist"></div>
                                            <div id="imagelist"></div>
                                            <div class="clearfix"></div>
                                            <a href="javascript:void(0);" id="aaiu-uploader" class="btn btn-o btn-default"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;&nbsp;Browse Photos</a>
                                            <input type="hidden" name="new_gallery" id="new_gallery">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="up_first_name">First Name<span class="text-red"></span></label>
                                        <input type="text" id="up_first_name" name="up_first_name" placeholder="" class="form-control" value="<?php ?>">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="up_first_name">Second Name<span class="text-red"></span></label>
                                        <input type="text" id="up_first_name" name="up_first_name" placeholder="" class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div class="form-group">
                                        <label for="up_first_name">User Name<span class="text-red"></span></label>
                                        <input type="text" id="up_first_name" name="up_first_name" placeholder="" class="form-control" value="">
                                    </div>
                                </div>                                
                            </div>                            
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <div class="form-group">
                                        <button href="" class="btn btn-success" id="updateProfileBtn">Update</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 
            </div> 
        </div> 
    </div>
</div>