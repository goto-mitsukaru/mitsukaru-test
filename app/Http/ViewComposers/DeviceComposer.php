<?php
namespace App\Http\ViewComposers;
use App\Models\Region;
use Illuminate\View\View;
use Illuminate\Http\Request;

class DeviceComposer
{

    protected $device;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function __construct(Request $request)
    {
        $user_agent =  $request->header('User-Agent');
        if ((strpos($user_agent, 'iPhone') !== false)
            || (strpos($user_agent, 'iPod') !== false)
            || (strpos($user_agent, 'Android') !== false)) {
            $device = 'mobile';
        } else {
            $device = 'pc';
        }

        $this->device = $device;
    }


    /**
     * Bind data to the view.
     * @param View $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('device', $this->device);
    }
}
