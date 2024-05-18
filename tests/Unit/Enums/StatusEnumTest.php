<?php

namespace Tests\Unit\Enums;

use App\Enums\Status;
use PHPUnit\Framework\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class StatusEnumTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * Test that status enum has two values.
     */
    public function test_status_enum_has_two_values(): void
    {
        $statuses = Status::cases();

        $this->assertCount(2, $statuses);
    }
}
