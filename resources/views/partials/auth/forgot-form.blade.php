<form id="forgot-form" class="space-y-6">
    <input type="hidden" name="action" value="forgot_password">
    <input type="hidden" name="nonce" value="{{ wp_create_nonce('forgot_nonce') }}">

    <div>
        <label class="block text-sm font-medium text-gray-700 mb-2">Email đăng ký</label>
        <input type="email" name="email" required
               class="w-full px-5 py-4 border border-gray-300 rounded-2xl focus:outline-none focus:border-blue-500 text-lg"
               placeholder="your@email.com">
    </div>

    <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-4 rounded-2xl transition text-lg">
        Gửi link đặt lại mật khẩu
    </button>
</form>

<script>
document.getElementById('forgot-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);

    try {
        const response = await fetch('{{ admin_url("admin-ajax.php") }}', {
            method: 'POST',
            body: formData
        });

        console.log('📡 Status:', response.status); // Debug

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        const json = await response.json();
        console.log('📦 Response:', json); // Debug

        if (json.success) {
            alert(json.data.message);
            setTimeout(() => location.href = '{{ home_url("/dang-nhap") }}', 1500);
        } else {
            alert(json.data.message || 'Có lỗi xảy ra');
        }
    } catch (err) {
        console.error('❌ Fetch Error:', err);
        alert('Lỗi kết nối: ' + err.message + '\n\nVui lòng mở F12 → Console để xem chi tiết lỗi');
    }
});
</script>