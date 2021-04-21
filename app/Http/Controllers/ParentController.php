<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ParentController extends Controller
{
    public function login(Request $request)
	    {
	    		$email=$request->email;
                $password=$request->password;

                $lresult=DB::table('parents')
                      ->where('parent_email',$email)
                      ->where('parent_password',$password)
                      ->first();


               if ($lresult)
                      {
                        Session::put('relation',$lresult->relation);
                        Session::put('Parent_name',$lresult->parent_name);
                        Session::put('Parent_id',$lresult->Parent_id);
                        return Redirect::to('/parent_dashboard');

                      }

               else
                      {

                        Session::put('message','Email or Password Invalid');
                        return Redirect::to('/');
                      }
	    }

          public function parent_profile()
              {
                $Parent_id=Session::get('Parent_id');
                $lresult=DB::table('parents')->join('students', 'students.Student_id', '=', 'parents.Student_id')
                              ->where('Parent_id',$Parent_id)
                              ->first();
                return view('parent.parent_profile',compact('lresult'));
              }

          public function parent_profile_edit()
              {
                $Parent_id=Session::get('Parent_id');
                $lresult=DB::table('parents')->join('students', 'students.Student_id', '=', 'parents.Student_id')
                              ->where('Parent_id',$Parent_id)
                              ->first();
                return view('parent.parent_profile_edit',compact('lresult'));
              }

          public function parent_profile_update(Request $request)
                  {
                    $Parent_id=Session::get('Parent_id');

                    DB::table('parents')->where('Parent_id',$Parent_id)->update([
                    'parent_name'=>$request->parent_name,
                    'parent_email'=>$request->parent_email,
                    'parent_password'=>$request->parent_password,
                    'parent_mobile_no'=>$request->parent_mobile_no,
                    'parent_profession'=>$request->parent_profession,
                    'parent_address'=>$request->parent_address,
                    'parent_date_of_birth'=>$request->parent_date_of_birth
                    ]);

                    Session::put('message','Updated Succesfully');
                    return Redirect::back();
                  }

      public function payment_ledger()
        {
          $Parent_id=Session::get('Parent_id');
            $payment_ledger=DB::table('payment_ledgers')->join('semesters', 'semesters.Semester_id', '=', 'payment_ledgers.Semester_id')->join('students', 'students.Student_id', '=', 'payment_ledgers.Student_id')->join('departments', 'departments.Department_id', '=', 'students.Department_id')->join('parents', 'parents.Student_id', '=', 'students.Student_id')
             ->where('Parent_id',$Parent_id)
             ->get();
                // print_r($payment_ledger);
               return view('parent.payment_ledger',compact('payment_ledger')); 
          // return view('parent.payment_ledger');
        }


        public function parent_notice_board()
      {

         $notices = DB::table('notices')
            ->leftJoin('admins', 'notices.Admin_id', '=', 'admins.Admin_id')
            ->leftJoin('departments', 'notices.Department_id', '=', 'departments.Department_id')->orderBy('Notice_id', 'desc')
            ->paginate(8);
         return view('parent.notice_board',compact('notices'));
      }

      public function parent_notice_detail($Notice_id)
      {
        if($Notice_id>=1){
      
           $view_notice=DB::table('notices')->leftJoin('admins','notices.Admin_id','=','admins.Admin_id')->leftJoin('departments','notices.Department_id','=','departments.Department_id')
           ->where('Notice_id',$Notice_id)
           ->get();
         }

          return view('parent.view_notice_detail',compact('view_notice')); 
      }

       public function parent_department_notice($Department_id)
      {
        if($Department_id>=1){
      
           $department_notices=DB::table('notices')
           ->where('Department_id',$Department_id)
           ->get();
         }

          return view('parent.department_notice',compact('department_notices')); 
      }



      public function parent_academic_result()
      {
         return view('parent.parent_academic_result');
      }

      public function parent_academic_result_show(Request $request)
      {
         // $input = $request->all();   
         // print_r($input);
                $student_academic_id=$request->student_academic_id;
                $semester_name=$request->semester_name;
                $lresult=DB::table('results')
                      ->Join('enrolled_courses', 'enrolled_courses.Enrolled_course_id', '=', 'results.Enrolled_course_id')
                      ->Join('students', 'students.Student_id', '=', 'enrolled_courses.Student_id')
                      ->Join('departments', 'departments.Department_id', '=', 'students.Department_id')
                      ->Join('courses', 'courses.Course_id', '=', 'enrolled_courses.Course_id')
                      ->Join('sections', 'sections.Section_id', '=', 'enrolled_courses.Section_id')
                      ->Join('semesters', 'semesters.Semester_id', '=', 'sections.Semester_id')
                      ->Join('teachers', 'teachers.Teacher_id', '=', 'sections.Teacher_id')
                      ->where('student_academic_id',$student_academic_id)
                      ->where('semester_name',$semester_name)
                      ->get();

                return view('parent.parent_academic_result_show',compact('lresult'));


// echo "<pre>";
// print_r($lresult);                  
     }


         public function view_progress_report($Behavioural_assesment_id)
      {
        if($Behavioural_assesment_id>=1){
      
           $behavioural_assesment=DB::table('behavioural_assesments')
           ->join('semesters','semesters.Semester_id','=','behavioural_assesments.Semester_id')
           ->join('teachers','teachers.Teacher_id','=','behavioural_assesments.Teacher_id')
           ->where('Behavioural_assesment_id',$Behavioural_assesment_id)
           ->get();
         }

          return view('parent.view_progress_report',compact('behavioural_assesment')); 
      }

    public function parent_class_diary()
      {

               $Parent_id=Session::get('Parent_id');

                  $lresult=DB::table('class_diaries')
                        ->Join('students', 'students.Student_id', '=', 'class_diaries.Student_id')
                        ->Join('parents', 'parents.Student_id', '=', 'students.Student_id')
                        ->Join('teachers', 'teachers.Teacher_id', '=', 'class_diaries.Teacher_id')
                        ->where('Parent_id',$Parent_id)
                        ->orderBy('Class_diary_id', 'desc')
                        ->paginate(8);


                 if ($lresult)
                        {
                          return view('parent.parent_class_diary',compact('lresult'));
                        }

                        else

                        {
                        
                        }
      }

      public function parent_class_diary_detail($Class_diary_id)
      {
        if($Class_diary_id>=1){
      
           $class_diary_details=DB::table('class_diaries')
                               ->Join('teachers','teachers.Teacher_id','=','class_diaries.Teacher_id')
                               ->Join('departments','departments.Department_id','=','teachers.Department_id')
                               ->where('Class_diary_id',$Class_diary_id)
                               ->get();
         }

         // echo "<pre>";
         // print_r($class_diary_details);

        return view('parent.parent_class_diary_detail',compact('class_diary_details')); 
      }

        public function parent_chat()
      {
        $Parent_id=Session::get('Parent_id');
        $parent_chatlist=DB::table('parents')
                        ->select('teacher_name','Teacher_id','teacher_designation')
                        ->Join('students', 'students.Student_id', '=', 'parents.Student_id')
                        ->Join('departments', 'departments.Department_id', '=', 'students.Department_id')
                        ->Join('teachers', 'teachers.Department_id', '=', 'departments.Department_id')
                        ->where('Parent_id',$Parent_id)
                        ->get();

        $Parent_chat_user_id =DB::table('chat_users')
                         ->select('Chat_user_id')
                         ->where('Parent_id',$Parent_id)
                        ->get();
        $Receiver_id=$Parent_chat_user_id[0]->Chat_user_id;

        $Parent_last_inbox=DB::table('chats')
                         ->select('Sender_id')
                         ->where('Receiver_id',$Receiver_id)
                         ->orderBy('time', 'desc')
                         ->first(); 
        $Sender_id=$Parent_last_inbox->Sender_id;

         $Teacher =DB::table('chat_users')
                          ->select('Teacher_id')
                          ->where('Chat_user_id',$Sender_id)
                         ->get();
         $Teacher_id=$Teacher[0]->Teacher_id;

          $Teacher_name= Db::select("SELECT teacher_name FROM `teachers` WHERE Teacher_id = $Teacher_id ");
          $Parent_name= Db::select("SELECT parent_name FROM `parents` WHERE Parent_id = $Parent_id ");

          $Teacher_name = $Teacher_name[0]->teacher_name;
          $Parent_name = $Parent_name[0]->parent_name; 


          $results = DB::select("SELECT * FROM `chats` WHERE (Sender_id = $Sender_id AND Receiver_id = $Receiver_id) OR (Receiver_id = $Sender_id AND Sender_id = $Receiver_id) ORDER BY time");

         


             
                //     echo "<pre>";
                //  print_r($Parent_name);
                // exit();

              return view('parent.parent_chat',compact('parent_chatlist','results','Sender_id', 'Receiver_id', 'Teacher_name', 'Parent_name'));
      }


        public function parent_chat_with($Teacher_id)
        {
          $Parent_id=Session::get('Parent_id');
         $parent_chatlist=DB::table('parents')
                        ->select('teacher_name','Teacher_id','teacher_designation')
                        ->Join('students', 'students.Student_id', '=', 'parents.Student_id')
                        ->Join('departments', 'departments.Department_id', '=', 'students.Department_id')
                        ->Join('teachers', 'teachers.Department_id', '=', 'departments.Department_id')
                        ->where('Parent_id',$Parent_id)
                        ->get();

          $Teacher_id = (int) $Teacher_id;

          $Teacher_name= Db::select("SELECT teacher_name FROM `teachers` WHERE Teacher_id = $Teacher_id ");
          $Parent_name= Db::select("SELECT parent_name FROM `parents` WHERE Parent_id = $Parent_id ");

          $Teacher_name = $Teacher_name[0]->teacher_name;
          $Parent_name = $Parent_name[0]->parent_name;       

          $Teacher_id= Db::select("SELECT Chat_user_id FROM `chat_users` WHERE Teacher_id = $Teacher_id ");
          $Parent_id= Db::select("SELECT Chat_user_id FROM `chat_users` WHERE Parent_id = $Parent_id ");


          $Teacher_id = $Teacher_id[0]->Chat_user_id;
          $Parent_id = $Parent_id[0]->Chat_user_id;
          // echo "<pre>";
          // print_r($Teacher_id);
          // print_r($Parent_id);
          // exit();


          $results = DB::select("SELECT * FROM `chats` WHERE (Sender_id = $Parent_id AND Receiver_id = $Teacher_id) OR (Receiver_id = $Parent_id AND Sender_id = $Teacher_id) ORDER BY time");

          // $results = DB::select("SELECT * FROM `chats` JOIN chat_users ON 'chats.Sender_id' = 'chat_users.Parent_id' WHERE (Sender_id = $Parent_id  AND Receiver_id = $Teacher_id) OR (Receiver_id = $Parent_id  AND Sender_id = $Teacher_id) ORDER BY time DESC");

          

          return view('parent.parent_chat_with', compact('parent_chatlist','results','Teacher_id', 'Parent_id', 'Teacher_name', 'Parent_name')); 
      }

        public function message_sending_to(Request $request)
      {

         $Parent_id=Session::get('Parent_id');
         $Sender=DB::table('chat_users')
                        ->select('Chat_user_id')
                        ->where('Parent_id',$Parent_id)
                        ->get();
        $Sender_id=$Sender[0]->Chat_user_id;
        $Receiver_id=$request->input('teacher_id');
        $lresult=DB::insert("insert into chats(Sender_id,Receiver_id,message) value(?,?,?)",[$Sender_id,$Receiver_id,$request->input('messages')]);

               if ($lresult)
                       {
                         return Redirect::back();
                       }

                       else

                       {
                         Session::put('message','Message Sent Unsuccessful');
                         return Redirect::back();
                       }

      }





          public function logout()
      {
        request()->session()->regenerate(true);
        request()->session()->flush();
        return Redirect::to('/');
      }



   
}
