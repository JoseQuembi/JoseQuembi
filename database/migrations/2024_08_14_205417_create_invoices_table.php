<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained()->onDelete('cascade');
            $table->string('invoice_number')->unique();
            $table->date('issue_date');
            $table->date('due_date');
            $table->decimal('total_amount', 10, 2);
            $table->enum('status', ['pending', 'paid'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
}
