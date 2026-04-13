<!DOCTYPE html>
<html>
<head><meta charset="utf-8"></head>
<body style="margin:0;padding:40px;background:#f4f4f4;font-family:Arial,sans-serif;">
    <div style="max-width:600px;margin:auto;background:white;border-radius:16px;padding:40px;box-shadow:0 10px 30px rgba(0,0,0,0.05);">
        <h2 style="color:#111827;font-size:28px;margin-bottom:10px;">Đặt lại mật khẩu</h2>
        <p style="font-size:17px;color:#374151;line-height:1.6;">
            Xin chào {{ $name }},<br>
            Click link dưới đây để đặt lại mật khẩu:
        </p>
        <a href="{{ $link }}" 
           style="display:inline-block;background:#0066ff;color:white;padding:16px 32px;border-radius:12px;text-decoration:none;font-weight:600;margin:25px 0;font-size:17px;">
            ĐẶT LẠI MẬT KHẨU
        </a>
        <p style="font-size:14px;color:#6b7280;">
            Link này có hiệu lực trong 1 giờ.<br>
            Nếu bạn không yêu cầu, vui lòng bỏ qua email này.
        </p>
        <hr style="margin:30px 0;border:none;border-top:1px solid #eee;">
        <p style="font-size:13px;color:#9ca3af;">{{ get_bloginfo('name') }} – {{ date('Y') }}</p>
    </div>
</body>
</html>