<?php
namespace App\Helpers;

use App\Database\CustomTableManager;

class MemberHelper {
    public static function getMemberIdByUserId(int $user_id): ?int {
        return (int) get_user_meta($user_id, '_member_id', true) ?: null;
    }

    public static function getUserIdByMemberId(int $member_id): ?int {
        return (int) get_post_meta($member_id, '_user_id', true) ?: null;
    }

    public static function currentMemberId(): ?int {
        if (!is_user_logged_in()) return null;
        return self::getMemberIdByUserId(get_current_user_id());
    }

    public static function memberMeta(int $member_id, string $key, $default = '') {
        return CustomTableManager::getMeta($member_id, $key) ?: $default;
    }

    public static function currentMemberMeta(string $key, $default = '') {
        $id = self::currentMemberId();
        return $id ? self::memberMeta($id, $key, $default) : $default;
    }

    // Tương lai: update profile, bulk query...
}