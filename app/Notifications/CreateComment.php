<?php

namespace App\Notifications;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class CreateComment extends Notification
{
    use Queueable;
    use HasFactory;

    private $comment_id;
    private $commented_by;
    private $post_title;

    /**
     * Create a new notification instance.
     */
    public function __construct($comment_id,$commented_by,$post_title)
    {
        $this->comment_id=$comment_id;
        $this->commented_by=$commented_by;
        $this->post_title=$post_title;
    }

    
    public function via(object $notifiable): array
    {
        return ['database'];
    }

   
     
    public function toArray(object $notifiable): array
    {
        return [
            'comment_id'=>$this->comment_id,
            'created_by'=>$this->commented_by,
            'post_title'=>$this->post_title
        ];
    }
}
