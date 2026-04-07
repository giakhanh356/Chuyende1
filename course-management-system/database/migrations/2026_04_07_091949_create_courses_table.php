<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
{
    Schema::create('courses', function (Blueprint $table) {
        $table->id();
        $table->string('name'); 
        $table->string('slug')->unique(); // Slug tự sinh
        $table->decimal('price', 10, 2);  // Giá phải > 0
        $table->text('description')->nullable(); 
        $table->string('image')->nullable(); // Ảnh khóa học
        $table->enum('status', ['draft', 'published'])->default('draft'); 
        $table->softDeletes(); // Yêu cầu Soft Delete để xóa/khôi phục
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
