    <?php

function menuChecker($pointer) 
{
  $menu = [
  	'dashboard'                 => false, 
  	'calendar'                  => false,
  	'task_management'           => false,
  	'template_generator'        => false,
    'vehicle_request'           => false,
    'dtr'                       => false,
    'dtra'                      => false,
    'employees_directory'       => false,
    'official_business'         => false,
    'travel_order'              => false,
    'ro_and_roo'                => false,
    'health_declaration_form'   => false,
    'health_monitoring'         => false,
    'issuances'                 => false,
    'databank'                  => false,
    'phone_directory'           => false,
    'procurement'               => false,
    'view_iar'                  => false,
    'saro'                      => false,
    'saro_create'               => false,
    "saro_update"               => false,
    "ob_view"                   => false,
    "ob_create"                 => false,
    'ors_burs'                  => false,
    'view_burs'                 => false,
    'nta'                       => false,
    'nta_create'                => false,
    'nta_update'                => false,
    'nta_view'                  => false,
    'dv'                        => false,
    'dv_create'                 => false,
    'dv_process'                => false,
    'dv_update'                 => false,
    'travel_claim'              => false,
    'nta_obligation'            => false,
    'nta_obcreate'              => false,
    'travel_claim'              => false,
    'payroll'                   => false,
    'payroll_update'            => false,
    'ict_ta'                    => false,
    'web_posting'               => false,
    'setting'                   => false,
    'approval'                  => false,
    'report_generator'          => false,
    'finance_fundsource'        => false,
    'finance_obligation'        => false,
    'funds_downloaded'          => false,
    'hr_uploaddtr'              => false,
    'procurement'               => false,
    'transparency'              => false,
    'procurement'               => false,
    'transparency'              => false,
    'rfq'                       => false,
    'rfq_form_create'           => false,
    'rfq_form_view'             => false,
    'abstract_create'           => false,
    'abstract_view'             => false,
    'po_view'                   => false,
    'upload_dtr'                => false,
  ];

  if (array_key_exists($pointer, $menu)) {
  	$menu[$pointer] = true;
  }


  return $menu;
}
?>

