 <!-- Title -->
 <div class="mb-3">
     <label for="title" class="form-label">Title</label>
     <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
         value="{{ old('title', $blog->title) }}" name="title" placeholder="Enter title">
     @error('title')
         <div class="invalid-feedback">
             {{ $message }}
         </div>
     @enderror
 </div>

 <!-- Description -->
 <div class="mb-3">
     <label for="description" class="form-label">Description</label>
     <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
         rows="3" placeholder="Enter description">{{ old('description', $blog->description) }}</textarea>
     @error('description')
         <div class="invalid-feedback">
             {{ $message }}
         </div>
     @enderror
 </div>

 <!-- Content -->
 <div class="mb-3">
     <label for="content" class="form-label">Content</label>
     <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5"
         placeholder="Enter content">{{ old('content', $blog->content) }}</textarea>
     @error('content')
         <div class="invalid-feedback">
             {{ $message }}
         </div>
     @enderror
 </div>

 <!-- Image (Dosya Seçim) -->
 <div class="mb-3">
     <label for="image" class="form-label">Image</label>
     <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
     @error('image')
         <div class="invalid-feedback">
             {{ $message }}
         </div>
     @enderror
 </div>

 <!-- Category (Kategori Seçim) -->
 <div class="mb-3">
     <label for="category" class="form-label">Category</label>
     <select class="form-select form-control @error('category_id') is-invalid @enderror" id="category"
         name="category_id">
         <option selected>Select a category</option>

         @foreach ($categories as $id => $category)
             <option value="{{ $category->id }}" @if ($category->id == old('category_id', $blog->category_id)) selected @endif>
                 {{ $category->name }}</option>
         @endforeach
     </select>
     <div></div>
     @error('category_id')
         <div class="invalid-feedback">
             {{ $message }}
         </div>
     @enderror
 </div>

 <!-- Submit button -->
 <div class="d-grid gap-2">
     <button type="submit" class="btn btn-primary">{{ $blog->exists ? 'Update' : 'save' }}</button>
 </div>
