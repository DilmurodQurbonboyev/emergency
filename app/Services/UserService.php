<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

class UserService
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function create($request): User
    {
        $path = 'users/images/';
        $fontPath = public_path('fonts/montserrat-v23-latin_cyrillic-ext_cyrillic-200.ttf');
        $char = strtoupper($request['email'][0]);
        $newAvatarName = rand(12, 34353) . time() . '.png';
        $dest = $path . $newAvatarName;
        $createAvatar = makeAvatar($fontPath, $dest, $char);
        $picture = $createAvatar == true ? $newAvatarName : '';

        $user = User::create(
            $request['user_id'],
            $request['email'],
            bcrypt($request['pin']
            ),
        );
        $this->userRepository->save($user);
        return $user;
    }
}
