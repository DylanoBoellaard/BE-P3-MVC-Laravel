<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Create table products
        Schema::dropIfExists('products');
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('naam', 50);
            $table->string('barcode', 15);
            $table->boolean('isActief')->default(true);
            $table->string('opmerkingen', 250)->nullable();
            $table->timestamps(6);
            $table->engine = 'InnoDB';
        });

        // Insert values in table products
        DB::table('products')->insert([
            [
                'naam' => 'Mintnopjes',
                'barcode' => '8719587231278',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Schoolkrijt',
                'barcode' => '8719587326713',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Honingdrop',
                'barcode' => '8719587327836',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Zure Beren',
                'barcode' => '8719587321441',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Cola Flesjes',
                'barcode' => '8719587321237',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Turtles',
                'barcode' => '8719587322245',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Witte Muizen',
                'barcode' => '8719587328256',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Reuze Slangen',
                'barcode' => '8719587325641',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Zoute Rijen',
                'barcode' => '8719587322739',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Winegums',
                'barcode' => '8719587327527',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Drop Munten',
                'barcode' => '8719587322345',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Kruis drop',
                'barcode' => '8719587322265',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Zoute Ruitjes',
                'barcode' => '8719587323256',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Drop Ninjas',
                'barcode' => '8719587323277',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ]
        ]);

        // Create table allergeens
        Schema::dropIfExists('allergeens');
        Schema::create('allergeens', function (Blueprint $table) {
            $table->id();
            $table->string('naam', 50);
            $table->string('omschrijving', 100);
            $table->boolean('isActief')->default(true);
            $table->string('opmerkingen', 250)->nullable();
            $table->timestamps(6);
            $table->engine = 'InnoDB';
        });

        // Insert values in table allergeens
        DB::table('allergeens')->insert([
            [
                'naam' => 'Gluten',
                'Omschrijving' => 'Dit product bevat gluten',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Gelatine',
                'Omschrijving' => 'Dit product bevat gelatine',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'AZO-Kleurstof',
                'Omschrijving' => 'Dit product bevat AZO-kleurstoffen',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Lactose',
                'Omschrijving' => 'Dit product bevat lactose',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Soja',
                'Omschrijving' => 'Dit product bevat soja',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
        ]);

        // Create table leveranciers
        Schema::dropIfExists('leveranciers');
        Schema::create('leveranciers', function (Blueprint $table) {
            $table->id();
            $table->string('naam', 50);
            $table->string('contactPersoon', 100);
            $table->string('leverancierNummer', 100);
            $table->string('mobiel', 15);
            $table->boolean('isActief')->default(true);
            $table->string('opmerkingen', 250)->nullable();
            $table->timestamps(6);
            $table->engine = 'InnoDB';
        });

        // Insert values in table leveranciers
        DB::table('leveranciers')->insert([
            [
                'naam' => 'Venco',
                'contactPersoon' => 'Bert van Linge',
                'leverancierNummer' => 'L1029384719',
                'mobiel' => '06-28493827',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Astra Sweets',
                'contactPersoon' => 'Jasper del Monte',
                'leverancierNummer' => 'L1029284315',
                'mobiel' => '06-39398734',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Haribo',
                'contactPersoon' => 'Sven Stalman',
                'leverancierNummer' => 'L1029324748',
                'mobiel' => '06-24383291',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Basset',
                'contactPersoon' => 'Joyce Stelterberg',
                'leverancierNummer' => 'L1023845773',
                'mobiel' => '06-48293823',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'De Bron',
                'contactPersoon' => 'Remco Veenstra',
                'leverancierNummer' => 'L1023857736',
                'mobiel' => '06-34291234',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Quality Street',
                'contactPersoon' => 'Johan Nooij',
                'leverancierNummer' => 'L1029234586',
                'mobiel' => '06-23458456',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'naam' => 'Hom Ken Food',
                'contactPersoon' => 'Hom Ken',
                'leverancierNummer' => 'L1029234599',
                'mobiel' => '06-23458477',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ]
        ]);

        // Create table contact
        Schema::dropIfExists('contact');
        Schema::create('contact', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leveranciersId') // Declare foreign key
                ->references('id')
                ->on('leveranciers')
                ->onDelete('cascade'); // Cascade = if record in referenced table gets deleted, all related records in the current table will also be deleted
            $table->string('straat', 50);
            $table->string('huisnummer', 10);
            $table->string('postcode', 10);
            $table->string('stad', 50);
            $table->boolean('isActief')->default(true);
            $table->string('opmerkingen', 250)->nullable();
            $table->timestamps(6);
            $table->engine = 'InnoDB';
        });

        // Insert values in table contact
        DB::table('contact')->insert([
            [
                'leveranciersId' => 1,
                'straat' => 'Van Gilslaan',
                'huisnummer' => '34',
                'postcode' => '1045CB',
                'stad' => 'Hilvarenbeek',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 2,
                'straat' => 'Den Dolderpad',
                'huisnummer' => '2',
                'postcode' => '1067RC',
                'stad' => 'Utrecht',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 3,
                'straat' => 'Fredo Raalteweg',
                'huisnummer' => '257',
                'postcode' => '1236OP',
                'stad' => 'Nijmegen',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 4,
                'straat' => 'Bertrand Russellhof',
                'huisnummer' => '21',
                'postcode' => '2034AP',
                'stad' => 'Den Haag',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 5,
                'straat' => 'Leon van Bonstraat',
                'huisnummer' => '213',
                'postcode' => '145XC',
                'stad' => 'Lunteren',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 6,
                'straat' => 'Bea van Lingenlaan',
                'huisnummer' => '234',
                'postcode' => '2197FG',
                'stad' => 'Sint Pancras',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
        ]);

        // Create table magazijns
        Schema::dropIfExists('magazijns');
        Schema::create('magazijns', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productsId') // Declare foreign key
                ->references('id')
                ->on('products')
                ->onDelete('cascade'); // Cascade = if record in referenced table gets deleted, all related records in the current table will also be deleted
            $table->decimal('verpakkingsEenheid', 5, 2);
            $table->smallInteger('aantalAanwezig')->nullable();
            $table->boolean('isActief')->default(true);
            $table->string('opmerkingen', 250)->nullable();
            $table->timestamps(6);
            $table->engine = 'InnoDB';
        });

        // Insert values in table magazijns
        DB::table('magazijns')->insert([
            [
                'productsId' => 1,
                'verpakkingsEenheid' => 5,
                'aantalAanwezig' => 453,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 2,
                'verpakkingsEenheid' => 2.5,
                'aantalAanwezig' => 400,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 3,
                'verpakkingsEenheid' => 5,
                'aantalAanwezig' => 1,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 4,
                'verpakkingsEenheid' => 1,
                'aantalAanwezig' => 800,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 5,
                'verpakkingsEenheid' => 3,
                'aantalAanwezig' => 234,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 6,
                'verpakkingsEenheid' => 2,
                'aantalAanwezig' => 345,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 7,
                'verpakkingsEenheid' => 1,
                'aantalAanwezig' => 795,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 8,
                'verpakkingsEenheid' => 10,
                'aantalAanwezig' => 233,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 9,
                'verpakkingsEenheid' => 2.5,
                'aantalAanwezig' => 123,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 10,
                'verpakkingsEenheid' => 3,
                'aantalAanwezig' => null,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 11,
                'verpakkingsEenheid' => 2,
                'aantalAanwezig' => 367,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 12,
                'verpakkingsEenheid' => 1,
                'aantalAanwezig' => 467,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 13,
                'verpakkingsEenheid' => 5,
                'aantalAanwezig' => 20,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
        ]);

        // Create table productsPerAllergeens
        Schema::dropIfExists('productsPerAllergeens');
        Schema::create('productsPerAllergeens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('productsId') // Declare foreign key
                ->references('id')
                ->on('products')
                ->onDelete('cascade'); // Cascade = if record in referenced table gets deleted, all related records in the current table will also be deleted
            $table->foreignId('allergeensId') // Declare foreign key
                ->references('id')
                ->on('allergeens')
                ->onDelete('cascade');
            $table->boolean('isActief')->default(true);
            $table->string('opmerkingen', 250)->nullable();
            $table->timestamps(6);
            $table->engine = 'InnoDB';
        });

        // Insert values in table productsPerAllergeens
        DB::table('productsPerAllergeens')->insert([
            [
                'productsId' => 1,
                'allergeensId' => 2,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 1,
                'allergeensId' => 1,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 1,
                'allergeensId' => 3,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 3,
                'allergeensId' => 4,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 6,
                'allergeensId' => 5,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 9,
                'allergeensId' => 2,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 9,
                'allergeensId' => 5,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 10,
                'allergeensId' => 2,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 12,
                'allergeensId' => 4,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 13,
                'allergeensId' => 1,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 13,
                'allergeensId' => 4,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 13,
                'allergeensId' => 5,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'productsId' => 14,
                'allergeensId' => 5,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ]
        ]);

        // Create table productsPerLeveranciers
        Schema::dropIfExists('productsPerLeveranciers');
        Schema::create('productsPerLeveranciers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('leveranciersId') // Declare foreign key
                ->references('id')
                ->on('leveranciers')
                ->onDelete('cascade'); // Cascade = if record in referenced table gets deleted, all related records in the current table will also be deleted
            $table->foreignId('productsId') // Declare foreign key
                ->references('id')
                ->on('products')
                ->onDelete('cascade');
            $table->date('datumLevering');
            $table->smallInteger('aantal');
            $table->date('datumEerstVolgendeLevering')->nullable();
            $table->boolean('isActief')->default(true);
            $table->string('opmerkingen', 250)->nullable();
            $table->timestamps(6);
            $table->engine = 'InnoDB';
        });

        // Insert values in table productsPerLeveranciers
        DB::table('productsPerLeveranciers')->insert([
            [
                'leveranciersId' => 1,
                'productsId' => 1,
                'datumLevering' => '2023-04-09',
                'aantal' => 23,
                'datumEerstVolgendeLevering' => '2023-04-16',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 1,
                'productsId' => 1,
                'datumLevering' => '2023-04-18',
                'aantal' => 21,
                'datumEerstVolgendeLevering' => '2023-04-25',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 1,
                'productsId' => 2,
                'datumLevering' => '2023-04-09',
                'aantal' => 12,
                'datumEerstVolgendeLevering' => '2023-04-16',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 1,
                'productsId' => 3,
                'datumLevering' => '2023-04-10',
                'aantal' => 11,
                'datumEerstVolgendeLevering' => '2023-04-17',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 2,
                'productsId' => 4,
                'datumLevering' => '2023-04-14',
                'aantal' => 16,
                'datumEerstVolgendeLevering' => '2023-04-21',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 2,
                'productsId' => 4,
                'datumLevering' => '2023-04-21',
                'aantal' => 23,
                'datumEerstVolgendeLevering' => '2023-04-28',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 2,
                'productsId' => 5,
                'datumLevering' => '2023-04-14',
                'aantal' => 45,
                'datumEerstVolgendeLevering' => '2023-04-21',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 2,
                'productsId' => 6,
                'datumLevering' => '2023-04-14',
                'aantal' => 30,
                'datumEerstVolgendeLevering' => '2023-04-21',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 3,
                'productsId' => 7,
                'datumLevering' => '2023-04-12',
                'aantal' => 12,
                'datumEerstVolgendeLevering' => '2023-04-19',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 3,
                'productsId' => 7,
                'datumLevering' => '2023-04-19',
                'aantal' => 23,
                'datumEerstVolgendeLevering' => '2023-04-26',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 3,
                'productsId' => 8,
                'datumLevering' => '2023-04-10',
                'aantal' => 12,
                'datumEerstVolgendeLevering' => '2023-04-17',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 3,
                'productsId' => 9,
                'datumLevering' => '2023-04-1',
                'aantal' => 1,
                'datumEerstVolgendeLevering' => '2023-04-18',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 4,
                'productsId' => 10,
                'datumLevering' => '2023-04-16',
                'aantal' => 24,
                'datumEerstVolgendeLevering' => '2023-04-30',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 5,
                'productsId' => 11,
                'datumLevering' => '2023-04-10',
                'aantal' => 47,
                'datumEerstVolgendeLevering' => '2023-04-17',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 5,
                'productsId' => 11,
                'datumLevering' => '2023-04-19',
                'aantal' => 60,
                'datumEerstVolgendeLevering' => '2023-04-26',
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 5,
                'productsId' => 12,
                'datumLevering' => '2023-04-11',
                'aantal' => 45,
                'datumEerstVolgendeLevering' => null,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
            [
                'leveranciersId' => 5,
                'productsId' => 13,
                'datumLevering' => '2023-04-12',
                'aantal' => 23,
                'datumEerstVolgendeLevering' => null,
                'isActief' => 1,
                'opmerkingen' => null,
                'created_at' => now()->micro(6),
                'updated_at' => now()->micro(6),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
        Schema::dropIfExists('allergeens');
        Schema::dropIfExists('magazijns');
        Schema::dropIfExists('leveranciers');
        Schema::dropIfExists('productsPerAllergeens');
        Schema::dropIfExists('productsPerLeveranciers');
    }
};
