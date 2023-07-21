<?php

namespace Weeek\Responses\CRM\Contact;

use Weeek\Models\CRM\Contact;
use Weeek\Objects\Casts\AsObject;
use Weeek\Responses\Response;

class ContactResponse extends Response
{
    /**
     * @var Contact
     */
    public $contact;

    protected function getCasts(): array
    {
        return [
            'contact' => new AsObject(Contact::class),
        ];
    }
}
