<?php
namespace App\Controllers\Patient;

use App\Controllers\BaseController;
use App\Models\Patient\PatientCommunicationModel;

class Communication extends BaseController
{
    protected $commModel;

    public function __construct()
    {
        $this->commModel = new PatientCommunicationModel();
        helper(['url','form']);
    }

    // List all messages/notifications for logged-in patient
    public function index()
    {
        // $patientId = session()->get('patient_id'); 
        // $data['messages'] = $this->commModel
        //     ->where('receiver_role', 'patient')
        //     ->where('receiver_id', $patientId)
        //     ->orderBy('created_at', 'DESC')
        //     ->findAll();
$patientId = session()->get('patient_id'); 

$data['messages'] = $this->commModel
                         ->orderBy('created_at', 'DESC')
                         ->findAll();


        return view('patient/communication/index', $data);
    }

    // View message details
    public function view($id)
    {
        $data['message'] = $this->commModel->find($id);

        if($data['message']['status'] == 'unread'){
            $this->commModel->update($id, ['status' => 'read']);
        }

        return view('patient/communication/view', $data);
    }

    // Send new message
   public function send()
{
    if ($this->request->getMethod() === 'post') {
        // Insert message into database
        $this->commModel->insert([
            'sender_role'   => 'patient',
            'sender_id'     => session()->get('patient_id'),
            'receiver_role' => $this->request->getPost('receiver_role'),
            'receiver_id'   => $this->request->getPost('receiver_id'),
            'subject'       => $this->request->getPost('subject'),
            'message'       => $this->request->getPost('message'),
            'type'          => 'message'
        ]);

        // Redirect to communications page with success message
        return redirect()->to('patient/communication')->with('success','Message sent successfully');
    }

    // If GET request, show the send form
    return view('patient/communication/send');
}

}
