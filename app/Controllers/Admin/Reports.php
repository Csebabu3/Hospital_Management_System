<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\PatientModel;
use App\Models\Admin\AppointmentModel;
use App\Models\Admin\PharmacySalesModel;
use App\Models\Admin\FinanceModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Dompdf\Dompdf;

class Reports extends BaseController
{
    protected $patientModel;

    public function __construct()
    {
        $this->patientModel = new PatientModel();
        helper(['url', 'form']);
    }

    // Reports selection page
    public function index()
    {
        return view('admin/reports/index');
    }

    // Generate report based on type and dates
    public function generate()
    {
        $type = $this->request->getPost('report_type');
        $from = $this->request->getPost('from_date');
        $to   = $this->request->getPost('to_date');

        $data = ['type' => $type, 'from' => $from, 'to' => $to];

        switch($type){
            case 'daily_patients':
                $data['report'] = $this->patientModel->getPatientInflow($from, $to);
                break;

            case 'doctor_consultation':
                $model = new AppointmentModel();
                $data['report'] = $model->getDoctorConsultations($from, $to);
                break;

            case 'pharmacy_sales':
                $model = new PharmacySalesModel();
                $data['report'] = $model->getSalesReport($from, $to);
                break;

            case 'finance':
                $model = new FinanceModel();
                $data['report'] = $model->getFinanceReport($from, $to);
                break;

            default:
                $data['report'] = [];
        }

        return view('admin/reports/view', $data);
    }

    // Export to Excel or PDF
    public function export($type, $from, $to)
    {
        switch($type){
            case 'excel':
                $this->exportExcel($from, $to);
                break;
            case 'pdf':
                $this->exportPDF($from, $to);
                break;
            default:
                return redirect()->back();
        }
    }

    private function exportExcel($from, $to)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Report');
        $sheet->setCellValue('A2', 'From: '.$from.' To: '.$to);

        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="report.xlsx"');
        $writer->save("php://output");
        exit;
    }

    private function exportPDF($from, $to)
    {
        $dompdf = new Dompdf();
        $html = "<h3>Report from $from to $to</h3>";
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4','portrait');
        $dompdf->render();
        $dompdf->stream("report.pdf", ["Attachment" => true]);
        exit;
    }
}
