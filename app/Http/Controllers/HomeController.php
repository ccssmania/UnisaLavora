<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\User;
use Carbon\Carbon;
use App\Oferta;
use App\InEntrevistaRequest;
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

    public function statistics(){

        /*$companies = User::get(['created_at'])->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('m');
        });*/
        $ofertas = Oferta::get(['created_at'])->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d');
        });

        $applies =  InEntrevistaRequest::get(['created_at'])->groupBy(function($date) {
            return Carbon::parse($date->created_at)->format('d');
        });
        $applies_plot = \Lava::DataTable();
        $reasons = \Lava::DataTable();

        $reasons->addStringColumn('Reasons')
                ->addNumberColumn('Percent')
                ->addRow([\Lang::get('project.students'), User::where('active',1)->where('roll', 2)->count()])
                ->addRow([\Lang::get('project.companies'), User::where('active',1)->where('roll', 1)->count()]);

        \Lava::PieChart('Users', $reasons, [
            'title'  => 'Students & Companies',
            'is3D'   => true
        ]);



        $finances = \Lava::DataTable();

        $finances->addDateColumn(\Lang::get('project.month'))
                 ->addNumberColumn(\Lang::get('project.oferts'))
                 ->setDateTimeFormat('m');

        $applies_plot->addDateColumn(\Lang::get('project.month'))
                ->addNumberColumn(\Lang::get('project.interviews'))
                ->setDateTimeFormat('m');
        foreach ($ofertas as $key => $m) {
            $date = \DateTime::createFromFormat('m', $key)->format('m');
            
            $finances->addRow([ $date, $m->count()]);
        }

        \Lava::ColumnChart(\Lang::get('project.oferts'), $finances, [
            'title' => \Lang::get('project.oferts'),
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);

        foreach ($applies as $key => $m) {
            $date = \DateTime::createFromFormat('m', $key)->format('m');
            
            $applies_plot->addRow([ $date, $m->count()]);
        }


        \Lava::ColumnChart(\Lang::get('project.interviews'), $applies_plot, [
            'title' => \Lang::get('project.interviews'),
            'titleTextStyle' => [
                'color'    => '#eb6b2c',
                'fontSize' => 14
            ]
        ]);


        return view('statistics.index');
    }
}
