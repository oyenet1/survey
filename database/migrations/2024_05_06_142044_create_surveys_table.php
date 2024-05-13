<?php

use App\Models\Lga;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->id();
            $table->string('education')->nullable();
            $table->string('age_range');
            $table->string('gender');
            $table->string('marital_status')->nullable();
            $table->integer('children')->nullable()->default(0);
            $table->string('location')->nullable();
            $table->string('occupation')->default('jobless');
            $table->string('monthly_income_range')->default('below 20000');
            $table->boolean('have_a_savings');
            $table->boolean('have_bank');
            $table->text('no_bank_account_reasons')->nullable();
            $table->boolean('has_borrowed_before');
            $table->json('services')->nullable();
            $table->string('usage')->nullable();
            $table->json('lenders')->nullable();
            $table->json('others')->nullable();
            $table->boolean('own_mobile_phone')->nullable();
            $table->boolean('affected_by_insecurity')->default(false);
            $table->longText('insecurity_details')->nullable();
            $table->string('phone_type')->nullable();
            $table->boolean('feel_safe')->nullable();
            $table->boolean('use_phone');
            $table->json('payment_methods')->nullable();
            $table->boolean('use_fintech')->default(false);
            $table->json('fintechs');
            $table->string('mode_of_savings')->nullable();
            $table->boolean('pays_interest_on_loan')->nullable();
            $table->boolean('happy_to_pay_interest')->nullable();
            $table->foreignIdFor(User::class)->nullable()->constrained()->nullOnDelete();
            $table->foreignIdFor(Lga::class)->nullable()->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surveys');
    }
};
