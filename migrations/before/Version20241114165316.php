<?php

declare(strict_types=1);

namespace DoctrineMigrations\before;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241114165316 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {

        $this->addSql('ALTER TABLE "user" ADD COLUMN first_name VARCHAR(255)');
        $this->addSql('UPDATE "user" SET first_name = firstname');
        $this->addSql('ALTER TABLE "user" ALTER COLUMN first_name SET NOT NULL');

        $this->addSql("CREATE OR REPLACE FUNCTION replicate_firstname_and_first_name()
RETURNS TRIGGER AS $$
BEGIN
    -- If firstname is changed, update first_name
    IF TG_OP = 'INSERT' OR (TG_OP = 'UPDATE' AND NEW.firstname IS DISTINCT FROM OLD.firstname) THEN
        NEW.first_name := NEW.firstname;
    END IF;

    -- If first_name is changed, update firstname
    IF TG_OP = 'INSERT' OR (TG_OP = 'UPDATE' AND NEW.first_name IS DISTINCT FROM OLD.first_name) THEN
        NEW.firstname := NEW.first_name;
    END IF;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;
");

        $this->addSql('CREATE TRIGGER trigger_replicate_firstname_and_first_name
BEFORE INSERT OR UPDATE ON "user"
FOR EACH ROW
EXECUTE FUNCTION replicate_firstname_and_first_name();
');

    }

    public function down(Schema $schema): void
    {
    }
}
