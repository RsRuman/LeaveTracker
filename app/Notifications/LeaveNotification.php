<?php

namespace App\Notifications;

use AllowDynamicProperties;
use App\Models\EmployeeLeave;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

#[AllowDynamicProperties]
class LeaveNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public Builder|Model $employeeLeave;

    /**
     * Create a new notification instance.
     */
    public function __construct(Model|Builder $employeeLeave)
    {
        $this->employeeLeave = $employeeLeave;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->view('mails.leave-mail', ['employeeLeave' => $this->employeeLeave]);
    }
}
