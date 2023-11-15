<?php
ob_start();
define('EOL', (PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
include 'Model/Connection.php';
require_once 'HumanResource/controller/EmployeesDirectoryController.php';
require_once 'library/PHPExcel/Classes/PHPExcel/IOFactory.php';

// Create a new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set the active sheet
$objPHPExcel->setActiveSheetIndex(0);
$sheet = $objPHPExcel->getActiveSheet();

$styleBorder = [
    'borders' => [
        'allborders' => [
            'style' => PHPExcel_Style_Border::BORDER_THIN,
            'color' => ['rgb' => '000000'], // Border color (black in this example)
        ],
    ],
];
$columnHeaders = [
    'Employee ID',
    'Employee No',
    'Employee Name',
    'Username',
    'Birth Date',
    'Age',
    'Gender',
    'Email',
    'Alternate Email',
    'Mobile Phone',
    'Current Address',
    'Permanent Address',
    'Division',
    'Position',
    'Designation',
    'Province',
    'Highest Education Attainment', 
    'Date Hired',
    'Years in Service',
    'Generation',
    'Awards Received',
    'With Children 6 Years and Below',
    'Member of Indigenous Group',
    'PWD',
    'Solo Parent',
    'Number of Children Below 18 Years Old',
    'Number of Children with Special Needs',
    'Existing Gynecological Disorder',
    'Existing Health Concerns',
    'Health Issues',
    'Gynecological Disorder'
];
// Assuming you have the $emp_opts array with employee data

$col = 'A';
$row = 2; // Starting row for data

// Set the column headers
foreach ($columnHeaders as $column) {
    $sheet->setCellValue($col . '1', $column);

    $maxLength = strlen($column) + 2; // Adjust the width based on the average character width
    $sheet->getColumnDimension($col)->setWidth($maxLength);
    $col++;
}

// Calculate the maximum string length for each column
$maxLengths = [];
foreach ($emp_opts as $employee) {
    $col = 'A';
    foreach ($employee as $key => $value) {
        $maxLength = strlen($value) + 2; // Adjust the width based on the average character width
        if (!isset($maxLengths[$col]) || $maxLength > $maxLengths[$col]) {
            $maxLengths[$col] = $maxLength;
        }
        $col++;
    }
}

// Set the width of each column based on the maximum string length
$col = 'A';
foreach ($maxLengths as $column => $maxLength) {
    $sheet->getColumnDimension($col)->setWidth($maxLength);
    $col++;
}

// Set the data and apply wrapping to each cell
foreach ($emp_opts as $employee) {
    $col = 'A';
    foreach ($employee as $key => $value) {
        $sheet->setCellValue($col . $row, $value);
        $sheet->getStyle($col . $row)->getAlignment()->setWrapText(true);
        $col++;
    }
    $row++;
}

$sheet->getProtection()->setPassword('swodniwutnubu');


// Set the filename and save the Excel file
$filename = 'employee_data.xlsx';
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save($filename);
header('location: ' . $filename);
