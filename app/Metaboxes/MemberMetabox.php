<?php
namespace App\Metaboxes;

class MemberMetabox extends BaseMetabox {
    protected string $title = 'Thông tin thành viên';
    protected array $post_types = ['member'];
    protected string $context = 'normal';
    protected string $priority = 'high';

    protected function getFields(): array {
        return [
            // ==================== THÔNG TIN CÁ NHÂN ====================
            [
                'type' => 'heading',
                'name' => 'Thông tin cá nhân',
            ],
            [
                'name' => 'Số điện thoại',
                'id'   => 'phone',
                'type' => 'text',
                'placeholder' => '0123456789',
            ],

            // ==================== GIẤY TỜ ====================
            [
                'type' => 'heading',
                'name' => 'Thông tin giấy tờ',
            ],
            [
                'name' => 'Số CCCD / CMND',
                'id'   => 'cccd',
                'type' => 'text',
            ],
            [
                'name' => 'Tên trên CCCD',
                'id'   => 'cccd_name',
                'type' => 'text',
            ],

            // ==================== ĐỊA CHỈ ====================
            [
                'type' => 'heading',
                'name' => 'Địa chỉ',
            ],
            [
                'name' => 'Địa chỉ chi tiết',
                'id'   => 'address',
                'type' => 'textarea',
                'rows' => 3,
            ],

            // ==================== HỆ THỐNG (ẩn/hiển thị) ====================
            [
                'type' => 'heading',
                'name' => 'Thông tin hệ thống',
            ],
            [
                'name'     => 'User ID (WP)',
                'id'       => '_user_id',
                'type'     => 'number',
                'readonly' => true,
                'std'      => fn($post) => get_post_meta($post->ID, '_user_id', true),
            ],
            [
                'name'     => 'Trạng thái kích hoạt',
                'id'       => 'is_activated',
                'type'     => 'checkbox',
                'std'      => 0,
                'readonly' => true,
                'desc'     => 'Chỉ hiển thị (không chỉnh tay)',
            ],
        ];
    }
}