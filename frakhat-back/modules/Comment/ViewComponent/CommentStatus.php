<?php

namespace Modules\Comment\ViewComponent;

use Illuminate\View\Component;

class CommentStatus extends Component
{
    public $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function render()
    {
        return view('comment::view-component.comment-status', [
            'color' => $this->getStatusColor(),
            'text' => $this->getStatusText(),
        ]);
    }

    private function getStatusColor()
    {
        switch ($this->status) {
            case 'draft':
                return 'info';
            case 'approved':
                return 'success';
            case 'rejected':
                return 'danger';
            default:
                return 'gray';
        }
    }

    private function getStatusText()
    {
        switch ($this->status) {
            case 'pending':
                return 'بررسی نشده';
            case 'approved':
                return 'تأیید شده';
            case 'rejected':
                return 'رد شده';
            default:
                return 'نامشخص';
        }
    }
}
