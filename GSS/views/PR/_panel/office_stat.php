<?php foreach ($encoded_pr as $key => $data) :  ?>
                                                    <?php

                                                    if($data['pmo_title'] == 'LGCDD')
                                                    {
                                                        $bg_color="#28CECF";
                                                    }else if($data['pmo_title'] == 'LGMED')
                                                    {
                                                        $bg_color = "#D81B60";
                                                    }
                                                    else if($data['pmo_title'] == 'FAD')
                                                    {
                                                        $bg_color = "#2E7D32";
                                                    }
                                                    else if($data['pmo_title'] == 'ORD')
                                                    {
                                                        $bg_color = "#F57F17";
                                                    }
                                                    else if($data['pmo_title'] == 'CAVITE')
                                                    {
                                                        $bg_color = "#0D47A1";
                                                    }
                                                    else if($data['pmo_title'] == 'LAGUNA')
                                                    {
                                                        $bg_color = "#FF7043";
                                                    }
                                                    else if($data['pmo_title'] == 'BATANGAS')
                                                    {
                                                        $bg_color = "#5D4037";
                                                    }else if($data['pmo_title'] == 'RIZAL')
                                                    {
                                                        $bg_color = "#8E24AA";
                                                    }else if($data['pmo_title'] == 'QUEZON')
                                                    {
                                                        $bg_color = "#00E5FF";
                                                    }else if($data['pmo_title'] == 'LUCENA CITY')
                                                    {
                                                        $bg_color = "#009688";
                                                    }

                                                    ?>
                                                    <tr>
                                                        <td><?= $data['pmo_title']; ?></td>
                                                        <td><span class="badge" style="background-color:<?= $bg_color;?>"><?= $data['encoded']; ?></span></td>
                                                    </tr>
                                                <?php endforeach; ?>