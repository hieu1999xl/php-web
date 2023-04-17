<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'        => ':attribute được chấp nhận.',
    'active_url'      => ':attribute chưa xác nhận URL.',
    'after'           => ':attribute phải là ngày sau :date.',
    'after_or_equal'  => ':attribute phải một ngày sau hoặc bằng :date.',
    'alpha'           => ':attribute chỉ có thể chứa các chữ cái.',
    'alpha_dash'      => ':attribute chỉ có thể chứa các chữ cái, số, dấu gạch ngang và dấu gạch dưới.',
    'alpha_num'       => ':attribute chỉ có thể chứa các chữ cái và số.',
    'array'           => ':attribute phải là một mảng.',
    'before'          => ':attribute phải là một ngày trước :date.',
    'before_or_equal' => ':attribute phải là một ngày trước hoặc bằng :date.',
    'between'         => [
        'numeric' => ':attribute phải nằm giữa :min và :max.',
        'file'    => ':attribute phải nằm giữa :min và :max kilobytes.',
        'string'  => ':attribute phải nằm giữa :min và :max các kí tự.',
        'array'   => ':attribute phải nằm có :min và :max các sản phẩm.',
    ],
    'boolean'        => 'Trường :attribute phải là đúng hoặc sai.',
    'confirmed'      => ':attribute nhận đinh không phù hợp.',
    'date'           => ':attribute là ngày không hợp lệ.',
    'date_equals'    => ':attribute phải là một ngày bằng :date.',
    'date_format'    => ':attribute không phù hợp với định dạng :format.',
    'different'      => ':attribute và :other phải khác nhau.',
    'digits'         => ':attribute phải là :digits chữ số.',
    'digits_between' => ':attribute phải nằm giữa :min và :max chư số.',
    'dimensions'     => ':attribute có kích thước hình ảnh không hợp lệ.',
    'distinct'       => 'Trường :attribute có giá trị trùng lặp.',
    'email'          => ':attribute phải là địa chỉ email hợp lệ.',
    'ends_with'      => ':attribute phải kết thúc bằng một trong những điều sau: :values.',
    'exists'         => 'Lựa chọn :attribute không hợp lệ.',
    'file'           => ':attribute phải là tệp.',
    'filled'         => 'Trường :attribute phải có giá trị.',
    'gt'             => [
        'numeric' => ':attribute phải lớn hơn :value.',
        'file'    => ':attribute phải lớn hơn :value kilobytes.',
        'string'  => ':attribute phải lớn hơn :value kí tự.',
        'array'   => ':attribute phải có nhiều hơn :value sản phẩm.',
    ],
    'gte' => [
        'numeric' => ':attribute phải lớn hơn hoặc bằng :value.',
        'file'    => ':attribute phải lớn hơn hoặc bằng :value kilobytes.',
        'string'  => ':attribute phải lớn hơn hoặc bằng :value kí tự.',
        'array'   => ':attribute phải có :value sản phẩm hoặc nhiều hơn.',
    ],
    'image'    => ':attribute phải là ảnh.',
    'in'       => 'Lựa chọn :attribute hợp lệ.',
    'in_array' => 'Trường :attribute không tồn tại trọng :other.',
    'integer'  => ':attribute phải là số nguyên.',
    'ip'       => ':attribute phải là địa chỉ IP hợp lệ.',
    'ipv4'     => ':attribute phải là địa chỉ IPv4 hợp lệ.',
    'ipv6'     => ':attribute phải là địa chỉ IPv6 hợp lệ.',
    'json'     => ':attribute phải là chuỗi JSON hợp lệ.',
    'lt'       => [
        'numeric' => ':attribute phải nhỏ hơn than :value.',
        'file'    => ':attribute phải nhỏ hơn :value kilobytes.',
        'string'  => ':attribute phải nhỏ hơn :value kí tự.',
        'array'   => ':attribute phải có ít hơn :value sản phẩm.',
    ],
    'lte' => [
        'numeric' => ':attribute phải nhỏ hơn hoặc bằng :value.',
        'file'    => ':attribute phải nhỏ hơn hoặc bằng :value kilobytes.',
        'string'  => ':attribute phải nhỏ hơn hoặc bằng :value kí tự.',
        'array'   => ':attribute không được có nhiều hơn :value sản phẩm.',
    ],
    'max' => [
        'numeric' => ':attribute có thể không lớn hơn :max.',
        'file'    => ':attribute có thể không lớn hơn :max kilobytes.',
        'string'  => ':attribute có thể không lớn hơn :max kí tự.',
        'array'   => ':attribute có thể không nhiều hơn :max sản phẩm.',
    ],
    'mimes'     => ':attribute phải là một loại tệp: :values.',
    'mimetypes' => ':attribute mphải là một loại tệp: :values.',
    'min'       => [
        'numeric' => ':attribute phải ít nhất :min.',
        'file'    => ':attribute phải ít nhất :min kilobytes.',
        'string'  => ':attribute phải ít nhất :min characters.',
        'array'   => ':attribute phải có ít nhất :min sản phẩm.',
    ],
    'not_in'               => 'Lựa chọn :attribute không hợp lệ.',
    'not_regex'            => ':attribute định dạng không hợp lệ.',
    'numeric'              => ':attribute phải là số.',
    'password'             => 'Mật khẩu không đúng.',
    'present'              => ':attribute trường phải tồn tại.',
    'regex'                => ':attribute định dạng không hợp lệ.',
    'required'             => ':attribute là trường bắt buộc.',
    'required_if'          => ':attribute trường bắt buộc khi :other là :value.',
    'required_unless'      => ':attribute trường bắt buộc trừ khi :other trong :values.',
    'required_with'        => ':attribute trường bắt buộc khi :values là có.',
    'required_with_all'    => ':attribute trường bắt buộc khi :values là có.',
    'required_without'     => ':attribute trường bắt buộc khi :values là không có.',
    'required_without_all' => ':attribute trường bắt buộc khi không có :values là present.',
    'same'                 => ':attribute và :other phải phù hợp với nhau.',
    'size'                 => [
        'numeric' => ':attribute phải là :size.',
        'file'    => ':attribute phải là :size kilobytes.',
        'string'  => ':attribute phải là :size characters.',
        'array'   => ':attribute phải chứa :size các sản phẩm.',
    ],
    'starts_with' => ':attribute phải bắt đầu bằng một trong những điều sau: :values.',
    'string'      => ':attribute phải là một chuỗi.',
    'timezone'    => ':attribute phải là một khu vực hợp lệ.',
    'unique'      => ':attribute đã được thực hiện.',
    'uploaded'    => ':attribute tải lên thất bại.',
    'url'         => ':attribute định dạng không hợp lệ.',
    'uuid'        => ':attribute phải là hợp lệ UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'Tùy biến-tin nhắn',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
