<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FicheDePaieCreer extends Notification
{
    use Queueable;

    use Queueable;

    protected $ficheDePaie;

    public function __construct($ficheDePaie)
    {
        $this->ficheDePaie = $ficheDePaie;
    }

    public function via($notifiable)
    {
        return ['mail']; 
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Nouvelle Fiche de Paie')
            ->line('Une nouvelle fiche de paie a été créée.')
            ->action('Voir la fiche de paie', route('listeFiche_de_paie'))
            ->line('Merci d\'utiliser notre application !');
    }
}
