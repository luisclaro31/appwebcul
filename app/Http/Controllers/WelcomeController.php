<?php namespace App\Http\Controllers;
use Vsmoraes\Pdf\Pdf;
class WelcomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Welcome Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders the "marketing page" for the application and
	| is configured to only allow guests. Like most of the other sample
	| controllers, you are free to modify or remove it as you desire.
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	private $pdf;

	public function __construct(Pdf $pdf)
	{
		$this->middleware('guest');
		$this->pdf = $pdf;
	}

	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		$name = 'Luis';
		$html = view('home', compact('name'))->render();


		return $this->pdf
				->load($html)
				->filename('nombre'.$name.'de')
				->show();

		//$html = view('welcome')->render();

		//return Pdf::load($html)->show();


		//dd('hola');
		//return view('welcome');
	}

}
