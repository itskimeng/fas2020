<div class="box box-danger box-solid dropbox">
    <div class="box-header with-border">
      <h5 class="box-title"><i class="fa fa-suitcase"></i> Staff Workload</h5>

      <div class="box-tools pull-right">

        <div class="btn-group">
            <a href='base_planner_emp_workspace.html.php?evp_id=<?php echo $event["id"];?>&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>' class="btn btn-block btn-primary"><i class="fa fa-anchor"></i> My Workspace</a>  
        </div>

        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
        </button>
      </div>
    </div>
    <div class="box-body box-emp" style="height: 475px; max-height: 475px; overflow-y: scroll;">
        <?php foreach ($lgcdd_emp as $key=>$emp): ?>
            <div class="list-group contact-group zoom" style="margin-bottom: 5px;">
                <a href="#" class="list-group-item" style="padding: 7px 7px; background-color:<?php echo $emp['color'] ?>">
                    <div class="media">
                        <div class="pull-left" style="width:65px; height:65px;">
                            <img class="img-circle" style="border-radius: 5px; width: 100%; height: 100%; object-fit: cover;" src="<?php echo $emp['profile']; ?>" alt="...">
                        </div>
                        <div class="media-body">
                            <div class="media-content">
                                <small><?php echo $emp['position'];?></small><br>
                            </div>

                            <div class="media-content" style="margin-top: -1%;">
                                <i class="fa fa-user"></i> <b class="media-heading" style="font-size: 10pt;"><?php echo $emp['name'];?></b>
                            </div>

                            <div class="media-content" style="margin-top: -1%;">
                                <small><i class="fa fa-envelope"></i> <?php echo $emp['email'];?></small>
                            </div>
                            <div class="media-content" style="margin-top: -2%;">
                                <small><i class="fa fa-phone"></i> <?php echo $emp['phone'];?></small>
                                <ul class="list-unstyled pull-right">
                                    <span class="label label-default label2"><?php echo $emp['tasks']['Created'] ?></span>
                                    <span class="label label-warning label2"><?php echo $emp['tasks']['Ongoing'] ?></span>
                                    <span class="label label-primary label2"><?php echo $emp['tasks']['For Checking'] ?></span>
                                    <span class="label label-success label2"><?php echo $emp['tasks']['Done'] ?></span>
                                </ul>
                            </div>

                            

                        </div>
                    </div>
                </a>
            </div>            
        <?php endforeach ?>
    </div>
</div>      

<style type="text/css">

    /*.label2 {
        position: absolute;
    top: -4px;
    right: 135px;
    }*/
    
    /*[data-letters]:before {
      content:attr(data-letters);
      display:inline-block;
      font-size:1em;
      width:2.5em;
      height:2.5em;
      line-height:2.5em;
      text-align:center;
      border-radius:50%;
      background:#746869;
      vertical-align:middle;
      /*margin-right:1em;*/
      color:white;
      /*margin-top: -13px;*/
    }*/

    /*.box-emp:hover {*/
        /*overflow-y: scroll !important;*/
        /*background: transparent;  make scrollbar transparent */
        
    /*}*/
    /*.box-emp:hover::-webkit-scrollbar {
        width: 0px;
        background: transparent;  make scrollbar transparent 
    }*/

    .nav.nav-pills > li > a {
    color: #777;
    border-radius: 0!important;
    margin-right: 10px;
    margin-left: 10px;
}

.nav.nav-pills > li.active > a, 
.nav.nav-pills > li.active > a:hover,
.nav.nav-pills > li.active > a:focus {
    color: #fff !important;
    background-color: #2ECC71 !important;

}

.page-people-directory .nav-contacts {
    margin-bottom: 20px;
}

.page-people-directory .nav-contacts li a {
    color: #666;
    font-weight: 400;
    font-size: 13px;
}

.page-people-directory .nav-contacts li .badge {
    background: none;
    font-weight: 500;
    color: #333;
}

.page-people-directory .nav-contacts li.active .badge {
    color: #fff;
    background: none;
}

.page-people-directory .people-group .media img {
    width: 45px;
}

.page-people-directory .people-group .list-group-item {
    -moz-transition: all 0.2s ease-out 0s;
    -webkit-transition: all 0.2s ease-out 0s;
    transition: all 0.2s ease-out 0s;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    margin: 0;
    border-width: 0;
}

.page-people-directory .people-group .media-heading {
    margin-top: 5px;
}

.page-people-directory .people-group .media-heading,
.page-people-directory .people-group .media-body {
    line-height: normal;
}

.page-people-directory .pagination-contact {
    margin-top: -3px;
}

.page-people-directory .contact-group {
    margin-top: 20px;
}

.page-people-directory .contact-group .media img {
    width: 80px;
}

.page-people-directory .contact-group .list-group-item {

}

.page-people-directory .contact-group .media-heading {
    font-size: 16px;
    font-weight: 500;
}

.page-people-directory .contact-group .media-heading small {
    margin-left: 5px;
    font-size: 13px;
    font-weight: 400;
    color: #999;
}

.page-people-directory .contact-group .list-group-item {
    border: none;
    margin-top: 10px;
}

.page-people-directory .contact-group .list-group-item:hover {
    background-color: #fcfcfc;
}

.page-people-directory .contact-group .media-content {
    margin-top: 5px;
}

.page-people-directory .contact-group .fa:before {
    font-size: 20px;
    color:gray;
}

.page-people-directory .contact-group .media-content ul {
    margin-top: 15px;
    margin-bottom: 0;
}

.page-people-directory .contact-group .media-content ul > li {
    display: inline-block;
    min-width: 200px;
    margin-bottom: 5px;
}

.page-people-directory .well {
    border-radius: 0px;
    border: none;
}

.page-people-directory .list-group-item:first-child {
    border-top-left-radius: 0px;
    border-top-right-radius: 0px;
}

.page-people-directory .page-title {
    text-transform: uppercase;
}

.page-people-directory .btn-add-new-contact {
    float: right;
}

@media (max-width: 992px) { 
    .page-people-directory .btn-add-new-contact {
        float: left;
    }
}



/* ============================================================
CONTACT MODAL VIEW
============================================================ */
.page-people-directory .modal-pull-right .modal-dialog {
    max-width: 720px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body {
    width: 100%;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .modal-close h4 {
    padding-left: 15px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .col-md-12 {
    padding: 0px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header {
    width: 100%;
    height: 280px;
    text-align: center;
    overflow: inherit;
    background-repeat:no-repeat;
    background-size:cover;
    background-position:center;
    border-bottom: 5px solid gray;
    filter:grayscale(100%);
    -webkit-filter:grayscale(100%);
    -moz-filter:grayscale(100%);
    -webkit-transition:all 0.3s ease;
    -moz-transition:all 0.3s ease;
    -o-transition:all 0.3s ease;
    -ms-transition:all 0.3s ease;
    transition:all 0.3s ease;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header:hover {
    filter:grayscale(0%);
    -webkit-filter:grayscale(0%);
    -moz-filter:grayscale(0%);
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .profile-image-container {
    margin-top: 211px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .profile-image-container img {
    border:5px solid gray;
    border-radius: 60%;
    -moz-border-radius: 60%;
    -webkit-border-radius: 60%;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .contact-info {
    width: 100%;
    position: absolute;
    margin-top: 120px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .contact-info .contact-name {
    font-weight: bold;
    color: #fff;
    font-size: 30px;
    text-align:center;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .contact-info .contact-skills ul {
    list-style: none;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .contact-info .contact-skills ul li {
    display: block;
    width: 60px;
}

.page-people-directory .modal-pull-right .modal-dialog .dialog-close {
    width: 100%;
    position: absolute;
    margin-top: 20px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .dialog-close li {
    cursor: pointer;
    color: white;
    text-align: right;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .dialog-close li span.fa {
    font-size: 35px;
    font-weight: bold;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-header .dialog-close li span.fa:hover {
    color: gray;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-view-content .contact-view-action {
    margin-right: 15px;
    margin-top: 15px;
}

.page-people-directory .modal-pull-right .modal-dialog .modal-body .contact-view-content .contact-view-info {
    margin-top: 15px;
}

.page-people-directory .contact-info-container {
    height: 250px;
    margin-top: 80px;
    position: absolute;
    width: 100%;
}   

.page-people-directory .contact-add-content {
    padding: 40px;
}

.page-people-directory .close-right-modal {
    cursor: pointer;
}

.page-people-directory .close-right-modal:hover {
    opacity: .8;
}

.page-people-directory .basic-info-scroll {
    height: 425px;
    overflow-x: hidden;
}


@media (max-width: 800px) {
    .page-people-directory .contact-top-bar {
        text-align: left;
        width: 100%;
    }

    .page-people-directory .contact-top-bar .btn-add-new-contact {
        margin-bottom: 10px;
        display: block;
    }

    .page-people-directory .contact-top-bar .txt-search-contact {
        margin-bottom: -5px;
    }
}

.zoom {
  z-index: 999999 !important;
  transition: transform .6s; /* Animation */
}

.zoom:hover {
  z-index: 999999 !important;
  margin-top: 5px;
  margin-bottom: 5px !important;
  transform: scale(1.05); /* (150% zoom - Note: if the zoom is too large, it will go outside of the viewport) */
}


</style>