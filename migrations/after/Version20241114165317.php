<?php

declare(strict_types=1);

namespace DoctrineMigrations\after;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;


final class Version20241114165317 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        sleep(5);
    }

    public function down(Schema $schema): void
    {

    }
}
