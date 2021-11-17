<input required type="hidden" name="division" value="<?php echo $_GET['division']; ?>" />
                            <br>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <?php
                                        foreach ($type as $key => $request) {
                                            if ($request['id'] == 1) {
                                                echo '<input  type="checkbox" name="req_type_category[]" id="checkboxgroup_g1" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '" /> 
                                                <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                                            }
                                        }

                                        ?>
                                        <div style="margin-left:30px;padding-top:10px;">
                                            <?php
                                            foreach ($data as $key => $request_type) {
                                                if ($request_type['id'] == 1) {
                                                    echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" id= "' . $request_type['enable'] . '" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['req_id'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php
                                        foreach ($type as $key => $request) {
                                            if ($request['id'] == 4) {
                                                echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g4" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"><b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                                            }
                                        }

                                        ?>
                                        <div style="margin-left:30px;padding-top:10px;">
                                            <?php
                                            foreach ($data as $key => $request_type) {
                                                if ($request_type['id'] == 4) {
                                                    if ($request_type['request_id'] == 14 || $request_type['request_id'] == 19) {
                                                        echo  $request_type['request_type'] . '<br>';
                                                    } else {
                                                        echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php
                                        foreach ($type as $key => $request) {
                                            if ($request['id'] == 7) {
                                                echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g7" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                                            }
                                        }

                                        ?>
                                        <div style="margin-left:30px;padding-top:10px;">
                                            <?php
                                            foreach ($data as $key => $request_type) {

                                                if ($request_type['id'] == 7) {
                                                    if ($request_type['request_id'] == 25 || $request_type['request_id'] == 26 || $request_type['request_id'] == 28 || $request_type['request_id'] == 29) {
                                                        echo '<input style="margin-left:30px;" type="checkbox" name="text1[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                                                    } else if ($request_type['request_id'] == 31) {
                                                        echo  $request_type['request_type'];
                                                    } else {
                                                        echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <?php
                                        foreach ($type as $key => $request) {
                                            if ($request['id'] == 2) {
                                                echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g2" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '" /> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                                            }
                                        }

                                        ?>
                                        <div style="margin-left:30px;padding-top:10px;">
                                            <?php
                                            foreach ($data as $key => $request_type) {

                                                if ($request_type['id'] == 2) {

                                                    echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php
                                        foreach ($type as $key => $request) {
                                            if ($request['id'] == 5) {
                                                echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g5" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"><b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                                            }
                                        }

                                        ?>
                                        <div style="margin-left:30px;padding-top:10px;">
                                            <?php
                                            foreach ($data as $key => $request_type) {
                                                if ($request_type['id'] == 5) {
                                                    if ($request_type['request_id'] == 14 || $request_type['request_id'] == 19) {
                                                        echo '<input style="margin-left:30px;" style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['req_id'] . '"  value="' . $request_type['request_type'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                                                    } else {
                                                        echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php
                                        foreach ($type as $key => $request) {
                                            if ($request['id'] == 8) {
                                                echo '<input type="checkbox" name="req_type_category[]" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                                            }
                                        }

                                        ?>
                                        <!-- <div style="margin-left:30px;padding-top:10px;">
                                        <?php
                                        foreach ($data as $key => $request_type) {

                                            if ($request_type['id'] == 8) {
                                                if ($request_type['request_id'] == 16) {
                                                    echo $request_type['request_type'] . '<br>';
                                                } else {
                                                    echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="checkboxgroup_g3 form-check-input checked_request" id="' . $request_type['req_id'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                                                }
                                            }
                                        }
                                        ?>
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="col-lg-4">
                                        <?php
                                        foreach ($type as $key => $request) {
                                            if ($request['id'] == 3) {
                                                echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g3" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '" /> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                                            }
                                        }

                                        ?>
                                        <div style="margin-left:30px;padding-top:10px;">
                                            <?php
                                            foreach ($data as $key => $request_type) {

                                                if ($request_type['id'] == 3) {

                                                    echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '" value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php
                                        foreach ($type as $key => $request) {
                                            if ($request['id'] == 6) {
                                                echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g6" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"><b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                                            }
                                        }

                                        ?>
                                        <div style="margin-left:30px;padding-top:10px;">
                                            <?php
                                            foreach ($data as $key => $request_type) {
                                                if ($request_type['id'] == 6) {
                                                    if ($request_type['request_id'] == 14 || $request_type['request_id'] == 19) {
                                                        echo '<input style="margin-left:30px;" style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['req_id'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                                                    } else {
                                                        echo '<input style="margin-bottom:10px;" type="checkbox" name="req_type_subcategory[]" class="' . $request_type['req_class'] . ' form-check-input checked_request" id="' . $request_type['enable'] . '"  value="' . $request_type['request_id'] . '"><span class="checkboxSub"> ' . $request_type['request_type'] . ' </span><br>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <?php
                                        foreach ($type as $key => $request) {
                                            if ($request['id'] == 9) {
                                                echo '<input type="checkbox" name="req_type_category[]" id="checkboxgroup_g9" class="checkbox_group form-check-input checked_request" value="' . $request['title'] . '"> <b><span class="checkboxtext"> ' . $request['title'] . ' </span></b><br>';
                                            }
                                        }

                                        ?>
                                        <div style="margin-left:30px;padding-top:10px;">
                                            <?php
                                            foreach ($data as $key => $request_type) {

                                                if ($request_type['id'] == 9) {
                                                    if ($request_type['request_id'] == 16) {
                                                        echo $request_type['request_type'] . '<br>';
                                                    } else {
                                                        echo  $request_type['request_type'] . '<br>';
                                                    }
                                                }
                                            }
                                            ?>
                                        </div>
                                    </div>

                                </div>
                            </div>