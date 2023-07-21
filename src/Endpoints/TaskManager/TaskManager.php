<?php

namespace Weeek\Endpoints\TaskManager;

use Weeek\Endpoints\Endpoint;
use Weeek\HttpClient;

class TaskManager extends Endpoint
{
    /**
     * @var Projects
     */
    public $projects;
    /**
     * @var Boards
     */
    public $boards;
    /**
     * @var BoardColumns
     */
    public $boardColumns;
    /**
     * @var Tasks
     */
    public $tasks;

    public function __construct(HttpClient $http)
    {
        $this->projects = new Projects($http);
        $this->boards = new Boards($http);
        $this->boardColumns = new BoardColumns($http);
        $this->tasks = new Tasks($http);

        parent::__construct($http);
    }
}
