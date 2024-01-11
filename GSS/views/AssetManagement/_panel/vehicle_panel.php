<style>
    .leaflet-container {
        height: 500px;
        width: 100%;
        max-width: 100%;
        max-height: 100%;
    }

    .dropbox {
        height: 580px;
        overflow: auto;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Vehicle Request Application</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">RICTU</a></li>
            <li class="active">Vehicle Request Application</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php //include('_panel/box.html.php'); 
            ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <button class="btn btn-success"><a href="vehicle_request_create.html.php">Create Request</a></button>
                        <button class="btn btn-success">Reports</button>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="box box-primary dropbox">
                    <div class="box-header">
                        <h4>Deployed Drivers</h4>
                    </div>
                    <div class="box-body">
                        <div id='map'></div>
                    </div>
                </div>

            </div>
            <div class="col-md-8">
                <div class="box box-primary dropbox">
                    <div class="box-header">
                        <h4>Vehicle Request List</h4>
                    </div>
                    <div class="box-body">
                        <table id="example1" class="table table-striped table-bordered display table-hover" style="width:100%">
                            <thead>
                                <tr style="color: white; background-color: #367fa9;">
                                    <th style="text-align:center;" width="11%">CONTROL NO</th>
                                    <th style="text-align:center;" width="8%">REQUEST DATE</th>
                                    <th style="text-align:center;" width="10%">TYPE</th>
                                    <th style="text-align:center;" width="10%">REQUEST BY</th>
                                    <th style="text-align:center;" width="10%">OFFICE</th>
                                    <th style="text-align:center;" width="10%">PURPOSE</th>
                                    <th style="text-align:center;" width="10%">DESTINATION</th>
                                    <th style="text-align:center;" width="10%">NO. OF PAX</th>
                                    <th style="text-align:center;" width="10%">DEPARTURE</th>
                                    <th style="text-align:center;" width="10%">RETURN</th>
                                </tr>
                            </thead>
                            <tbody id="fs-body">
                                <?php for ($i = 0; $i < 25; $i++) : ?>
                                    <tr>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                        <td>a</td>
                                    </tr>
                                <?php endfor; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <div class="col-md-12">
                <div class="box box-primary dropbox">
                    <div class="box-header">
                        <h4>Drivers</h4>
                    </div>
                    <div class="box-body">
                        <div class="col-md-4">
                            <div class="list-group contact-group zoom" style="margin-bottom: 5px;">
                                <a href="#" class="list-group-item" style="padding: 7px 7px; background-color:#f3eff5">
                                    <div class="media">
                                        <div class="pull-left" style="width:65px; height:65px;">
                                            <img class="img-circle" style="border-radius: 5px; width: 100%; height: 100%; object-fit: cover;" src="images/profile/SHAZER PIC 2X2.jpg" alt="...">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-content">
                                                <small>LGOO II</small><br>
                                            </div>

                                            <div class="media-content" style="margin-top: -1%;">
                                                <i class="fa fa-user"></i> <b class="media-heading" style="font-size: 10pt;">SHAZER LEO AMBAS</b>
                                            </div>

                                            <div class="media-content" style="margin-top: -1%;">
                                                <small><i class="fa fa-envelope"></i> shazerambas@gmail.com</small>
                                            </div>
                                            <div class="media-content" style="margin-top: -2%;">
                                                <small><i class="fa fa-phone"></i> 0929-841-6156</small>
                                                <ul class="list-unstyled pull-right">
                                                    <span class="label label-default label2">0</span>
                                                    <span class="label label-warning label2">0</span>
                                                    <span class="label label-primary label2">0</span>
                                                    <span class="label label-success label2">0</span>
                                                </ul>
                                            </div>



                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="list-group contact-group zoom" style="margin-bottom: 5px;">
                                <a href="#" class="list-group-item" style="padding: 7px 7px; background-color:#f3eff5">
                                    <div class="media">
                                        <div class="pull-left" style="width:65px; height:65px;">
                                            <img class="img-circle" style="border-radius: 5px; width: 100%; height: 100%; object-fit: cover;" src="images/profile/SHAZER PIC 2X2.jpg" alt="...">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-content">
                                                <small>LGOO II</small><br>
                                            </div>

                                            <div class="media-content" style="margin-top: -1%;">
                                                <i class="fa fa-user"></i> <b class="media-heading" style="font-size: 10pt;">SHAZER LEO AMBAS</b>
                                            </div>

                                            <div class="media-content" style="margin-top: -1%;">
                                                <small><i class="fa fa-envelope"></i> shazerambas@gmail.com</small>
                                            </div>
                                            <div class="media-content" style="margin-top: -2%;">
                                                <small><i class="fa fa-phone"></i> 0929-841-6156</small>
                                                <ul class="list-unstyled pull-right">
                                                    <span class="label label-default label2">0</span>
                                                    <span class="label label-warning label2">0</span>
                                                    <span class="label label-primary label2">0</span>
                                                    <span class="label label-success label2">0</span>
                                                </ul>
                                            </div>



                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="list-group contact-group zoom" style="margin-bottom: 5px;">
                                <a href="#" class="list-group-item" style="padding: 7px 7px; background-color:#f3eff5">
                                    <div class="media">
                                        <div class="pull-left" style="width:65px; height:65px;">
                                            <img class="img-circle" style="border-radius: 5px; width: 100%; height: 100%; object-fit: cover;" src="images/profile/SHAZER PIC 2X2.jpg" alt="...">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-content">
                                                <small>LGOO II</small><br>
                                            </div>

                                            <div class="media-content" style="margin-top: -1%;">
                                                <i class="fa fa-user"></i> <b class="media-heading" style="font-size: 10pt;">SHAZER LEO AMBAS</b>
                                            </div>

                                            <div class="media-content" style="margin-top: -1%;">
                                                <small><i class="fa fa-envelope"></i> shazerambas@gmail.com</small>
                                            </div>
                                            <div class="media-content" style="margin-top: -2%;">
                                                <small><i class="fa fa-phone"></i> 0929-841-6156</small>
                                                <ul class="list-unstyled pull-right">
                                                    <span class="label label-default label2">0</span>
                                                    <span class="label label-warning label2">0</span>
                                                    <span class="label label-primary label2">0</span>
                                                    <span class="label label-success label2">0</span>
                                                </ul>
                                            </div>



                                        </div>

                                    </div>
                                </a>
                            </div>
                            <div class="list-group contact-group zoom" style="margin-bottom: 5px;">
                                <a href="#" class="list-group-item" style="padding: 7px 7px; background-color:#f3eff5">
                                    <div class="media">
                                        <div class="pull-left" style="width:65px; height:65px;">
                                            <img class="img-circle" style="border-radius: 5px; width: 100%; height: 100%; object-fit: cover;" src="images/profile/SHAZER PIC 2X2.jpg" alt="...">
                                        </div>
                                        <div class="media-body">
                                            <div class="media-content">
                                                <small>LGOO II</small><br>
                                            </div>

                                            <div class="media-content" style="margin-top: -1%;">
                                                <i class="fa fa-user"></i> <b class="media-heading" style="font-size: 10pt;">SHAZER LEO AMBAS</b>
                                            </div>

                                            <div class="media-content" style="margin-top: -1%;">
                                                <small><i class="fa fa-envelope"></i> shazerambas@gmail.com</small>
                                            </div>
                                            <div class="media-content" style="margin-top: -2%;">
                                                <small><i class="fa fa-phone"></i> 0929-841-6156</small>
                                                <ul class="list-unstyled pull-right">
                                                    <span class="label label-default label2">0</span>
                                                    <span class="label label-warning label2">0</span>
                                                    <span class="label label-primary label2">0</span>
                                                    <span class="label label-success label2">0</span>
                                                </ul>
                                            </div>



                                        </div>
                                        
                                    </div>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    const map = L.map('map', {
        doubleClickZoom: false
    }).locate({
        setView: true,
        maxZoom: 9
    });

    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    const LeafIcon = L.Icon.extend({
        options: {
            iconSize: [50, 50],
            shadowSize: [50, 64],
            iconAnchor: [22, 94],
            shadowAnchor: [4, 62],
            popupAnchor: [-3, -76]
        }
    });

    const greenIcon = new LeafIcon({
        iconUrl: 'images/profile/SACLUTI-MARK KIM.jpg'
    });

    const mGreen = L.marker([14.209346214521673, 121.15404615530572], {
        icon: greenIcon
    }).addTo(map);
    const a = L.marker([14.322478127446953, 121.33898243028985], {
        icon: greenIcon
    }).addTo(map);
</script>



</body>

</html>