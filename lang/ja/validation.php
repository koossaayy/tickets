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

    'accepted' => ':attribute フィールドは承認が必要です。',
    'accepted_if' => ':other が :value の場合、:attribute フィールドは承認が必要です。',
    'active_url' => ':attribute フィールドは有効なURLである必要があります。',
    'after' => ':attribute フィールドは :date より後の日付である必要があります。',
    'after_or_equal' => ':attribute フィールドは :date 以降の日付である必要があります。',
    'alpha' => ':attribute フィールドには英字のみ使用できます。',
    'alpha_dash' => ':attribute フィールドには英字、数字、ダッシュ、アンダースコアのみ使用できます。',
    'alpha_num' => ':attribute フィールドには英字と数字のみ使用できます。',
    'any_of' => ':attribute フィールドは無効です。',
    'array' => ':attribute フィールドは配列である必要があります。',
    'ascii' => ':attribute フィールドには半角英数字と記号のみ使用できます。',
    'before' => ':attribute フィールドは :date より前の日付である必要があります。',
    'before_or_equal' => ':attribute フィールドは :date 以前の日付である必要があります。',
    'between' => [
        'array' => ':attribute フィールドは :min 個から :max 個の項目を含める必要があります。',
        'file' => ':attribute フィールドは :min KB から :max KB の間である必要があります。',
        'numeric' => ':attribute フィールドは :min から :max の間である必要があります。',
        'string' => ':attribute フィールドは :min 文字から :max 文字の間である必要があります。',
    ],
    'boolean' => ':attribute フィールドは true または false である必要があります。',
    'can' => ':attribute フィールドに許可されていない値が含まれています。',
    'confirmed' => ':attribute フィールドの確認が一致しません。',
    'contains' => ':attribute フィールドに必須の値がありません。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => ':attribute フィールドは有効な日付である必要があります。',
    'date_equals' => ':attribute フィールドは :date と同じ日付である必要があります。',
    'date_format' => ':attribute フィールドは :format の形式と一致する必要があります。',
    'decimal' => ':attribute フィールドは小数点以下 :decimal 桁である必要があります。',
    'declined' => ':attribute フィールドは拒否されている必要があります。',
    'declined_if' => ':other が :value の場合、:attribute フィールドは拒否されている必要があります。',
    'different' => ':attribute フィールドと :other フィールドは異なる必要があります。',
    'digits' => ':attribute フィールドは :digits 桁である必要があります。',
    'digits_between' => ':attribute フィールドは :min 桁から :max 桁の間である必要があります。',
    'dimensions' => ':attribute フィールドの画像サイズが無効です。',
    'distinct' => ':attribute フィールドに重複した値があります。',
    'doesnt_contain' => ':attribute フィールドには次のいずれも含めてはいけません: :values。',
    'doesnt_end_with' => ':attribute フィールドの末尾は次のいずれでもあってはいけません: :values。',
    'doesnt_start_with' => ':attribute フィールドの先頭は次のいずれでもあってはいけません: :values。',
    'email' => ':attribute フィールドは有効なメールアドレスである必要があります。',
    'encoding' => ':attribute フィールドは :encoding でエンコードされている必要があります。',
    'ends_with' => ':attribute フィールドの末尾は次のいずれかである必要があります: :values。',
    'enum' => '選択された :attribute は無効です。',
    'exists' => '選択された :attribute は無効です。',
    'extensions' => ':attribute フィールドの拡張子は次のいずれかである必要があります: :values。',
    'file' => ':attribute フィールドはファイルである必要があります。',
    'filled' => ':attribute フィールドには値が必要です。',
    'gt' => [
        'array' => ':attribute フィールドの項目数は :value より多い必要があります。',
        'file' => ':attribute フィールドは :value キロバイトより大きい必要があります。',
        'numeric' => ':attribute フィールドは :value より大きい必要があります。',
        'string' => ':attribute フィールドは :value 文字より多い必要があります。',
    ],
    'gte' => [
        'array' => ':attribute フィールドの項目数は :value 以上である必要があります。',
        'file' => ':attribute フィールドは :value キロバイト以上である必要があります。',
        'numeric' => ':attribute フィールドは :value 以上である必要があります。',
        'string' => ':attribute フィールドは :value 文字以上である必要があります。',
    ],
    'hex_color' => ':attribute フィールドは有効な16進カラーである必要があります。',
    'image' => ':attribute フィールドは画像である必要があります。',
    'in' => '選択された :attribute は無効です。',
    'in_array' => ':attribute フィールドは :other に存在する必要があります。',
    'in_array_keys' => ':attribute フィールドには次のキーのうち少なくとも1つが含まれている必要があります: :values。',
    'integer' => ':attribute フィールドは整数である必要があります。',
    'ip' => ':attribute フィールドは有効なIPアドレスである必要があります。',
    'ipv4' => ':attribute フィールドは有効なIPv4アドレスである必要があります。',
    'ipv6' => ':attribute フィールドは有効なIPv6アドレスである必要があります。',
    'json' => ':attribute フィールドは有効なJSON文字列である必要があります。',
    'list' => ':attribute フィールドはリストである必要があります。',
    'lowercase' => ':attribute フィールドは小文字である必要があります。',
    'lt' => [
        'array' => ':attribute フィールドの項目数は :value 未満である必要があります。',
        'file' => ':attribute フィールドは :value キロバイト未満である必要があります。',
        'numeric' => ':attribute フィールドは :value 未満である必要があります。',
        'string' => ':attribute フィールドは :value 文字未満である必要があります。',
    ],
    'lte' => [
        'array' => ':attribute フィールドの項目数は :value を超えてはいけません。',
        'file' => ':attribute フィールドは :value キロバイト以下である必要があります。',
        'numeric' => ':attribute フィールドは :value 以下である必要があります。',
        'string' => ':attribute フィールドは :value 文字以下である必要があります。',
    ],
    'mac_address' => ':attribute フィールドは有効なMACアドレスである必要があります。',
    'max' => [
        'array' => ':attribute フィールドの項目数は :max を超えてはいけません。',
        'file' => ':attribute フィールドは :max キロバイトを超えてはいけません。',
        'numeric' => ':attribute フィールドは :max を超えてはいけません。',
        'string' => ':attribute フィールドは :max 文字を超えてはいけません。',
    ],
    'max_digits' => ':attribute フィールドの桁数は :max を超えてはいけません。',
    'mimes' => ':attribute フィールドは次のタイプのファイルである必要があります: :values。',
    'mimetypes' => ':attribute フィールドは次のタイプのファイルである必要があります: :values。',
    'min' => [
        'array' => ':attribute フィールドの項目数は少なくとも :min である必要があります。',
        'file' => ':attribute フィールドは少なくとも :min キロバイトである必要があります。',
        'numeric' => ':attribute フィールドは少なくとも :min である必要があります。',
        'string' => ':attribute フィールドは少なくとも :min 文字である必要があります。',
    ],
    'min_digits' => ':attribute フィールドの桁数は少なくとも :min である必要があります。',
    'missing' => ':attribute フィールドは存在してはいけません。',
    'missing_if' => ':attribute フィールドは :other が :value の場合、存在してはいけません。',
    'missing_unless' => ':attribute フィールドは :other が :value でない限り、存在してはいけません。',
    'missing_with' => ':attribute フィールドは :values が存在する場合、存在してはいけません。',
    'missing_with_all' => ':attribute フィールドは :values が存在する場合、存在してはいけません。',
    'multiple_of' => ':attribute フィールドは :value の倍数である必要があります。',
    'not_in' => '選択された :attribute は無効です。',
    'not_regex' => ':attribute フィールドの形式が無効です。',
    'numeric' => ':attribute フィールドは数値である必要があります。',
    'password' => [
        'letters' => ':attribute フィールドには少なくとも1つの英字を含める必要があります。',
        'mixed' => ':attribute フィールドには少なくとも1つの大文字と1つの小文字を含める必要があります。',
        'numbers' => ':attribute フィールドには少なくとも1つの数字を含める必要があります。',
        'symbols' => ':attribute フィールドには少なくとも1つの記号を含める必要があります。',
        'uncompromised' => '指定された :attribute はデータ漏洩で確認されています。別の :attribute を選択してください。',
    ],
    'present' => ':attribute フィールドは存在している必要があります。',
    'present_if' => ':other が :value の場合、:attribute フィールドは存在している必要があります。',
    'present_unless' => ':other が :value でない限り、:attribute フィールドは存在している必要があります。',
    'present_with' => ':values が存在する場合、:attribute フィールドは存在している必要があります。',
    'present_with_all' => ':values が存在する場合、:attribute フィールドは存在している必要があります。',
    'prohibited' => ':attribute フィールドは禁止されています。',
    'prohibited_if' => ':other が :value の場合、:attribute フィールドは禁止されています。',
    'prohibited_if_accepted' => ':other が承認されている場合、:attribute フィールドは禁止されています。',
    'prohibited_if_declined' => ':other が拒否されている場合、:attribute フィールドは禁止されています。',
    'prohibited_unless' => ':other が :values に含まれていない限り、:attribute フィールドは禁止されています。',
    'prohibits' => ':attribute フィールドが存在する場合、:other フィールドは存在してはいけません。',
    'regex' => ':attribute フィールドの形式が無効です。',
    'required' => ':attribute フィールドは必須です。',
    'required_array_keys' => ':attribute フィールドには次の項目を含める必要があります: :values。',
    'required_if' => ':other が :value の場合、:attribute フィールドは必須です。',
    'required_if_accepted' => ':other が承認されている場合、:attribute フィールドは必須です。',
    'required_if_declined' => ':other が拒否されている場合、:attribute フィールドは必須です。',
    'required_unless' => ':other が :values に含まれていない限り、:attribute フィールドは必須です。',
    'required_with' => ':values が存在する場合、:attribute フィールドは必須です。',
    'required_with_all' => ':values が存在する場合、:attribute フィールドは必須です。',
    'required_without' => ':values が存在しない場合、:attribute フィールドは必須です。',
    'required_without_all' => ':values のいずれも存在しない場合、:attribute フィールドは必須です。',
    'same' => ':attribute フィールドは :other と一致する必要があります。',
    'size' => [
        'array' => ':attribute フィールドには :size 個の項目を含める必要があります。',
        'file' => ':attribute フィールドは :size キロバイトである必要があります。',
        'numeric' => ':attribute フィールドは :size である必要があります。',
        'string' => ':attribute フィールドは :size 文字である必要があります。',
    ],
    'starts_with' => ':attribute フィールドは次のいずれかで始まる必要があります: :values。',
    'string' => ':attribute フィールドは文字列である必要があります。',
    'timezone' => ':attribute フィールドは有効なタイムゾーンである必要があります。',
    'unique' => ':attribute はすでに使用されています。',
    'uploaded' => ':attribute のアップロードに失敗しました。',
    'uppercase' => ':attribute フィールドは大文字である必要があります。',
    'url' => ':attribute フィールドは有効なURLである必要があります。',
    'ulid' => ':attribute フィールドは有効なULIDである必要があります。',
    'uuid' => ':attribute フィールドは有効なUUIDである必要があります。',

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
            'rule-name' => '',
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
