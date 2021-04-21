<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;

session_start();

class TeacherController extends Controller
{
    public function login(Request $request)
	    {
	    		$email=$request->email;
                $password=$request->password;

                $lresult=DB::table('teachers')
                      ->where('teacher_email',$email)
                      ->where('teacher_password',$password)
                      ->first();


               if ($lresult)
                      {
                        Session::put('user_type',$lresult->user_type);
                        Session::put('Teacher_name',$lresult->teacher_name);
                        Session::put('Teacher_id',$lresult->Teacher_id);
                        return Redirect::to('/teacher_dashboard');

                      }

                      else

                      {

                        Session::put('message','Email or Password Invalid');
                        return Redirect::to('/teacher');
                      }
	    }

        public function teacher_profile()
                {
                  $Teacher_id=Session::get('Teacher_id');
                  $lresult=DB::table('teachers')
                          ->join('departments', 'departments.Department_id', '=', 'teachers.Department_id')
                          ->where('Teacher_id',$Teacher_id)
                          ->first();
                  return view('teacher.teacher_profile',compact('lresult'));
                }

        public function teacher_profile_edit()
                {
                  $Teacher_id=Session::get('Teacher_id');
                  $lresult=DB::table('teachers')
                                ->join('departments','departments.Department_id','=','teachers.Department_id')
                                ->where('Teacher_id',$Teacher_id)
                                ->first();
                  return view('teacher.teacher_profile_edit',compact('lresult'));
                }

        public function teacher_profile_update(Request $request)
                {
                  $Teacher_id=Session::get('Teacher_id');

                  DB::table('teachers')
                  ->where('Teacher_id',$Teacher_id)
                  ->update([
                  'teacher_name'=>$request->teacher_name,
                  'teacher_email'=>$request->teacher_email,
                  'teacher_password'=>$request->teacher_password,
                  'teacher_mobile_no'=>$request->teacher_mobile_no,
                  'teacher_address'=>$request->teacher_address,
                  'teacher_date_of_birth'=>$request->teacher_date_of_birth
                  ]);

                  Session::put('message','Updated Succesfully');
                  return Redirect::back();
                }

        public function behavioral_assessment()
                  {
                    $semesters=Db::table('semesters')
                              ->select('semester_name')
                              ->get();
                    return view('teacher.behavioral_assessment',compact('semesters'));
                  }
        public function post_behavioral_assessment(Request $request)
                  {
                    $Teacher_id=Session::get('Teacher_id');
                    $behavioral_assessment=DB::insert("insert into behavioural_assesments(Student_id,Teacher_id,Semester_id,class_performance,manner,class_attendance,comment) value(?,?,?,?,?,?,?)",[$_REQUEST['Student_id'],$Teacher_id,$_REQUEST['Semester_id'],$_REQUEST['class_performance'],$_REQUEST['manner'],$_REQUEST['class_attendance'],$_REQUEST['comment']]);
                      if ($behavioral_assessment)
                       {
                         return Redirect::back()->withErrors(['Submission complete']);
                       }

                      else

                       {
                          return Redirect::back()->withErrors(['Something Went Wrong']);
                       }    
                    
                  }          


        public function teacher_class_diary_post(Request $request)
      {

           $Teacher_id=Session::get('Teacher_id');
           $student_academic_id=$request->id;
           $teacher_comment=$request->Message;
           $date=$request->date;

           $lresult=DB::table('enrolled_courses')
                      ->Join('students', 'students.Student_id', '=', 'enrolled_courses.Student_id')
                      ->Join('sections', 'sections.Section_id', '=', 'enrolled_courses.Section_id')
                      ->Join('teachers', 'sections.Teacher_id', '=', 'teachers.Teacher_id')
                      ->where('sections.Teacher_id',$Teacher_id)
                      ->where('students.student_academic_id',$student_academic_id)
                      ->get();

              $date = Carbon::now()->toDateTimeString();

         $Student=$lresult[0]->Student_id;
         $Teacher=$lresult[0]->Teacher_id;
         print_r($Teacher.$Student); 
          $lresult=DB::insert("insert into class_diaries(Teacher_id,Student_id,teacher_comment,date) value(?,?,?,?)",[$Teacher,$Student,$teacher_comment,$date]);

               if ($lresult)
                       {
                         Session::put('message','CLass Diary is Posted Succesfully');
                         return Redirect::back();
                       }

                       else

                       {
                         Session::put('message','Something Went Wrong');
                         return Redirect::back();
                       }                       
          }


                  public function teacher_chat()
      {
        $Teacher_id=Session::get('Teacher_id');
        $teacher_chatlist=DB::table('teachers')
                        ->select('parent_name','Parent_id','student_academic_id')
                        ->Join('departments', 'departments.Department_id', '=', 'teachers.Department_id')
                        ->Join('students', 'students.Department_id', '=', 'departments.Department_id')
                        ->Join('parents', 'parents.Student_id', '=', 'students.Student_id')
                        ->where('Teacher_id',$Teacher_id)
                        ->get();

        $Teacher_chat_user_id =DB::table('chat_users')
                         ->select('Chat_user_id')
                         ->where('Teacher_id',$Teacher_id)
                        ->get();
        $Receiver_id=$Teacher_chat_user_id[0]->Chat_user_id;

        $Teacher_last_inbox=DB::table('chats')
                         ->select('Sender_id')
                         ->where('Receiver_id',$Receiver_id)
                         ->orderBy('time', 'desc')
                         ->first(); 
        $Sender_id=$Teacher_last_inbox->Sender_id;

         $Parent =DB::table('chat_users')
                          ->select('Parent_id')
                          ->where('Chat_user_id',$Sender_id)
                         ->get();
         $Parent_id=$Parent[0]->Parent_id;

          $Parent_name= Db::select("SELECT parent_name FROM `parents` WHERE Parent_id = $Parent_id ");
          $Teacher_name= Db::select("SELECT teacher_name FROM `teachers` WHERE Teacher_id = $Teacher_id ");

          $Parent_name = $Parent_name[0]->parent_name;
          $Teacher_name = $Teacher_name[0]->teacher_name; 


          $results = DB::select("SELECT * FROM `chats` WHERE (Sender_id = $Sender_id AND Receiver_id = $Receiver_id) OR (Receiver_id = $Sender_id AND Sender_id = $Receiver_id) ORDER BY time");

         


             
                //     echo "<pre>";
                //  print_r($Parent_name);
                // exit();

              return view('teacher.teacher_chat',compact('teacher_chatlist','results','Sender_id', 'Receiver_id', 'Parent_name', 'Teacher_name'));
      }


      public function teacher_chat_with($Parent_id)
        {
          $Teacher_id=Session::get('Teacher_id');
         $teacher_chatlist=DB::table('teachers')
                        ->select('parent_name','Parent_id','student_academic_id')
                        ->Join('departments', 'departments.Department_id', '=', 'teachers.Department_id')
                        ->Join('students', 'students.Department_id', '=', 'departments.Department_id')
                        ->Join('parents', 'parents.Student_id', '=', 'students.Student_id')
                        ->where('Teacher_id',$Teacher_id)
                        ->get();

          $Parent_id = (int) $Parent_id;

          $Parent_name= Db::select("SELECT parent_name FROM `parents` WHERE Parent_id = $Parent_id ");
          $Teacher_name= Db::select("SELECT teacher_name FROM `teachers` WHERE Teacher_id = $Teacher_id ");

          $Parent_name = $Parent_name[0]->parent_name;
          $Teacher_name = $Teacher_name[0]->teacher_name;       

          $Parent_id= Db::select("SELECT Chat_user_id FROM `chat_users` WHERE Parent_id = $Parent_id ");
          $Teacher_id= Db::select("SELECT Chat_user_id FROM `chat_users` WHERE Teacher_id = $Teacher_id ");

          $Parent_id = $Parent_id[0]->Chat_user_id;
          $Teacher_id = $Teacher_id[0]->Chat_user_id;
          // echo "<pre>";
          // print_r($Teacher_id);
          // print_r($Parent_id);
          // exit();


          $results = DB::select("SELECT * FROM `chats` WHERE (Sender_id = $Teacher_id AND Receiver_id = $Parent_id) OR (Receiver_id = $Teacher_id AND Sender_id = $Parent_id) ORDER BY time");

          // $results = DB::select("SELECT * FROM `chats` JOIN chat_users ON 'chats.Sender_id' = 'chat_users.Parent_id' WHERE (Sender_id = $Parent_id  AND Receiver_id = $Teacher_id) OR (Receiver_id = $Parent_id  AND Sender_id = $Teacher_id) ORDER BY time DESC");

          

          return view('teacher.teacher_chat_with', compact('teacher_chatlist','results','Parent_id', 'Teacher_id', 'Parent_name', 'Teacher_name')); 
      }


      public function teacher_message_sending_to(Request $request)
      {
         $Teacher_id=Session::get('Parent_id');
         $Sender=DB::table('chat_users')
                        ->select('Chat_user_id')
                        ->where('Parent_id',$Teacher_id)
                        ->get();
        $Sender_id=$Sender[0]->Chat_user_id;
        $Receiver_id=$request->input('parent_id');
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
        return Redirect::to('/teacher');
      }
}
