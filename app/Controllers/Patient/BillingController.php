<?php
namespace App\Controllers\Patient;

use App\Models\Patient\BillingModel;
use App\Models\Patient\PaymentModel;
use CodeIgniter\Controller;

class BillingController extends Controller
{
    protected $billingModel;
    protected $paymentModel;

    public function __construct()
    {
        $this->billingModel = new BillingModel();
        $this->paymentModel = new PaymentModel();
    }

    // List invoices
    public function index()
    {
        $patientId = session()->get('id');
        $data['invoices'] = $this->billingModel->orderBy('created_at','DESC')->findAll();
        return view('patient/billing/list', $data);
    }

    // Show pay form
    public function pay($id)
    {
        $invoice = $this->billingModel->find($id);
        if(!$invoice || $invoice['patient_id'] != session()->get('id')){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Invoice not found');
        }
        return view('patient/billing/pay', ['invoice'=>$invoice]);
    }

    // Process payment
    public function process($id)
    {
        $invoice = $this->billingModel->find($id);
        if(!$invoice || $invoice['patient_id'] != session()->get('id')){
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Invoice not found');
        }

        $method = $this->request->getPost('method');

        // insert into payments
        $this->paymentModel->insert([
            'billing_id' => $id,
            'patient_id' => session()->get('id'),
            'method'     => $method,
            'amount'     => $invoice['amount']
        ]);

        // update invoice status
        $this->billingModel->update($id, ['status'=>'Paid']);

        return redirect()->to('/patient/billing')->with('success','Payment successful');
    }

    // Payment history
    public function history()
    {
        $patientId = session()->get('id');
        $data['payments'] = $this->paymentModel->orderBy('paid_at','DESC')->findAll();
        return view('patient/billing/history',$data);
    }
}
