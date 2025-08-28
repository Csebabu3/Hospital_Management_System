<?php
namespace App\Controllers\Receptionist;

use App\Models\Receptionist\CommunicationModel;
use CodeIgniter\Controller;

class CommunicationController extends Controller
{
    protected $commModel;

    public function __construct()
    {
        $this->commModel = new CommunicationModel();
    }

    // List all communications
    public function index()
    {
        $data['messages'] = $this->commModel->orderBy('id','DESC')->findAll();
        return view('receptionist/communication/list', $data);
    }

    // Create new message
    public function create()
    {
        return view('receptionist/communication/form');
    }

    // Store message
    public function store()
    {
        $this->commModel->save([
            'sender_role'   => $this->request->getPost('sender_role'),
            'receiver_role' => $this->request->getPost('receiver_role'),
            'receiver_name' => $this->request->getPost('receiver_name'),
            'subject'       => $this->request->getPost('subject'),
            'message'       => $this->request->getPost('message'),
            'status'        => 'Unread'
        ]);

        return redirect()->to(base_url('receptionist/communication/list'))
                         ->with('success','Message sent successfully.');
    }

    // View single message
    public function view($id)
    {
        $data['message'] = $this->commModel->find($id);
        if ($data['message']) {
            $this->commModel->update($id, ['status' => 'Read']);
        }
        return view('receptionist/communication/view', $data);
    }

    // Delete
    public function delete($id)
    {
        $this->commModel->delete($id);
        return redirect()->to(base_url('receptionist/communication/list'))
                         ->with('success','Message deleted.');
    }
}
