<?php

namespace App\Notifications;

use App\Models\Post;
use App\Models\Cv;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PostNewNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $post, $cv, $accepted;
    public function __construct(Post $post, Cv $cv, $accepted)
    {
        $this->post = $post;
        $this->cv = $cv;
        $this->accepted = $accepted;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        return [
            'id' => $this->post->id,
            'nameofcompany' => $this->post->nameofcompany,
            'user_id' => $this->cv->user_id,
            'accept_or_not' => $this->accepted,

        ];
    }
}
