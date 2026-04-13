<?php
namespace App\Metaboxes;

class ProductOcopMetabox extends BaseMetabox
{
    protected string $title = 'Thông tin Sản phẩm OCOP';
    protected array $post_types = ['viet-product'];

    protected function getFields(): array
    {
        return [

            // ==================== 2. THÔNG TIN OCOP & PHÂN HẠNG ====================
            [
                'type' => 'heading',
                'name' => 'Thông tin OCOP & Phân hạng',
            ],
            [
                'name'    => 'Hạng sao hiện tại',
                'id'      => 'ocop_star',
                'type'    => 'select',
                'options' => [
                    '3'  => '3 Sao',
                    '4'  => '4 Sao',
                    '5'  => '5 Sao',
                ],
            ],

            // ==================== 3. CHỦ THỂ & ƯU TIÊN ====================
            [
                'type' => 'heading',
                'name' => 'Chủ thể (HTX, DN, hộ cá thể)',
            ],
            [
                'name'    => 'Loại chủ thể',
                'id'      => 'owner_type',
                'type'    => 'select',
                'options' => [
                    'htx' => 'Hợp tác xã',
                    'dn'  => 'Doanh nghiệp nhỏ & vừa',
                    'ca_nhan'   => 'Cá nhân',
                    'to_hop'    => 'Tổ hợp tác',

                ],
            ],
            [
                'name' => 'Tên chủ thể',
                'id'   => 'owner_name',
                'type' => 'text',
            ],
            [
                'name'    => 'Chủ thể ưu tiên',
                'id'      => 'priority_owner',
                'type'    => 'checkbox_list',
                'options' => [
                    'phu_nu'        => 'Phụ nữ làm chủ',
                    'dan_toc'       => 'Đồng bào dân tộc thiểu số',
                    'khuyet_tat'    => 'Người khuyết tật',
                    'thanh_nien'    => 'Thanh niên khởi nghiệp',
                ],
            ],

            // ==================== 5. CHUYỂN ĐỔI SỐ & TRUY XUẤT ====================
            [
                'type' => 'heading',
                'name' => 'Chuyển đổi số & Truy xuất nguồn gốc',
            ],
            [
                'name' => 'Link truy xuất nguồn gốc (QR Code)',
                'id'   => 'traceability_url',
                'type' => 'url',
            ],
        ];
    }
}