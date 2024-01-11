 <div role="tabpanel" class="tab-pane <?= $is_active1; ?>" id="emp_directory">
                        <div class="row">
                            <div class="col-md-12">
                                <?php if (in_array($username, $sys_admins)) : ?>
                                    <a class="btn btn-success" href="CreateEmployee.php?division=<?php echo $division ?>&username=<?php echo $username ?>" style="color:white;text-decoration: none;margin-bottom:5px;"><i class="fa fa-user-plus"></i> Add Equipment</a>
                                    <a class="btn btn-primary pull-right" href="download_employee.php" style="color:white;text-decoration: none;margin-bottom:5px;"><i class="fa fa-file-excel-o"></i> Download </a>
                                <?php endif ?>
                                <table id="example2" class="table table-bordered table-striped display">
                                    <thead>
                                        <tr style="color: white; background-color: #367fa9;">
                                            <th class="hidden"></th>
                                            <th style="color:#367fa9;"></th>
                                            <th class="text-center">ARTICLE</th>
                                            <th class="text-center">OFFICE</th>
                                            <th class="text-center">DESCRIPTION</th>
                                            <th class="text-center">SERIAL NO</th>
                                            <th class="text-center">PROPERTY NO.</th>
                                            <th class="text-center">DATE ACQUIRED</th>
                                            <th class="text-center">UNIT VALUE</th>
                                            <th class="text-center">UNIT MEASURE</th>
                                            <th class="text-center">PROPERTY CARD</th>
                                            <th class="text-center">PHYSICAL COUNT</th>
                                            <th class="text-center">SHORTAGE (QUANTITY)</th>
                                            <th class="text-center">SHORTAGE(VALUE)</th>
                                            <th class="text-center">REMARKS</th>
                                            <th class="text-center">STATUS</th>
                                            <th class="text-center" style="width:30%;">ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($par_opts as $key => $dd) : ?>
                                            <tr>
                                                <td class="hidden" style="vertical-align: middle;"><?= $key; ?></td>
                                                <td style="vertical-align: middle;"></td>
                                                <td><?= $dd['article']; ?></td>
                                                <td><?= $dd['office']; ?></td>
                                                <td><?= $dd['description']; ?></td>
                                                <td><?= $dd['serial_no']; ?></td>
                                                <td><?= $dd['property_number']; ?></td>
                                                <td><?= $dd['date_acquired']; ?></td>
                                                <td><?= $dd['unit']; ?></td>
                                                <td><?= $dd['amount']; ?></td>
                                                <td><?= $dd['property_card']; ?></td>
                                                <td><?= $dd['physical_count']; ?></td>
                                                <td><?= $dd['shortage_Q']; ?></td>
                                                <td><?= $dd['shortage_V']; ?></td>
                                                <td><?= $dd['remarks']; ?></td>
                                                <td><?= $dd['status']; ?></td>


                                                <td class="text-center">
                                                    <div class="btn-group">
                                                        <a href="base_par_view.html.php?id=<?= $dd['id']; ?>" class="btn btn-success btn-sm btn-block" style="width: 100%;" title="Edit"><i class="fa fa-eye"></i></a>
                                                    </div>

                                                </td>
                                                <td class="hidden"><?= $dd['bday']; ?></td>
                                                <td class="hidden"><?= $dd['gender']; ?></td>
                                                <td class="hidden"><?= $dd['age']; ?></td>
                                                <td class="hidden"><?= $dd['mobile_no']; ?></td>
                                                <td class="hidden"><?= $dd['email']; ?></td>
                                                <td class="hidden" style="text-align:center;"><input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['generation'])) ? "checked" : ""; ?>> </td>
                                                <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['awards'])) ? "checked" : ""; ?>> </td>
                                                <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['hea'])) ? "checked" : ""; ?>> </td>
                                                <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q5'])) ? "checked" : ""; ?>> </td>
                                                <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q6'])) ? "checked" : ""; ?>> </td>
                                                <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q2'])) ? "checked" : ""; ?>> </td>
                                                <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q3'])) ? "checked" : ""; ?>> </td>
                                                <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q4'])) ? "checked" : ""; ?>> </td>
                                                <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q1'])) ? "checked" : ""; ?>> </td>
                                                <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['years_in_service'])) ? "checked" : ""; ?>> </td>
                                                <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q7'])) ? "checked" : ""; ?>> </td>
                                                <td class="hidden" style="text-align:center;"> <input disabled type="checkbox" class="form-check-input" <?= (!empty($dd['q8'])) ? "checked" : ""; ?>> </td>


                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>