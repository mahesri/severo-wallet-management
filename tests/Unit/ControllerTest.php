<?php

use App\Services\TransactionService;
use App\Repositories\TransactionRepository;

class ControllerTest extends \Tests\TestCase {

    private $noteService;
    protected function __setUp() : void
    {
        parent::setUp();
        $noteRepository = new TransactionRepository();
        $this->noteService = new TransactionService($noteRepository);

    }

    public function testGetNotes()
    {

        $notes = $this->noteService;


    }
}
