<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CancelInterviewRequestStudent extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $name;
    protected $oferta_id;

    public function __construct($name, $id)
    {
        $this->name = $name;
        $this->oferta_id = $id; 
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject(\Lang::get("project.cancel_interview_subject_student"))
                    ->line(\Lang::get("project.cancel_interview_line_student"). ' ' . $this->name)
                    ->action('Notification Action', url('/ofert/'.$this->oferta_id))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'type' => 'cancel_interview_request_student',
            'description' => \Lang::get("cancel_project.interview_line_student"). ' ' . $this->name,
            'name' => \Lang::get("project.interview_subject"),
            'oferta' => [
                'name' => $this->name,
                'id' => $this->oferta_id
            ],
        ];
    }
}
