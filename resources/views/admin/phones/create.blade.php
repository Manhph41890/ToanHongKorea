@extends('admin.layouts')

@section('title', 'Thêm mới sản phẩm')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm mới sản phẩm</h1>
        <a href="{{ route('admin.phones.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Quay lại danh sách
        </a>
    </div>

    <!-- Thông báo thành cong (nếu có) -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('success') }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Thông báo lỗi (nếu có) -->
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông tin sản phẩm</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.phones.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Thông tin cơ bản sản phẩm -->
                <div class="mb-3">
                    <label for="name" class="form-label">Tên sản phẩm <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="categories_id" class="form-label">Danh mục <span class="text-danger">*</span></label>
                    <select class="form-control" id="categories_id" name="categories_id" required>
                        <option value="">Chọn danh mục</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ old('categories_id') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group mb-3">
                    <label for="slug">Slug (URL)</label>
                    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug"
                        name="slug" value="{{ old('slug') }}">
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="short_description" class="form-label">Mô tả ngắn</label>
                    <textarea class="form-control" id="short_description" name="short_description" rows="3">{{ old('short_description') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="main_image" class="form-label">Ảnh chính sản phẩm</label>
                    <input type="file" class="form-control" id="main_image" name="main_image" accept="image/*">
                    <small class="form-text text-muted">Kích thước tối đa 2MB. Định dạng: JPG, PNG, GIF.</small>
                </div>

                <hr>

                <!-- Quản lý biến thể sản phẩm -->
                <h4 class="mb-3">Biến thể sản phẩm <span class="text-danger">*</span></h4>
                <div id="phone-variants-container">
                    <!-- Một khối biến thể mẫu để thêm động bằng JS -->
                    @include('admin.phones.variant_form_fields', [
                        'index' => 0,
                        'sizes' => $sizes,
                        'colors' => $colors,
                        'variant' => null,
                    ])
                </div>
                <button type="button" class="btn btn-secondary btn-sm mt-3" id="add-variant-btn">
                    <i class="fas fa-plus"></i> Thêm biến thể khác
                </button>

                <hr>

                <!-- Quản lý ảnh phụ sản phẩm -->
                <h4 class="mb-3">Ảnh phụ sản phẩm</h4>
                <div class="mb-3">
                    <label for="other_images" class="form-label">Chọn nhiều ảnh phụ</label>
                    <input type="file" class="form-control" id="other_images" name="other_images[]" multiple
                        accept="image/*">
                    <small class="form-text text-muted">Chọn nhiều ảnh. Kích thước tối đa 2MB mỗi ảnh.</small>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Thêm sản phẩm</button>
            </form>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            let variantIndex =
                {{ old('variants') ? count(old('variants')) : 1 }}; // Bắt đầu index từ 1 nếu chưa có dữ liệu old, hoặc tiếp tục từ số lượng biến thể cũ
            // Xử lý thêm biến thể bằng AJAX
            $('#add-variant-btn').on('click', function() {
                $.ajax({
                    url: '{{ route('admin.phones.getVariantFormFields') }}', // Đảm bảo route này tồn tại và đúng
                    type: 'GET',
                    data: {
                        index: variantIndex
                    },
                    success: function(data) {
                        $('#phone-variants-container').append(data);
                        variantIndex++;
                    },
                    error: function(xhr, status, error) {
                        console.error("Lỗi khi tải form biến thể:", error);
                        alert("Không thể thêm biến thể. Vui lòng thử lại.");
                    }
                });
            });

            // Xử lý xóa biến thể (sử dụng event delegation vì các nút được thêm động)
            $('#phone-variants-container').on('click', '.remove-variant-btn', function() {
                $(this).closest('.variant-item').remove();
                // Không cần cập nhật lại variantIndex ở đây vì nó chỉ dùng để thêm mới.
                // Laravel sẽ tự động xử lý các mảng không liên tục.
            });

            // Nếu có lỗi validation và dữ liệu cũ từ old()
            @if (old('variants'))
                // Xóa biến thể mẫu ban đầu nếu đã có dữ liệu old
                $('#phone-variants-container .variant-item[data-index="0"]')
                    .remove(); // Xóa biến thể mẫu mặc định
                @foreach (old('variants') as $index => $variantData)
                    // Thay vì gọi createVariantHtml, chúng ta render từng biến thể cũ
                    $.ajax({
                        url: '{{ route('admin.phones.getVariantFormFields') }}',
                        type: 'GET',
                        data: {
                            index: {{ $index }}
                        },
                        async: false, // Sử dụng async: false để đảm bảo thứ tự và gán giá trị old
                        success: function(data) {
                            $('#phone-variants-container').append(data);
                            // Gán lại các giá trị old() cho biến thể vừa thêm
                            $(`[name="variants[{{ $index }}][size_id]"]`).val(
                                "{{ $variantData['size_id'] ?? '' }}");
                            $(`[name="variants[{{ $index }}][color_id]"]`).val(
                                "{{ $variantData['color_id'] ?? '' }}");
                            $(`[name="variants[{{ $index }}][sku]"]`).val(
                                "{{ $variantData['sku'] ?? '' }}");
                            $(`[name="variants[{{ $index }}][price]"]`).val(
                                "{{ $variantData['price'] ?? '' }}");
                            $(`[name="variants[{{ $index }}][stock]"]`).val(
                                "{{ $variantData['stock'] ?? '' }}");
                            @if (isset($variantData['is_default']))
                                $(`[name="variants[{{ $index }}][is_default]"]`).prop('checked',
                                    true);
                            @endif
                            // Lưu ý: file input (image_path) không thể set giá trị old() trực tiếp vì lý do bảo mật.
                        },
                        error: function(xhr, status, error) {
                            console.error("Lỗi khi tải lại form biến thể cũ:", error);
                        }
                    });
                @endforeach
                variantIndex = {{ count(old('variants')) }}; // Cập nhật lại variantIndex
            @endif
        });
    </script>
@endpush
