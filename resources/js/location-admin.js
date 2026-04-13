jQuery(function($) {
    'use strict';

    function loadWards(provinceCode) {
        const $ward = $('select[name="ward_code"]');
        if (!provinceCode) {
            $ward.html('<option value="">Chọn phường/xã</option>');
            return;
        }

        $ward.html('<option value="">Đang tải...</option>');

        $.post(locationAjax.ajaxurl, {
            action: 'get_wards',
            province_code: provinceCode,
            nonce: locationAjax.nonce
        }, function(res) {
            if (res.success) {
                let html = '<option value="">Chọn phường/xã</option>';
                const savedWard = locationSaved.ward_code || '';

                res.data.forEach(w => {
                    const selected = (w.ward_code === savedWard) ? ' selected' : '';
                    html += `<option value="${w.ward_code}"${selected}>${w.name}</option>`;
                });

                $ward.html(html);
                if (savedWard) $ward.val(savedWard);

                console.log('[Location] ĐÃ LOAD & SET SELECTED ward_code =', savedWard || '(rỗng)');
            }
        });
    }

    function init() {
        const province = $('select[name="province_code"]').val();
        if (province) loadWards(province);
    }

    // Chạy khi RWMB render xong
    $(document).on('rwmb_ready', init);
    setTimeout(init, 800);

    // Khi đổi tỉnh
    $('select[name="province_code"]').on('change', function() {
        loadWards($(this).val());
    });
});