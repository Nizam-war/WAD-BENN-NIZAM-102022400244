<form action="{{ route('admin.update', $product->id) }}" 
      method="POST" 
      enctype="multipart/form-data" 
      class="p-8 sm:p-10">
    @csrf
    @method('PUT')

    <!-- Nama Produk -->
    <div class="mb-8">
        <label for="name" class="block text-sm font-semibold text-gray-900 mb-3">Nama Produk <span class="text-red-500">*</span></label>
        <input type="text" name="name" id="name" value="{{ $product->name }}" required>
    </div>

    <!-- Deskripsi Produk -->
    <div class="mb-8">
        <textarea name="description" required>{{ $product->description }}</textarea>
    </div>

    <!-- Harga -->
    <div class="mb-8">
        <input type="number" name="price" value="{{ $product->price }}" required>
    </div>

    <!-- Upload Gambar -->
    <div class="mb-8">
        <input type="file" name="image" id="image" accept="image/*">
    </div>

    <!-- Tombol -->
    <div class="flex gap-4 pt-8">
        <a href="{{ route('admin.index') }}">Batal</a>
        <button type="submit">Update Produk</button>
    </div>
</form>
