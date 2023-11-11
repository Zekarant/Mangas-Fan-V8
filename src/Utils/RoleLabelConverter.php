<?php 


namespace App\Utils;

class RoleLabelConverter
{
    public static function convertToLabel(string $role): array
    {
        $roleLabels = [
            'ROLE_FONDATOR' => [
                'label' => 'Fondateur',
                'color' => 'red',
            ],
            'ROLE_ADMIN' => [
                'label' => 'Administrateur',
                'color' => 'red',
            ],
            'ROLE_DEVELOPPER' => [
                'label' => 'Développeur',
                'color' => 'green',
            ],
            'ROLE_MODERATOR' => [
                'label' => 'Modérateur',
                'color' => 'orange',
            ],
            'ROLE_REDACTOR' => [
                'label' => 'Rédacteur',
                'color' => 'purple',
            ],
            'ROLE_NEWSEUR' => [
                'label' => 'Newseur',
                'color' => 'yellow',
            ],
            'ROLE_ANIMATOR' => [
                'label' => 'Animateur',
                'color' => 'cyan',
            ],
            'ROLE_COMMUNITY' => [
                'label' => 'Community Manager',
                'color' => 'pink',
            ],
            'ROLE_DESIGNER' => [
                'label' => 'Designer',
                'color' => 'brown',
            ],
            'ROLE_USER' => [
                'label' => 'Membre',
                'color' => 'gray',
            ],
            'ROLE_BANNED' => [
                'label' => 'Membre banni',
                'color' => 'black',
            ],
        ];
        

        return $roleLabels[$role] ?? ['label' => $role, 'color' => 'gray'];
    }
}
