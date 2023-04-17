<?php

return [
    'text' => [
        'first_name'            => 'Tên Đầu',
        'last_name'             => 'Tên Cuối',
        'name'                  => 'Tên',
        'username'              => 'Tên Người Dùng',
        'email'                 => 'Email',
        'mobile'                => 'Di Động',
        'password'              => 'Mật Khẩu (Tối Thiểu 6 Kí Tự)',
        'password_confirmation' => 'Mật Khẩu (Kiểu Nhắc Lại)',
        'gender'                => 'Giới Tính',
        'register'              => 'Đăng Kí Bây Giờ',
        'login'                 => 'Đăng Nhập',
        'login_to_account'      => 'Đăng Nhập Với Tài Khoản',
        'need_help'             => 'Cần Hỗ Trợ?',
        'select_an_option'      => 'Xin Hãy Lựa Chọn',
        'profile'               => 'Hồ Sơ',
        'logout'                => 'Đăng Xuất',
        'male'                  => 'Nam',
        'female'                => 'Nữ',
        'hijra'                 => 'Hijra',
        'other'                 => 'Khác',
        'Male'                  => 'Nam',
        'Female'                => 'Nữ',
        'Hijra'                 => 'Hijra',
        'Other'                 => 'Khác',
        'edit_profile'          => 'Chỉnh Sửa Hồ Sơ',
        'category_name'         => 'Danh Mục',
    ],
    // __("labels.text.edit_profile")

    'backend'   => [
        'users' => [
            'index' => [
                'action'    => 'Danh Sách',
                'title'     => 'Người Dùng',
                'sub-title' => 'Quản Lý Người Dùng',
            ],
            'profile' => [
                'action'    => 'Hiển Thị',
                'title'     => 'Hồ Sơ Người Dùng',
                'sub-title' => 'Quản Lý Người Dùng',
                'profile'   => 'Hồ Sơ',
            ],
            'show' => [
                'action'    => 'Hiển Thị',
                'title'     => 'Người Dùng',
                'sub-title' => 'Quản Lý Người Dùng',
                'profile'   => 'Hồ Sơ',
            ],
            'edit' => [
                'action'    => 'Chỉnh Sửa',
                'title'     => 'Người Dùng',
                'sub-title' => 'Quản Lý Người Dùng',
            ],
            'create' => [
                'action'    => 'Tạo',
                'title'     => 'Người Dùng',
                'sub-title' => 'Quản Lý Người Dùng',
            ],
            'fields'    => [
                'id'                    => 'Id',
                'user_id'               => 'Id Người dùng',
                'name'                  => 'Tên',
                'first_name'            => 'Tên đầu',
                'last_name'             => 'Tên cuối',
                'email'                 => 'Email',
                'username'              => 'Tên tài khoản',
                'mobile'                => 'Di động',
                'gender'                => 'Giới tính',
                'date_of_birth'         => 'Ngày sinh nhật',
                'url_website'           => 'Website',
                'url_instagram'         => 'Instagram',
                'url_facebook'          => 'Facebook',
                'url_twitter'           => 'Twitter',
                'url_googleplus'        => 'Google Plus',
                'url_linkedin'          => 'LinkedIn',
                'profile_privecy'       => 'Hồ sơ mật',
                'address'               => 'Địa chỉ',
                'bio'                   => 'Bio',
                'login_count'           => 'Số lượt đăng nhập',
                'last_ip'               => 'IP cuối',
                'last_login'            => 'Lần đăng nhập cuối',
                'password'              => 'Mật khẩu',
                'password_confirmation' => 'Xác nhận mật khẩu',
                'confirmed'             => 'Đã xác nhận',
                'active'                => 'Hoạt động',
                'roles'                 => 'Vai trò',
                'permissions'           => 'Quyền hạn',
                'social'                => 'Xã hội',
                'picture'               => 'Hình ảnh',
                'avatar'                => 'Hình đại diện',
                'status'                => 'Trạng thái',
                'created_at'            => 'Đã tạo tại',
                'updated_at'            => 'Đã cập nhật tại',
                'deleted_at'            => 'Đã xóa tại',
                'email_verified_at'     => 'Email được xác minh tại',
                'user_metadata'         => 'Người dùng Metadata',
                'deleted_by'            => 'Đã xóa bởi',
                'created_by'            => 'Đã tạo bởi',
                'updated_by'            => 'Đã cập nhật bởi'
            ],

        ],
        'roles' => [
            'index' => [
                'action'    => 'Danh Sách',
                'title'     => 'Vai Trò',
                'sub-title' => 'Quản Lý Vai Trò',
            ],
            'show' => [
                'action'    => 'Hiển Thị',
                'title'     => 'Vai Trò',
                'sub-title' => 'Quản Lý Vai Trò',
                'profile'   => 'Hồ Sơ',
            ],
            'edit' => [
                'action'    => 'Chỉnh Sửa',
                'title'     => 'Vai Trò',
                'sub-title' => 'Quản lý vai trò',
            ],
            'create' => [
                'action'    => 'Tạo',
                'title'     => 'Vai Trò',
                'sub-title' => 'Quản Lý Vai Trò',
            ],
            'fields'    => [
                'name'        => 'Tên',
                'status'      => 'Trạng thái',
                'permissions' => 'Quyền hạn',
                'created_at'  => 'Đã tạo tại',
                'updated_at'  => 'Đã cập nhật tại',
            ],

        ],
        'jobs' => [
            'index' => [
                'name'            => 'Tên Công việc',
                'title'           => 'Tiêu Đề',
                'salary'          => 'Mức Lương',
                'status'          => 'Trạng Thái',
                'action'          => 'Hành động',
            ],
            'status' => [
                'published'       => 'Đã phát hành',
                'unpublished'     => 'Chưa phát hành', 
            ],
            'create' => [
                'name'            => 'Tên Công Việc ',
                'intro'           => 'Giới Thiệu',
                'status'          => 'Trạng Thái',
                'description'     => 'Mô Tả',
                'requirement'     => 'Yêu Cầu',
                'benefits'        => 'Quyền Lợi',
                'title'           => 'Tiêu Đề',
                'salary'          => 'Mức Lương',
                'time_left'       => 'Thời Gian Hết Hạn',
                'time'            => 'Thời Gian',
                'location'        => 'Địa Chỉ',
                'position_quantity' => 'Số Lượng',
            ],
        ],
        'action'            => 'Tác Vụ',
        'create'            => 'Tạo',
        'edit'              => 'Chỉnh Sửa',
        'changePassword'    => 'Thay Đổi Mật Khẩu',
        'delete'            => 'Xóa',
        'restore'           => 'Khôi Phục',
        'save'              => 'Lưu',
        'show'              => 'Hiển Thị',
        'update'            => 'Cập Nhật',
        'total'             => 'Tổng Cộng',
        'block'             => 'Khóa',
        'unblock'           => 'Mở Khóa',
        'cancel'            => 'Thoát',
    ],

    'buttons'   => [
        'general'   => [
            'create'    => 'Tạo',
            'save'      => 'Lưu',
            'cancel'    => 'Thoát',
            'update'    => 'Cập Nhật',
        ],
    ],

];
