# Weeek API Client Library for PHP #

[Weeek](https://weeek.net) is a multi-service platform that helps you make work more productive.

This package implements API that you can learn more about at [developers.weeek.net](https://developers.weeek.net)

## Installation

This package can be installed through Composer.

```bash
composer require weeek/weeek-client-php
```

You will also need to install packages that "provide"
[`psr/http-client-implementation`](https://packagist.org/providers/psr/http-client-implementation)
and [`psr/http-factory-implementation`](https://packagist.org/providers/psr/http-factory-implementation).
More info at [php-http.org](http://docs.php-http.org/en/latest/clients.html).

For example, you can use Guzzle

```bash
composer guzzlehttp/guzzle http-interop/http-factory-guzzle:^1.0
```

## Getting started

```php
<?php

require_once __DIR__ . '/vendor/autoload.php';

use Weeek\Client;

$accessToken = "<your-access-token>";

$client = new Client($accessToken);
```

## Examples

### Get workspace info

```php
# Get workspace info
$response = $client->workspace->info();

$workspaceInfo = $response->info;

# Get workspace members
$response = $client->workspace->members();

$workspaceMembers = $response->members;
```

### Work with tasks

```php
# Create a task
$response = $client->taskManager->tasks->create(['title' => 'My task']);

$createdTask = $response->task;

# Delete the task
$client->taskManager->tasks->destroy($createdTask->id);
```

### Work with deals

```php
$statusId = '<funnel-status-id>';

# Create a deal 
$response = $client->crm->deals->create($statusId, [
    'title'  => 'My deal',
    'amount' => 100.01
]);

$createdDeal = $response->deal;

# Create a subtask
$response = $client->crm->deals->createSubtask($createdDeal->id, ['title' => 'Deal subtask']);

$createdSubtask = $response->task;
```
