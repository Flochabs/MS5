<?

namespace App\Http\Controllers;

use App\Mail\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('footer.contact');
    }

    public function store(Request $request){

        return ;
    }
}

