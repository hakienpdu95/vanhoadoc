<form id="reset-form" class="space-y-6">
    <input type="hidden" name="action" value="reset_password">
    <input type="hidden" name="nonce" value="{{ wp_create_nonce('reset_password_nonce') }}">
    <input type="hidden" name="key" value="{{ request()->get('key') }}">
    <input type="hidden" name="login" value="{{ request()->get('login') }}">

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Mật khẩu mới</label>
        <input type="password" name="new_password" id="new_password" required
               class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500 text-lg"
               placeholder="••••••••">
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Nhập lại mật khẩu mới</label>
        <input type="password" name="confirm_password" id="confirm_password" required
               class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500 text-lg"
               placeholder="••••••••">
    </div>

    <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-4 rounded-2xl transition text-lg">
        Cập nhật mật khẩu mới
    </button>
</form>

<script>
document.getElementById('reset-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);

    if (formData.get('new_password') !== formData.get('confirm_password')) {
        alert('Mật khẩu nhập lại không khớp!');
        return;
    }

    try {
        const res = await fetch('{{ admin_url("admin-ajax.php") }}', {
            method: 'POST',
            body: formData
        });
        const json = await res.json();

        if (json.success) {
            alert(json.data.message);
            setTimeout(() => location.href = '{{ home_url("/dang-nhap") }}', 1500);
        } else {
            alert(json.data.message || 'Có lỗi xảy ra');
        }
    } catch (err) {
        alert('Lỗi kết nối. Vui lòng thử lại.');
    }
});
</script>