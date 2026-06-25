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

    'accepted' => 'Ang :attribute na field ay dapat tanggapin.',
    'accepted_if' => 'Ang :attribute na field ay dapat tanggapin kapag ang :other ay :value.',
    'active_url' => 'Ang :attribute na field ay dapat isang wastong URL.',
    'after' => 'Ang :attribute na field ay dapat isang petsa pagkatapos ng :date.',
    'after_or_equal' => 'Ang :attribute na field ay dapat isang petsa pagkatapos o katumbas ng :date.',
    'alpha' => 'Ang :attribute na field ay dapat maglaman lamang ng mga titik.',
    'alpha_dash' => 'Ang :attribute na field ay dapat maglaman lamang ng mga titik, numero, gitling, at underscore.',
    'alpha_num' => 'Ang :attribute na field ay dapat maglaman lamang ng mga titik at numero.',
    'any_of' => 'Hindi wasto ang :attribute na field.',
    'array' => 'Ang :attribute na field ay dapat isang array.',
    'ascii' => 'Ang :attribute na field ay dapat maglaman lamang ng single-byte na alphanumeric na mga character at mga simbolo.',
    'before' => 'Ang :attribute na field ay dapat isang petsa bago ang :date.',
    'before_or_equal' => 'Ang :attribute na field ay dapat isang petsa bago o katumbas ng :date.',
    'between' => [
        'array' => 'Ang :attribute na field ay dapat may pagitan ng :min at :max na mga item.',
        'file' => 'Ang :attribute na field ay dapat nasa pagitan ng :min at :max kilobytes.',
        'numeric' => 'Ang :attribute na field ay dapat nasa pagitan ng :min at :max.',
        'string' => 'Ang :attribute na field ay dapat nasa pagitan ng :min at :max na mga character.',
    ],
    'boolean' => 'Ang :attribute na field ay dapat true o false.',
    'can' => 'Ang :attribute na field ay naglalaman ng hindi awtorisadong halaga.',
    'confirmed' => 'Hindi tumutugma ang kumpirmasyon ng :attribute na field.',
    'contains' => 'Nawawala sa :attribute na field ang isang kinakailangang halaga.',
    'current_password' => 'Mali ang password.',
    'date' => 'Ang :attribute na field ay dapat isang wastong petsa.',
    'date_equals' => 'Ang :attribute na field ay dapat isang petsang katumbas ng :date.',
    'date_format' => 'Ang :attribute na field ay dapat tumugma sa format na :format.',
    'decimal' => 'Ang :attribute na field ay dapat may :decimal decimal places.',
    'declined' => 'Ang :attribute na field ay dapat tanggihan.',
    'declined_if' => 'Ang :attribute na field ay dapat tanggihan kapag ang :other ay :value.',
    'different' => 'Ang :attribute na field at :other ay dapat magkaiba.',
    'digits' => 'Ang :attribute na field ay dapat may :digits na digit.',
    'digits_between' => 'Ang :attribute na field ay dapat may pagitan ng :min at :max na digit.',
    'dimensions' => 'Ang :attribute na field ay may hindi wastong sukat ng larawan.',
    'distinct' => 'Ang :attribute na field ay may dobleng halaga.',
    'doesnt_contain' => 'Ang :attribute na field ay hindi dapat maglaman ng alinman sa mga sumusunod: :values.',
    'doesnt_end_with' => 'Ang :attribute na field ay hindi dapat magtapos sa alinman sa mga sumusunod: :values.',
    'doesnt_start_with' => 'Ang :attribute na field ay hindi dapat magsimula sa alinman sa mga sumusunod: :values.',
    'email' => 'Ang :attribute na field ay dapat isang wastong email address.',
    'encoding' => 'Ang :attribute na field ay dapat naka-encode sa :encoding.',
    'ends_with' => 'Ang :attribute na field ay dapat magtapos sa alinman sa mga sumusunod: :values.',
    'enum' => 'Hindi wasto ang napiling :attribute.',
    'exists' => 'Hindi wasto ang napiling :attribute.',
    'extensions' => 'Ang :attribute na field ay dapat may isa sa mga sumusunod na extension: :values.',
    'file' => 'Ang :attribute na field ay dapat isang file.',
    'filled' => 'Ang :attribute na field ay dapat may halaga.',
    'gt' => [
        'array' => 'Ang :attribute na field ay dapat may higit sa :value na item.',
        'file' => 'Ang :attribute na field ay dapat mas malaki sa :value kilobytes.',
        'numeric' => 'Ang :attribute na field ay dapat mas malaki sa :value.',
        'string' => 'Ang :attribute na field ay dapat mas mahaba sa :value na character.',
    ],
    'gte' => [
        'array' => 'Ang :attribute na field ay dapat may :value na item o higit pa.',
        'file' => 'Ang :attribute na field ay dapat mas malaki kaysa o katumbas ng :value kilobytes.',
        'numeric' => 'Ang :attribute na field ay dapat mas malaki kaysa o katumbas ng :value.',
        'string' => 'Ang :attribute na field ay dapat mas mahaba kaysa o katumbas ng :value na character.',
    ],
    'hex_color' => 'Ang :attribute na field ay dapat isang wastong hexadecimal na kulay.',
    'image' => 'Ang :attribute na field ay dapat isang larawan.',
    'in' => 'Hindi wasto ang napiling :attribute.',
    'in_array' => 'Ang :attribute na field ay dapat umiiral sa :other.',
    'in_array_keys' => 'Ang :attribute na field ay dapat maglaman ng kahit isa sa mga sumusunod na key: :values.',
    'integer' => 'Ang :attribute na field ay dapat isang integer.',
    'ip' => 'Ang :attribute na field ay dapat isang wastong IP address.',
    'ipv4' => 'Ang :attribute na field ay dapat isang wastong IPv4 address.',
    'ipv6' => 'Ang :attribute na field ay dapat isang wastong IPv6 address.',
    'json' => 'Ang :attribute na field ay dapat isang wastong JSON string.',
    'list' => 'Ang :attribute na field ay dapat isang list.',
    'lowercase' => 'Ang :attribute na field ay dapat lowercase.',
    'lt' => [
        'array' => 'Ang :attribute na field ay dapat may mas kaunti sa :value na item.',
        'file' => 'Ang :attribute na field ay dapat mas mababa sa :value kilobytes.',
        'numeric' => 'Ang :attribute na field ay dapat mas mababa sa :value.',
        'string' => 'Ang :attribute na field ay dapat mas maikli sa :value na character.',
    ],
    'lte' => [
        'array' => 'Ang :attribute na field ay hindi dapat may higit sa :value na item.',
        'file' => 'Ang :attribute na field ay dapat mas mababa kaysa o katumbas ng :value kilobytes.',
        'numeric' => 'Ang :attribute na field ay dapat mas mababa kaysa o katumbas ng :value.',
        'string' => 'Ang :attribute na field ay dapat mas maikli kaysa o katumbas ng :value na character.',
    ],
    'mac_address' => 'Ang :attribute na field ay dapat isang wastong MAC address.',
    'max' => [
        'array' => 'Ang :attribute na field ay hindi dapat may higit sa :max na item.',
        'file' => 'Ang :attribute na field ay hindi dapat mas malaki sa :max kilobytes.',
        'numeric' => 'Ang :attribute na field ay hindi dapat mas malaki sa :max.',
        'string' => 'Ang :attribute na field ay hindi dapat mas mahaba sa :max na character.',
    ],
    'max_digits' => 'Ang :attribute na field ay hindi dapat may higit sa :max na digit.',
    'mimes' => 'Ang :attribute na field ay dapat isang file na may uri: :values.',
    'mimetypes' => 'Ang :attribute na field ay dapat isang file na may uri: :values.',
    'min' => [
        'array' => 'Ang :attribute na field ay dapat may hindi bababa sa :min na item.',
        'file' => 'Ang :attribute na field ay dapat hindi bababa sa :min kilobytes.',
        'numeric' => 'Ang :attribute na field ay dapat hindi bababa sa :min.',
        'string' => 'Ang :attribute na field ay dapat may hindi bababa sa :min na character.',
    ],
    'min_digits' => 'Ang :attribute na field ay dapat may hindi bababa sa :min na digit.',
    'missing' => 'Ang :attribute na field ay dapat nawawala.',
    'missing_if' => 'Ang :attribute na field ay dapat nawawala kapag ang :other ay :value.',
    'missing_unless' => 'Ang :attribute na field ay dapat nawawala maliban kung ang :other ay :value.',
    'missing_with' => 'Ang :attribute na field ay dapat nawawala kapag ang :values ay naroroon.',
    'missing_with_all' => 'Ang :attribute na field ay dapat nawawala kapag ang mga :values ay naroroon.',
    'multiple_of' => 'Ang :attribute na field ay dapat isang multiple ng :value.',
    'not_in' => 'Hindi wasto ang napiling :attribute.',
    'not_regex' => 'Hindi wasto ang format ng :attribute na field.',
    'numeric' => 'Ang :attribute na field ay dapat isang numero.',
    'password' => [
        'letters' => 'Ang :attribute na field ay dapat maglaman ng kahit isang titik.',
        'mixed' => 'Ang :attribute na field ay dapat maglaman ng kahit isang uppercase at isang lowercase na titik.',
        'numbers' => 'Ang :attribute na field ay dapat maglaman ng kahit isang numero.',
        'symbols' => 'Ang :attribute na field ay dapat maglaman ng kahit isang simbolo.',
        'uncompromised' => 'Ang ibinigay na :attribute ay lumitaw sa isang data leak. Mangyaring pumili ng ibang :attribute.',
    ],
    'present' => 'Ang :attribute na field ay dapat naroroon.',
    'present_if' => 'Ang :attribute na field ay dapat naroroon kapag ang :other ay :value.',
    'present_unless' => 'Ang :attribute na field ay dapat naroroon maliban kung ang :other ay :value.',
    'present_with' => 'Ang :attribute na field ay dapat naroroon kapag ang :values ay naroroon.',
    'present_with_all' => 'Ang :attribute na field ay dapat naroroon kapag ang mga :values ay naroroon.',
    'prohibited' => 'Ang :attribute na field ay ipinagbabawal.',
    'prohibited_if' => 'Ang :attribute na field ay ipinagbabawal kapag ang :other ay :value.',
    'prohibited_if_accepted' => 'Ang :attribute na field ay ipinagbabawal kapag ang :other ay tinanggap.',
    'prohibited_if_declined' => 'Ang :attribute na field ay ipinagbabawal kapag ang :other ay tinanggihan.',
    'prohibited_unless' => 'Ang :attribute na field ay ipinagbabawal maliban kung ang :other ay nasa :values.',
    'prohibits' => 'Ipinagbabawal ng :attribute na field na maging naroroon ang :other.',
    'regex' => 'Hindi wasto ang format ng :attribute na field.',
    'required' => 'Ang :attribute na field ay kinakailangan.',
    'required_array_keys' => 'Ang :attribute na field ay dapat maglaman ng mga entry para sa: :values.',
    'required_if' => 'Ang :attribute na field ay kinakailangan kapag ang :other ay :value.',
    'required_if_accepted' => 'Ang :attribute na field ay kinakailangan kapag ang :other ay tinanggap.',
    'required_if_declined' => 'Ang :attribute na field ay kinakailangan kapag ang :other ay tinanggihan.',
    'required_unless' => 'Ang :attribute na field ay kinakailangan maliban kung ang :other ay nasa :values.',
    'required_with' => 'Ang :attribute na field ay kinakailangan kapag ang :values ay naroroon.',
    'required_with_all' => 'Ang :attribute na field ay kinakailangan kapag ang mga :values ay naroroon.',
    'required_without' => 'Ang :attribute na field ay kinakailangan kapag ang :values ay hindi naroroon.',
    'required_without_all' => 'Ang :attribute na field ay kinakailangan kapag wala ni isa sa mga :values ang naroroon.',
    'same' => 'Ang :attribute na field ay dapat tumugma sa :other.',
    'size' => [
        'array' => 'Ang :attribute na field ay dapat maglaman ng :size na item.',
        'file' => 'Ang :attribute na field ay dapat :size kilobytes.',
        'numeric' => 'Ang :attribute na field ay dapat :size.',
        'string' => 'Ang :attribute na field ay dapat :size na character.',
    ],
    'starts_with' => 'Ang :attribute na field ay dapat magsimula sa isa sa mga sumusunod: :values.',
    'string' => 'Ang :attribute na field ay dapat isang string.',
    'timezone' => 'Ang :attribute na field ay dapat isang wastong timezone.',
    'unique' => 'Ang :attribute ay nagamit na.',
    'uploaded' => 'Nabigo ang pag-upload ng :attribute.',
    'uppercase' => 'Ang :attribute na field ay dapat uppercase.',
    'url' => 'Ang :attribute na field ay dapat isang wastong URL.',
    'ulid' => 'Ang :attribute na field ay dapat isang wastong ULID.',
    'uuid' => 'Ang :attribute na field ay dapat isang wastong UUID.',

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
