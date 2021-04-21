<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use View;
session_start();

class AdminController extends Controller
{


    public function login(Request $request)
	    {
	    		$email=$request->email;
                $password=$request->password;

                $lresult=DB::table('admins')
                      ->where('email',$email)
                      ->where('password',$password)
                      ->first();


               if ($lresult)
                      {
                        Session::put('user_type',$lresult->user_type);
                        Session::put('Admin_name',$lresult->name);
                        Session::put('Admin_id',$lresult->Admin_id);
                        return Redirect::to('/admin_dashboard');

                      }

                      else

                      {

                        Session::put('message','Email or Password Invalid');
                        return Redirect::to('/admin');
                      }
	    }




  	public function profile()
      {
        $admin_id=Session::get('Admin_id');
        $lresult=DB::table('admins')
                      ->where('Admin_id',$admin_id)
                      ->first();
        return view('admin.admin_profile',compact('lresult'));
      }


    public function profile_edit()
      {
        $admin_id=Session::get('Admin_id');
        $lresult=DB::table('admins')
                      ->where('Admin_id',$admin_id)
                      ->first();
        return view('admin.admin_profile_edit',compact('lresult'));
      }


    public function profile_update(Request $request)
      {
        $admin_id=Session::get('Admin_id');

	     	DB::table('admins')->where('Admin_id',$admin_id)->update([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>$request->password,
        'mobile_no'=>$request->mobile_no,
        'address'=>$request->address,
        'date_of_birth'=>$request->date_of_birth
        ]);

        Session::put('message','Updated Succesfully');
        return Redirect::back();
      }





    public function add_notice()
      {
        return view('admin.add_notice');
      }


    public function admin_notice_board()
      {

         $notices = DB::table('notices')
            ->leftJoin('admins', 'notices.Admin_id', '=', 'admins.Admin_id')
            ->leftJoin('departments', 'notices.Department_id', '=', 'departments.Department_id')->orderBy('Notice_id', 'desc')
            ->paginate(8);
         return view('admin.notice_board',compact('notices'));
      }


    public function view_noticeboard($Notice_id)
      {
        if($Notice_id>=1){
      
           $view_notice=DB::table('notices')->leftJoin('admins','notices.Admin_id','=','admins.Admin_id')->leftJoin('departments','notices.Department_id','=','departments.Department_id')
           ->where('Notice_id',$Notice_id)
           ->get();
         }

          return view('admin.view_notice_detail',compact('view_notice')); 
      }

    public function department_notice($Department_id)
      {
        if($Department_id>=1){
      
           $department_notices=DB::table('notices')
           ->where('Department_id',$Department_id)
           ->get();
         }

          return view('admin.department_notice',compact('department_notices')); 
      }


    public function post_notice(Request $request)
      {


          $admin_id=Session::get('Admin_id');
          $date = Carbon::now()->toDateTimeString();
      
          // File Upload
          $file = $request->file('file');
          $destinationPath = 'notice/';
          $file_name = $file->getClientOriginalName();
          $file_url = $destinationPath.$file->getClientOriginalName();
          $file->move($destinationPath,$file->getClientOriginalName());

           // return $request->all();
  
            $lresult=DB::insert("insert into notices(Admin_id,Department_id,title,description,file_name,file_url,date) value(?,?,?,?,?,?,?)",[$admin_id,$request->input('department_id'),$request->input('title'),$request->input('description'),$file_name,$file_url,$date]);

               if ($lresult)
                       {
                         Session::put('message','Notice is Posted Succesfully');
                         return Redirect::back();
                       }

                       else

                       {
                         Session::put('message','Something Went Wrong');
                         return Redirect::back();
                       }
      }

    public function add_user()
      {
        $departments=DB::table('departments')
                    ->get();

          return view('admin.add_user',compact('departments'));
      }


      public function add_teacher(Request $request)
      {
          $user_type = 'teacher';
          // File Upload
          $file = $request->file('T_avatar');
          $destinationPath = 'images/teacher/picture';
          $file_name = $file->getClientOriginalName();
          $file_url = $destinationPath.$file->getClientOriginalName();
          $file->move($destinationPath,$file->getClientOriginalName());
  
          $lresult=DB::insert("insert into teachers(Department_id,user_type,teacher_name,teacher_email,teacher_password,teacher_designation,teacher_mobile_no,teacher_address,teacher_date_of_birth,teacher_image) value(?,?,?,?,?,?,?,?,?,?)",[$request->input('department'),$user_type,$request->input('T_name'),$request->input('T_email'),$request->input('T_password'),$request->input('T_designation'),$request->input('T_mobile'),$request->input('T_address'),$request->input('T_dob'),$file_url ]);

               if ($lresult)
                       {
                         Session::put('message','A User has been Created Succesfully');
                         return Redirect::back();
                       }

                       else

                       {
                         Session::put('message','Something Went Wrong');
                         return Redirect::back();
                       }
      }

            public function add_parent(Request $request)
      {
         $Student=DB::table('students')
                    ->select('Student_id')
                    ->where('student_academic_id',$request->input('P_student_id'))
                    ->get();
          $user_type = 'parent';
          // File Upload
          $file = $request->file('P_avatar');
          $destinationPath = 'images/parent/picture';
          $file_name = $file->getClientOriginalName();
          $file_url = $destinationPath.$file->getClientOriginalName();
          $file->move($destinationPath,$file->getClientOriginalName());
          


  
          $lresult=DB::insert("insert into parents(Student_id,user_type,parent_name,parent_email,parent_password,parent_mobile_no,parent_address,parent_profession,relation,parent_date_of_birth,parent_image) value(?,?,?,?,?,?,?,?,?,?,?)",[$Student[0]->Student_id,$user_type,$request->input('P_name'),$request->input('P_email'),$request->input('P_password'),$request->input('P_mobile'),$request->input('P_address'),$request->input('P_profession'),$request->input('P_relation'),$request->input('P_dob'),$file_url ]);

               if ($lresult)
                       {
                         Session::put('message','A User has been Created Succesfully');
                         return Redirect::back();
                       }

                       else

                       {
                         Session::put('message','Something Went Wrong');
                         return Redirect::back();
                       }
      }


    public function add_student()
      {
        $departments=DB::table('departments')
                    ->get();

          return view('admin.add_student',compact('departments'));
      }


     public function create_student(Request $request)
      {
          // File Upload
          $file = $request->file('S_avatar');
          $destinationPath = 'images/student/picture';
          $file_name = $file->getClientOriginalName();
          $file_url = $destinationPath.$file->getClientOriginalName();
          $file->move($destinationPath,$file->getClientOriginalName());
  
          $lresult=DB::insert("insert into students(student_academic_id,Department_id,student_name,student_email,student_password,student_mobile_no,student_present_address,student_permanent_address,student_date_of_birth,student_image) value(?,?,?,?,?,?,?,?,?,?)",[$request->input('S_academic_id'),$request->input('department'),$request->input('S_name'),$request->input('S_email'),$request->input('S_password'),$request->input('S_mobile'),$request->input('S_present_address'),$request->input('S_permanent_address'),$request->input('S_dob'),$file_url]);

               if ($lresult)
                       {
                         Session::put('message','A Student has been Created Succesfully');
                         return Redirect::back();
                       }

                       else

                       {
                         Session::put('message','Something Went Wrong');
                         return Redirect::back();
                       }
      }


    public function admin_payment()
      {
          return view('admin.admin_payment');
      }


    public function admin_payment_search(Request $request)
      {
       if($request->ajax())
       {
        $output = '';
        $query = $request->get('query');
        if($query != '')
        {
         $data = DB::table('payment_ledgers')
         ->join('semesters', 'semesters.Semester_id', '=', 'payment_ledgers.Semester_id')
         ->join('students', 'students.Student_id', '=', 'payment_ledgers.Student_id')
         ->join('departments', 'departments.Department_id', '=', 'students.Department_id')
         ->where('student_academic_id','like', '%'.$query.'%')
         ->get();          
        }
        else
        {
         $data = DB::table('payment_ledgers')
           ->join('semesters', 'semesters.Semester_id', '=', 'payment_ledgers.Semester_id')
           ->join('students', 'students.Student_id', '=', 'payment_ledgers.Student_id')
           ->join('departments', 'departments.Department_id', '=', 'students.Department_id')
           ->orderBy('Payment_ledger_id','DESC')
           ->paginate(0);
        }

        $total_row = $data->count();
        if($total_row > 0)
        {
         foreach($data as $row)
         {
          $output .= '
          <tr>
           <td>'.$row->student_academic_id.'</td>
           <td>'.$row->student_name.'</td>
           <td>'.$row->total_credits.'</td>
           <td>'.$row->total_payable.'</td>
           <td>'.$row->total_paid.'</td>
           <td><button type="button" class="btn btn-primary"><a href="payment_ledger_detail/'.$row->Payment_ledger_id.'">View</a></button></td>

          </tr>
          ';
         }
        }
        else
        {
         $output = '
         <tr>
          <td align="center" colspan="5">No Data Found</td>
         </tr>
         ';
        }
        $data = array(
         'table_data'  => $output,
         'total_data'  => $total_row
        );

        echo json_encode($data);
       }
      }


      public function payment_ledger_detail($Payment_ledger_id)
        {
            $payment_ledger_detail=DB::table('payment_ledgers')
            ->join('semesters', 'semesters.Semester_id', '=', 'payment_ledgers.Semester_id')
            ->join('students', 'students.Student_id', '=', 'payment_ledgers.Student_id')
            ->join('departments', 'departments.Department_id', '=', 'students.Department_id')
            ->where('payment_ledgers.Payment_ledger_id',$Payment_ledger_id)
            ->get();
            return view('admin.payment_ledger_detail',compact('payment_ledger_detail')); 
        }



      public function add_semester()
        {
          $semesters=DB::table('semesters')
                    ->get();
          return view('admin.add_semester',compact('semesters'));
        }


        public function add_new_semester(Request $request)
        {
            $add_new_semester=DB::insert("insert into semesters(semester_name,start_date,end_date) value(?,?,?)",[$request->input('semester_name'),$request->input('semester_start'),$request->input('semester_end')]);
            if ($add_new_semester) 
            {
             return Redirect::back()->withErrors(['A Semester has been created successfully ']);
            }
            else
            {
             return Redirect::back()->withErrors(['Semester has not been Created']);
            }

        }


      public function add_section()
        {
          $departments=DB::table('departments')
                    ->get();
          $teachers=DB::table('teachers')
                    ->join('departments','departments.Department_id','=','teachers.Department_id')
                    ->get();
          $semesters=DB::table('semesters')
                    ->get();

          return view('admin.add_section',compact('departments','teachers','semesters'));
        }


        public function create_section(Request $request)
        { 
          $add_new_section=DB::insert("insert into sections(Department_id,Semester_id,Teacher_id,level_term,name,capacity) value(?,?,?,?,?,?)",[$request->input('Sec_department'),$request->input('Sec_semester'),$request->input('Sec_teacher'),$request->input('Sec_L_T'),$request->input('Sec_name'),$request->input('Sec_capacity')]);
            if ($add_new_section) 
            {
             return Redirect::back()->withErrors(['A Semester has been created successfully ']);
            }
            else
            {
             return Redirect::back()->withErrors(['Semester has not been Created']);
            }
        }


           public function enroll_course()
        {

          return view('admin.enroll_course');
        }


  	  public function logout()
        {
          request()->session()->regenerate(true);
      		request()->session()->flush();
      		return Redirect::to('/admin');
        }
}
