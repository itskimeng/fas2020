<?php require_once 'GSS/controller/APPController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Annual Procurement Plan </h1>
        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">GSS Section</a></li>
            <li>APP</li>
            <li class="active">Edit Annual Procurement Plan</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                             Update Annual Procurement Plan
                            </div>
                            <form  id="app_edit_form">
                               <?php  include 'form_edit_app_details.php';?>
                            </form>
                           
                        </div>
                    </div>
                </div>
            </div>

        </div>


    </section>
</div>