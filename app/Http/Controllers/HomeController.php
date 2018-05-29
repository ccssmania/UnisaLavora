<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Oferta;
use App\InEntrevistaRequest;
use App\Http\Models\InModel;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth', ["except" => "index"]);
        $this->middleware('activate', ["except" => "index"]);
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function home(){
        $user = Auth::user();
        if(isset($user)){
            if($user->roll == env("COMPANY")){
                $users = User::where('roll',env("STUDENT"))->where('active', 1)->paginate(9);
                return view('main.main', compact("users"));
            }elseif($user->roll == env("STUDENT")){
                $users = User::where('roll',env("COMPANY"))->where('active', 1)->paginate(9);
                return view('main.main', compact("users"));
            }elseif($user->roll == env("ADMINISTRATOR")){
                $users = User::where('roll','!=',0)->paginate(9);
                return view('main.main', compact("users"));
            }else{
                return redirect('/home');
            }
        }else{
            return redirect("/home");
        }
    }
    public function statistics(Request $request){
        /*$companies = User::get(['created_at'])->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m');
        });*/
        
        $user = $request->user ? User::find($request->user) : new User();
        $year = $request->year ? $request->year : '%';
        $month = $request->month ? $request->month : '%';
        $day = $request->day ? $request->day : '%';
        $date = $year.'-'.$month.'-'.$day;


        if(isset($user) && $user->roll == env("COMPANY")){
            //----------------_Accepted Company-------------------------------------------------------
            $lava = \Lava::DataTable();
            $lava->addStringColumn(\Lang::get('project.oferts'))
                 ->addNumberColumn(\Lang::get('project.total'));
            $applies_a = InModel::getAcceptedInterview($request->user, $date);
            foreach ($applies_a as $apply) {
                
                $lava->addRow([$apply["name"],  $apply->count()]);
            }

            \Lava::BarChart(\Lang::get('project.interviews_accepted'), $lava);


            //---------------------------------Rejected----------------------------------------------

            $applies_r = InModel::getRejectedInterview($request->user, $date);

            $applies_r_plot = \Lava::DataTable();
            $applies_r_plot->addStringColumn(\Lang::get('project.oferts'))
                 ->addNumberColumn(\Lang::get('project.total'));
            
            
            foreach ($applies_r as $m) {
                
                $applies_r_plot->addRow([ $m["name"], $m->count()]);
            }
            \Lava::BarChart(\Lang::get('project.interviews_rejected'), $applies_r_plot);


            //Ofertas-------------------------------------------------------------------
            $ofertas = "";
            if (User::find($request->user)->roll == env("COMPANY")) {
                $ofertas = User::find($request->user)->user->ofertas()
                        ->get()
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('y-m-d');
                        });;
            }else
                $ofertas = Oferta::whereDate('created_at','like',$date)
                        ->get(['created_at'])
                        ->groupBy(function($date) {
                            return Carbon::parse($date->created_at)->format('y-m-d');
                        });
            $finances = \Lava::DataTable();
            $finances->addDateColumn(\Lang::get('project.month'))
                     ->addNumberColumn(\Lang::get('project.oferts'))
                     ->setDateTimeFormat('y-m-d');
            foreach ($ofertas as $key => $m) {
                
                $finances->addRow([(string)$key , $m->count()]);
            }
            \Lava::ColumnChart(\Lang::get('project.oferts'), $finances, [
                'title' => \Lang::get('project.oferts'),
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);

            //-------------------------Applies Company--------------------------------------------------------------------------

            $applies = InModel::getInterviews($request->user, $date);
            $applies_plot = \Lava::DataTable();
            

            $applies_plot->addStringColumn(\Lang::get('project.interview_request'))
                        ->addNumberColumn(\Lang::get('project.total'));
            
            
            foreach ($applies as $m) {
                
                $applies_plot->addRow([ (string)$m["name"] , $m->count()]);
            }
            \Lava::BarChart(\Lang::get('project.interview_request'), $applies_plot);




            //Users--------------------------------------------------------------------------------------------------

            $reasons = \Lava::DataTable();
            $reasons->addStringColumn('Reasons')
                    ->addNumberColumn('Percent')
                    ->addRow([\Lang::get('project.students'), User::where('active',1)->where('roll', 2)->count()])
                    ->addRow([\Lang::get('project.companies'), User::where('active',1)->where('roll', 1)->count()]);
            \Lava::PieChart('Users', $reasons, [
                'title'  => 'Students & Companies',
                'is3D'   => true
            ]);
        }else{
        //----------------_Accepted Student-------------------------------------------------------
            
            /*$applies_a =  InEntrevistaRequest::where('status',1)
                    ->whereDate('created_at','like',$date)
                    ->get(['created_at'])
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('y-m-d');
                    });*/

            $applies_a = InModel::getAcceptedInterview($request->user, $date);
            $applies_a_plot = \Lava::DataTable();
            
            
            $applies_a_plot->addDateColumn(\Lang::get('project.month'))
                    ->addNumberColumn(\Lang::get('project.interviews_accepted'))
                    ->setDateTimeFormat('y-m-d');
            
            
            foreach ($applies_a as $key => $m) {
                $applies_a_plot->addRow([ (string)$key, $m->count()]);
            }
            \Lava::ColumnChart(\Lang::get('project.interviews_accepted'), $applies_a_plot, [
                'title' => \Lang::get('project.interviews_accepted'),
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);

            //---------------------------------Rejected----------------------------------------------

            /*$applies_r =  InEntrevistaRequest::where('status',2)
                    ->whereDate('created_at','like',$date)
                    ->get(['created_at'])
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('y-m-d');
                    });*/
            $applies_r = InModel::getRejectedInterview($request->user, $date);
            $applies_r_plot = \Lava::DataTable();
            

            $applies_r_plot->addDateColumn(\Lang::get('project.month'))
                    ->addNumberColumn(\Lang::get('project.interviews_rejected'))
                    ->setDateTimeFormat('y-m-d');
            
            
            foreach ($applies_r as $key => $m) {
                
                $applies_r_plot->addRow([ (string)$key, $m->count()]);
            }
            \Lava::ColumnChart(\Lang::get('project.interviews_rejected'), $applies_r_plot, [
                'title' => \Lang::get('project.interviews_rejected'),
                'titleTextStyle' => [
                    'color'    => '#d9534f',
                    'fontSize' => 14
                ]
            ]);


            //Ofertas-------------------------------------------------------------------
            
            $ofertas = Oferta::whereDate('created_at','like',$date)
                    ->get(['created_at'])
                    ->groupBy(function($date) {
                         return Carbon::parse($date->created_at)->format('y-m-d');
                    });
            $finances = \Lava::DataTable();
            $finances->addDateColumn(\Lang::get('project.month'))
                     ->addNumberColumn(\Lang::get('project.oferts'))
                     ->setDateTimeFormat('y-m-d');
            foreach ($ofertas as $key => $m) {
                
                $finances->addRow([(string)$key , $m->count()]);
            }
            \Lava::ColumnChart(\Lang::get('project.oferts'), $finances, [
                'title' => \Lang::get('project.oferts'),
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);


            //-------------------------Applies Students--------------------------------------------------------------------------

            /*$applies =  InEntrevistaRequest::where('status', 0)
                    ->whereDate('created_at','like',$date)
                    ->get(['created_at'])
                    ->groupBy(function($date) {
                        return Carbon::parse($date->created_at)->format('y-m-d');
                    });*/
            $applies = InModel::getInterviews($request->user, $date);
            $applies_plot = \Lava::DataTable();
            
            

            $applies_plot->addDateColumn(\Lang::get('project.month'))
                    ->addNumberColumn(\Lang::get('project.interviews'))
                    ->setDateTimeFormat('y-m-d');
            
            
            foreach ($applies as $key => $m) {
                
                
                $applies_plot->addRow([ (string)$key , $m->count()]);
            }
            \Lava::ColumnChart(\Lang::get('project.interview_request'), $applies_plot, [
                'title' => \Lang::get('project.interview_request'),
                'titleTextStyle' => [
                    'color'    => '#eb6b2c',
                    'fontSize' => 14
                ]
            ]);




            //Users--------------------------------------------------------------------------------------------------

            $reasons = \Lava::DataTable();
            $reasons->addStringColumn('Reasons')
                    ->addNumberColumn('Percent')
                    ->addRow([\Lang::get('project.students'), User::where('active',1)->where('roll', 2)->count()])
                    ->addRow([\Lang::get('project.companies'), User::where('active',1)->where('roll', 1)->count()]);
            \Lava::PieChart('Users', $reasons, [
                'title'  => 'Students & Companies',
                'is3D'   => true
            ]);
        }
        return view('statistics.index', compact("request", "user"));
    }
}