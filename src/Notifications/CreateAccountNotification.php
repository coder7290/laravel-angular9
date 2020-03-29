<?php
namespace App\Notification;

use App\Data\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

final class CreateAccountNotification extends AbstractNotification implements ShouldQueue
{
    use Queueable;

    /**
     *
     * @var string $password
     */
    private $password;

    /**
     *
     * @param User $user
     * @param string $token
     */
    public function __construct(User $user, string $password)
    {
        parent::__construct($user);
        $this->password = $password;
    }

    /**
     *
     * @return MailMessage
     */
    public function toMail(): MailMessage
    {
        return (new MailMessage())->view('api::mail.create-account', [
            'user' => $this->user,
            'password' => $this->password
        ])->subject('Założenie konta');
    }
}