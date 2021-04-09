<?php $role = $DB->get_record('role', array('shortname' => 'editingteacher'));
    $context = get_context_instance(CONTEXT_COURSE, $student_main_course_id);
    $teachers = get_role_users($role->id, $context);
    $teacher_array = [];
    foreach ($teachers as $teacher => $tvalue) {
        $userimg = $OUTPUT->user_picture($tvalue, array('size' => 50));
        $teacher_array[$tvalue->username] = ["firstname" => $tvalue->firstname, "lastname" => $tvalue->lastname, "email" => $tvalue->email, "picture" => $userimg];
    }
    $teacher_content = '';


    foreach ($teacher_array as $tarr) {
        $teacher_content .= '<div class="teacher-row">' . $tarr["picture"] . '<div class="teacher-name-email">' . $tarr["firstname"] . ' ' . $tarr["lastname"] . '<br><a href="mailto:' . $tarr["email"] . '">Email</a></div></div>';
    }