<?php
namespace App\Controllers\Doctor;

use App\Controllers\BaseController;
use App\Models\Doctor\CommunicationModel;

class Communications extends BaseController
{
    protected $communicationModel;

    public function __construct()
    {
        $this->communicationModel = new CommunicationModel();
        helper(['url', 'form']);
    }

    // Inbox / dashboard
    public function index()
    {
        // Fetch messages for the doctor (including alerts)
        $data['messages'] = $this->communicationModel->where('receiver_role','doctor')
                                                       ->orderBy('created_at','DESC')
                                                       ->findAll();
        return view('doctor/communications/index', $data);
    }

    // Show form to send a new message
    public function sendForm()
    {
        return view('doctor/communications/send');
    }

    // Store sent message
    public function send()
    {
        $this->communicationModel->save([
            'sender_role' => 'doctor',
            'receiver_role' => $this->request->getPost('receiver_role'),
            'receiver_id' => $this->request->getPost('receiver_id'),
            'subject' => $this->request->getPost('subject'),
            'message' => $this->request->getPost('message'),
            'status' => 'unread'
        ]);

        return redirect()->to('doctor/communications')->with('success','Message sent successfully.');
    }

    // View a specific message
    public function view($id)
    {
        $data['message'] = $this->communicationModel->find($id);
        return view('doctor/communications/view', $data);
    }
}
