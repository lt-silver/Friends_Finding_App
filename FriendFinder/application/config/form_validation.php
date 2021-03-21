<?php
$config = array(

'signup' => array(
        array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required|min_length[5]|max_length[10]'
        ),
        array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required|min_length[5]|max_length[100]'
        ),
        array(
                'field' => 'confirmPassword',
                'label' => 'Password Confirmation',
                'rules' => 'required|matches[password]'
        ),
),

'login' => array(
        array(
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'required'          
        ),
        array(
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'required'
        ),
),

'smokingForm' => array(
        array(
                'field' => 'smoke_status',
                'label' => 'Smoking Status',
                'rules' => 'required'
        )
),

'declaration' => array(
        array(
                'field' => 'confirmation',
                'label' => 'Confirmation',
                'rules' => 'required'
        )
),

'allergyform' => array(
        array(
                'field' => 'allergy_details',
                'label' => 'Allergy Details'
        ),
        array(
                'field' => 'allergic',
                'label' => 'Allergic',
                'rules' => 'required'
        )
),

'lifestyleForm' => array(
        array(
                'field' => 'exercise',
                'label' => 'Exercise',
                'rules' => 'required'
        ),
        array(
                'field' => 'exercise_minutes',
                'label' => 'Exercise Minutes',
                'rules' => 'required|min_length[1]|max_length[3]|regex_match[/^[0-9]/]'
        ),
        array(
                'field' => 'exercise_days',
                'label' => 'Exercise Days',
                'rules' => 'required|min_length[1]|max_length[1]|regex_match[/^[0-7]/]'
        ),
        array(
                'field' => 'diet',
                'label' => 'Diet',
                'rules' => 'required'
        )
),


'familyHistoryForm' => array(
        array(
                'field' => 'has_heart_disease',
                'label' => 'Heart Disease',
                'rules' => 'required'
        ),
        array(
                'field' => 'has_cancer',
                'label' => 'Cancer',
                'rules' => 'required'
        ),
        array(
                'field' => 'has_stroke',
                'label' => 'Stroke',
                'rules' => 'required'
        ),
        array(
                'field' => 'has_other',
                'label' => 'Other',
                'rules' => 'required'
        ),
        array(
                'field' => 'has_heart_disease_family',
                'label' => 'Heart Disease in Family',
                'rules' => 'min_length[3]|max_length[20]|regex_match[/^[A-z]/]'
        ),
        array(
                'field' => 'has_cancer_family',
                'label' => 'Cancer in Family',
                'rules' => 'min_length[3]|max_length[20]|regex_match[/^[A-z]/]'
        ),
        array(
                'field' => 'has_stroke_family',
                'label' => 'Stroke in Family',
                'rules' => 'min_length[3]|max_length[20]|regex_match[/^[A-z]/]'
        ),
        array(
                'field' => 'has_other_family',
                'label' => 'Other in Family',
                'rules' => 'min_length[3]|max_length[20]|regex_match[/^[A-z]/]'
        )
),

'medicationForm' => array(
        array(
                'field' => 'Medication_YN',
                'label' => 'Medication',
                'rules' => 'required'
        ),
        array(
                'field' => 'Medication_1',
                'label' => 'Medication 1',
        ),
        array(
                'field' => 'Medication_2',
                'label' => 'Medication 2'
        ),
        array(
                'field' => 'Medication_3',
                'label' => 'Medication 3'
        ),
        array(
                'field' => 'medication_dosage_1',
                'label' => 'Medication Dosage 1',
                'rules' => 'min_length[1]|max_length[5]|regex_match[/^[0-9]/]'
        ),
        array(
                'field' => 'medication_dosage_2',
                'label' => 'Medication Dosage 2',
                'rules' => 'min_length[1]|max_length[5]|regex_match[/^[0-9]/]'
        ),
        array(
                'field' => 'medication_dosage_3',
                'label' => 'Medication Dosage 3',
                'rules' => 'min_length[1]|max_length[5]|regex_match[/^[0-9]/]'
        ),
        array(
                'field' => 'medication_frequency_1',
                'label' => 'Medication Frequency 1',
                'rules' => 'min_length[1]|max_length[5]|regex_match[/^[0-9]/]'
        ),
        array(
                'field' => 'medication_frequency_2',
                'label' => 'Medication Frequency 2',
                'rules' => 'min_length[1]|max_length[5]|regex_match[/^[0-9]/]'
        ),
        array(
                'field' => 'medication_frequency_3',
                'label' => 'Medication Frequency 3',
                'rules' => 'min_length[1]|max_length[5]|regex_match[/^[0-9]/]'
        )
),

    'userForm' => array(
        array(
                'field' => 'title',
                'label' => 'Title',
                'rules' => 'required',
                'rules' => 'required|min_length[1]|max_length[6]|regex_match[/^[A-z]/]'
        ),
        array(
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'valid_email'
        ),
         array(
                'field' => 'firstname',
                'label' => 'Firstname',
                'rules' => 'required|alpha|min_length[2]|max_length[25]|regex_match[/^[A-z]/]'
        ),
        array(
                'field' => 'surname',
                'label' => 'Surname',
                'rules' => 'required|alpha|min_length[2]|max_length[25]|regex_match[/^[A-z]/]'
        ),
        array(
                'field' => 'dob',
                'label' => 'Date of Birth',
                'rules' => 'required'
        ),
        array(
                'field' => 'marital_status',
                'label' => 'Marital Status'
        ),
        array(
                'field' => 'gender',
                'label' => 'Gender',
                'rules' => 'required'
        ),
        array(
                'field' => 'address',
                'label' => 'Adress',
                'rules' => 'required'
        ),
        array(
                'field' => 'postcode',
                'label' => 'Postcode',
                'rules' => 'required'
        ),
        array(
                'field' => 'occupation',
                'label' => 'Occupation',
                'rules' => 'min_length[1]|max_length[20]|regex_match[/^[A-z]/]'
        ),
        array(
                'field' => 'height',
                'label' => 'Height',
                'rules' => 'required|min_length[2]|max_length[3]|regex_match[/^[0-9]/]'
        ),
        array(
                'field' => 'weight',
                'label' => 'Weight',
                'rules' => 'required|min_length[2]|max_length[3]|regex_match[/^[0-9]/]'
        ),
        array(
                'field' => 'mobile',
                'label' => 'Mobile Number',
                'rules' => 'required|min_length[10]|max_length[15]|regex_match[/^[0-9]/]'
        ),
        array(
                'field' => 'home_telephone',
                'label' => 'Telephone Number',
                'rules' => 'required|min_length[10]|max_length[15]|regex_match[/^[0-9]/]'
        ),
        array(
                'field' => 'email',
                'label' => 'Email Adress'
        ),
        array(
                'field' => 'kin_name',
                'label' => 'Next of Kin Name',
                'rules' => 'required|alpha|min_length[2]|max_length[25]|regex_match[/^[A-z]/]'
        ),
        array(
                'field' => 'kin_relationship',
                'label' => 'Next of Kin Relationship',
                'rules' => 'required|alpha|min_length[2]|max_length[25]|regex_match[/^[A-z]/]'
        ),
        array(
                'field' => 'kin_telephone',
                'label' => 'Next of Kin Telephone Number',
                'rules' => 'required|min_length[10]|max_length[15]|regex_match[/^[0-9]/]'
        ),
    )
);