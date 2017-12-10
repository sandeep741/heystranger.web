<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Mail\EmailTemplateMail;
use App\Model\EmailTemplate\EmailTemplate;
use Illuminate\Support\Facades\Mail;

class SomeEvent
{

    use InteractsWithSockets,
        SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function sendEmailByTemplate($data)
    {
        $arrData       = $data->toArray();
        $template_code = $arrData['template_code'];

        // Get Email Template Data
        $emailTemplate = EmailTemplate::getEmailTemplateById($template_code);

        $message = !empty($arrData['message']) ? $arrData['message'] : $emailTemplate->message;
        $subject = !empty($arrData['subject']) ? $arrData['subject'] : $emailTemplate->subject;
        foreach ($arrData['variable'] as $key => $variable) {
            $message = str_replace($key, $variable, $message);
            $subject = str_replace($key, $variable, $subject);

        }
        $emailTemplate->message = $message;
        $emailTemplate->subject = $subject;
        $emailTemplate->to      = $arrData['to'];
        $emailTemplate->cc      = !empty($arrData['cc']) ? $arrData['cc'] : json_decode($emailTemplate->cc);
        $emailTemplate->bcc     = !empty($arrData['bcc']) ? $arrData['bcc'] : json_decode($emailTemplate->bcc);

        $emailTemplateAttachmentArr = $emailTemplate->relEmailTemplateAttachment;

        if (!empty($emailTemplateAttachmentArr) && count($emailTemplateAttachmentArr) > 0) {
            foreach ($emailTemplateAttachmentArr as $value) {
                $file_path[] = asset('storage/email_template_attachments/'.$value->name);
            }
            $emailTemplate->email_template_attachment_path = $file_path;
        }
        Mail::send(new EmailTemplateMail($emailTemplate));
    }

    public function sendEmail($data)
    {
        $arrData = $data->toArray();
        $toArr   = $arrData['to'];

        $templateMessage = $arrData['message'];

        foreach ($toArr as $value) {
            $arrData['to']      = $value;
            $arrData['message'] = str_replace('{email}', $value, $templateMessage);
            Mail::send(new EmailTemplateMail(collect($arrData)));
            unset($arrData['to']);
            unset($arrData['message']);
        }
    }
}