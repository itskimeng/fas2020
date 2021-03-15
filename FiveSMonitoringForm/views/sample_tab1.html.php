<!-- <div class="container"> -->
    <div class="row">
        <div class="col-md-12">
            <div class="tab" role="tabpanel">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab">Section 1</a></li>
                    <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab">Section 2</a></li>
                    <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab">Section 3</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabs">
                    <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                        <h3>Section 1</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros consectetur lobortis. Maecenas nec nibh congue, placerat sem id, rutrum velit. Phasellus porta enim at facilisis condimentum. Maecenas pharetra dolor vel elit tempor pellentesque sed sed eros. Aenean vitae mauris tincidunt, imperdiet orci semper, rhoncus ligula. Vivamus scelerisque.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Section2">
                        <h3>Section 2</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros consectetur lobortis. Maecenas nec nibh congue, placerat sem id, rutrum velit. Phasellus porta enim at facilisis condimentum. Maecenas pharetra dolor vel elit tempor pellentesque sed sed eros. Aenean vitae mauris tincidunt, imperdiet orci semper, rhoncus ligula. Vivamus scelerisque.</p>
                    </div>
                    <div role="tabpanel" class="tab-pane fade" id="Section3">
                        <h3>Section 3</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras nec urna aliquam, ornare eros vel, malesuada lorem. Nullam faucibus lorem at eros consectetur lobortis. Maecenas nec nibh congue, placerat sem id, rutrum velit. Phasellus porta enim at facilisis condimentum. Maecenas pharetra dolor vel elit tempor pellentesque sed sed eros. Aenean vitae mauris tincidunt, imperdiet orci semper, rhoncus ligula. Vivamus scelerisque.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->

<style type="text/css">
    a:hover,a:focus{
    outline: none;
    text-decoration: none;
}
.tab .nav-tabs{
    border: none;
    margin-bottom: 20px;
}
.tab .nav-tabs li a{
    display: block;
    padding: 7px 15px;
    margin: 0 0 25px 0;
    background: #fff;
    font-size: 20px;
    font-weight: 700;
    color: #523f38;
    text-transform: uppercase;
    border: 1px solid #d3d3d3;
    border-radius: 0;
    position: relative;
    transition: all 0.3s ease 0s;
}
.tab .nav-tabs li a:before{
    content: "";
    width: 105%;
    height: 4px;
    background: #d3d3d3;
    position: absolute;
    bottom: -36px;
    left: 0;
}
.tab .nav-tabs li.active a:before{ background: #3ea1b3; }
.tab .nav-tabs li a:after{
    content: "";
    width: 25px;
    height: 25px;
    border-radius: 50%;
    background: #fff;
    box-shadow: 0 0 8px rgba(0,0,0,0.4);
    position: absolute;
    bottom: -46px;
    right: -10px;
    z-index: 1;
}
.tab .nav-tabs li.active a:after{ background: #ec9a29; }
.tab .nav-tabs li a:hover,
.tab .nav-tabs li.active a{
    background: #3ea1b3;
    color: #fff;
}
.tab .tab-content{
    padding: 10px 15px;
    margin-top: 0;
    background: #fff;
    font-size: 15px;
    color: #777;
    line-height: 30px;
    position: relative;
}
.tab .tab-content:before{
    content: "";
    width: 100%;
    padding: 6px 0;
    border: 1px solid #d3d3d3;
    position: absolute;
    top: -18px;
    left: 0;
}
.tab .tab-content h3{
    font-size: 24px;
    margin-top: 0;
}
@media only screen and (max-width: 479px){
    .tab .nav-tabs li{
        width: 100%;
        text-align: center;
    }
    .tab .nav-tabs li a{ margin-bottom: 36px; }
    .tab .nav-tabs li a:before{
        width: 100%;
        bottom: -20px;
    }
    .tab .nav-tabs li a:after{
        margin: 0 auto;
        bottom: -30px;
        left: 0;
        right: 0;
    }
    .tab .tab-content:before{
        width: 0;
        padding: 0;
        border: none;
    }
}  
</style>

