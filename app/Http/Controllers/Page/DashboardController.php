<?php

    namespace App\Http\Controllers\Page;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class DashboardController extends Controller
    {
        public function page(){
            return view("dashboard.index");
        }
    }

?>