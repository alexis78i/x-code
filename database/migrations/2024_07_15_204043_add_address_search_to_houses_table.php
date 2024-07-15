<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add the address_search column using raw SQL
        DB::statement('ALTER TABLE houses ADD COLUMN address_search tsvector');

        // Create a function to update the address_search column
        DB::statement('
            CREATE OR REPLACE FUNCTION update_address_search() RETURNS trigger AS $$
            BEGIN
                NEW.address_search := to_tsvector(
                    \'simple\',
                    (SELECT name FROM streets WHERE streets.id = NEW.street_id) || \' \' || NEW.house_number
                );
                RETURN NEW;
            END
            $$ LANGUAGE plpgsql;
        ');

        // Create a trigger to call the function whenever a row is inserted or updated
        DB::statement('
            CREATE TRIGGER trigger_update_address_search
            BEFORE INSERT OR UPDATE ON houses
            FOR EACH ROW EXECUTE FUNCTION update_address_search();
        ');

        // Update existing rows
        DB::statement('
            UPDATE houses
            SET address_search = to_tsvector(
                \'simple\',
                (SELECT name FROM streets WHERE streets.id = houses.street_id) || \' \' || houses.house_number
            );
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop the trigger and function
        DB::statement('DROP TRIGGER IF EXISTS trigger_update_address_search ON houses;');
        DB::statement('DROP FUNCTION IF EXISTS update_address_search();');

        // Drop the address_search column
        DB::statement('ALTER TABLE houses DROP COLUMN address_search');
    }
};
