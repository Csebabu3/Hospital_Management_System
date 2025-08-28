<?php
namespace App\Controllers\Receptionist;

use App\Models\Receptionist\BillingModel;
use App\Models\Receptionist\BillingForwardModel;
use CodeIgniter\Controller;

class BillingController extends Controller
{
    protected $billingModel;
    protected $forwardModel;

    public function __construct()
    {
        $this->billingModel = new BillingModel();
        $this->forwardModel = new BillingForwardModel();
    }

    public function index()
    {
        $data['bills'] = $this->billingModel->orderBy('id','DESC')->findAll();
        return view('receptionist/billing/list', $data);
    }

    public function create()
    {
        return view('receptionist/billing/form');
    }

    public function store()
    {
        $consultation = (float)$this->request->getPost('consultation_fee');
        $tests        = (float)$this->request->getPost('test_charges');
        $total        = $consultation + $tests;

        $this->billingModel->save([
            'patient_name'    => $this->request->getPost('patient_name'),
            'consultation_fee'=> $consultation,
            'test_charges'    => $tests,
            'total_amount'    => $total,
            'payment_method'  => $this->request->getPost('payment_method'),
            'insurance_info'  => $this->request->getPost('insurance_info'),
            'status'          => 'Unpaid'
        ]);

        return redirect()->to('receptionist/billing/list')->with('success','Bill generated successfully.');
    }

    public function edit($id)
    {
        $data['bill'] = $this->billingModel->find($id);
        return view('receptionist/billing/form', $data);
    }

    public function update($id)
    {
        $consultation = (float)$this->request->getPost('consultation_fee');
        $tests        = (float)$this->request->getPost('test_charges');
        $total        = $consultation + $tests;

        $this->billingModel->update($id, [
            'patient_name'    => $this->request->getPost('patient_name'),
            'consultation_fee'=> $consultation,
            'test_charges'    => $tests,
            'total_amount'    => $total,
            'payment_method'  => $this->request->getPost('payment_method'),
            'insurance_info'  => $this->request->getPost('insurance_info'),
            'status'          => $this->request->getPost('status')
        ]);

        return redirect()->to('receptionist/billing/list')->with('success','Bill updated successfully.');
    }

    public function delete($id)
    {
        $this->billingModel->delete($id);
        return redirect()->to('receptionist/billing/list')->with('success','Bill deleted.');
    }

    public function forward($id)
    {
        $this->forwardModel->save([
            'billing_id' => $id,
            'forwarded_to' => 'Finance Department'
        ]);

        $this->billingModel->update($id, ['status' => 'Forwarded']);

        return redirect()->to('receptionist/billing/list')->with('success','Bill forwarded to Finance Department.');
    }
}
