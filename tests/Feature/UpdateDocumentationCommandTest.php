<?php

namespace Tests\Feature;

use App\Console\UpdateDocumentationCommand;
use App\Models\DocumentationPage;
use Tests\TestCase;

class UpdateDocumentationCommandTest extends TestCase
{
    /** @test */
    public function it_can_copy_the_documentation_from_github_to_the_database()
    {
        $this->artisan(UpdateDocumentationCommand::class)->assertExitCode(0);

        $this->assertGreaterThan(0, DocumentationPage::count());
    }
}
