@extends('master')
@section('content')
<main>
    <div class="content-user-info">
        <div class="area-avatar">
            <div class="avatar">
                <img src="{{ asset('storage/images/avatar/'.$avatar) }}" alt="">
                <div class="change-avatar">
                    <form action="{{ route('account.update_avatar') }}" method="POST" enctype="multipart/form-data"
                        id="avatar-form">
                        @csrf
                        @method('PUT')
                        <label for="avatar" class="upload-icon">
                            <img src="/images/camera.svg" alt="">
                        </label>
                        <input type="file" name="avatar" id="avatar" class="upload-input">
                    </form>
                </div>
            </div>
            <p class="name-user">{{ $name }}</p>
        </div>
        <div class="form-user-info">
            <div class="input-box">
                <label for="">Tên người dùng</label>
                <input name="" type="text" placeholder="" value="{{ $name }}" disabled required>
            </div>
            <div class="input-box">
                <label for="">Tên đăng nhập</label>
                <input name="" type="text" placeholder="" value="{{ $username }}" disabled required>
            </div>
            <div class="input-box">
                <label for="">Số điện thoại</label>
                <input name="" type="text" placeholder="" value="{{ $numberphone }}" disabled required>
            </div>
            <div class="input-box">
                <label for="">Mật khẩu</label>
                <input name="" type="text" placeholder="" value="Bảo mật (Không thể xem)" disabled required>
            </div>
            <div class="input-box">
                <label for="">Email</label>
                <input name="" type="text" placeholder="" value="{{ $email }}" disabled required>
            </div>
            <div class="input-box">
                <label for="">Vai trò</label>
                <input name="" type="text" placeholder="" value="{{ $role }}" disabled required>
            </div>

        </div>
    </div>
</main>
<script>
// Lắng nghe sự kiện change của input file
document.getElementById("avatar").addEventListener("change", function() {
    // Submit form khi người dùng chọn xong ảnh
    document.getElementById("avatar-form").submit();
});
</script>
@endsection