
    <!-- 
    Author: Mark Kim A. Sacluti
    Date: January 19, 2022
    Module: Procurement_APP
    Note: This modal is use for viewing all
    duplicate stock number and the code for 
    fetching the data is in this path:
    backend/js/custom.js
    function name is fetchDuplicatEntry
     -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary">
        <span class="glyphicon glyphicon-info-sign"></span> List of all duplicate stock number .
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <div id="w7" class="grid-view">
                            <table class="table table-striped table-bordered" id="app_duplicate_tbl">
                                <thead class="bg-primary">
                                    <tr>
                                        <th>Stock Number</th>
                                        <th>Item</th>
                                        <th>App Year</th>
                                        <th>App Price</th>
                                        <th>Mode of Procurement</th>
                                    </tr>
                                </thead>
                                <tbody>             
                                </tbody>
                            </table>
                           
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success" id="btnproceed">Proceed</button>
                </div>
            </div>
        </div>
    </div>