<?php

namespace Weeek\Responses\User;

use Weeek\Models\User\User;
use Weeek\Objects\Casts\AsObject;
use Weeek\Responses\Response;

class UserResponse extends Response
{
    /**
     * @var User
     */
    public $user;

    protected function getCasts(): array
    {
        return [
            'user' => new AsObject(User::class),
        ];
    }
}
