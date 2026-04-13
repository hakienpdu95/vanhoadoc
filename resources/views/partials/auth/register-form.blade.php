<form id="register-form" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="action" value="register_member">
    <input type="hidden" name="nonce" value="{{ wp_create_nonce('member_register_nonce') }}">

    <input type="text" name="full_name" placeholder="Họ và tên" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="tel" name="phone" placeholder="Số điện thoại" required>
    <input type="text" name="cccd" placeholder="Số CCCD" required>
    <input type="text" name="cccd_name" placeholder="Tên trên CCCD" required>
    <textarea name="address" placeholder="Địa chỉ chi tiết"></textarea>

    <input type="password" name="password" placeholder="Mật khẩu" required>
    <input type="password" name="password_confirm" placeholder="Nhập lại mật khẩu" required>

    <input type="file" name="avatar" accept="image/*">
    {!! \App\Helpers\SecurityHelper::renderWidget() !!}
    <button type="submit">Đăng ký</button>
</form>

<script>
document.getElementById('register-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    try {
        const res = await fetch('{{ admin_url("admin-ajax.php") }}', { method: 'POST', body: formData });
        const json = await res.json();
        alert(json.success ? json.data.message : (json.data.message || 'Lỗi hệ thống'));
        if (json.success && json.data.redirect) location.href = json.data.redirect;
    } catch (err) {
        alert('Lỗi kết nối. Vui lòng thử lại.');
    }
});
</script>