<?php

namespace Weeek\Responses\CRM\Contact;

use Weeek\Models\CRM\Contact;
use Weeek\Objects\Casts\AsArrayOfObjects;
use Weeek\Responses\ListResponse;

class ContactListResponse extends ListResponse
{
    /**
     * @var array<Contact>
     */
    public $contacts;

    protected function getCasts(): array
    {
        return [
            'contacts' => new AsArrayOfObjects(Contact::class),
        ];
    }
}
