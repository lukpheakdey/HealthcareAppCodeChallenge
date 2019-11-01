<?php

namespace App\Http\Controllers;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Requests\Patients\CreatePatientsRequest;
use Carbon\Carbon;

class PatientsController extends Controller
{
    public function index()
    {
        return view('patient.index');
    }

    /* 1. Create a user-facing page on route GET /signup that displays a form to add a new
     * patient. The form will make a request to POST /signup that handles patient creation.
     */
    public function signup()
    {
        return view('patient.signup');
    }
    public function store(CreatePatientsRequest $request)
    {
        $patient = Patient::create([
            'name' => $request->name,
            'age' => $request->age,
            'phone' => $request->phone,
            'start_date' => date('y-m-d'),
            'deadline' => date('Y-m-d', strtotime(' + 90 days')),
        ]);
        session()->flash('success', 'Sign up patient was successfully');
        return redirect('/index');
    }


     /* 2. Create a user-facing page on route GET /visit that displays a form to add a visit for an
     * existing patient. The form takes in the patient ID and the visit date as input, and will make a
     * request to POST /visit that handles visit creation.
     */
    public function visit()
    {
        return view('patient.visit');
    }
    public function storeVisit(Patient $patient)
    {
        $data = request()->all();
        $patient = Patient::find($data['id']);
        $patient->visit_date = date('Y-m-d', strtotime($data['visit_date']));
        $patient->save();
        session()->flash('success', 'Visited patient was successfully updated');
        return redirect('/index');
    }


    /**
     *  3. Each patient has a start date field (start_date) that denotes their initial contact with our
     *  center. Each patient has a deadline, which is 90 days after this start date, and is expected to
     *  have a visit before this deadline.
     *  Create a user-facing page on route GET /upcoming that displays a list of every patient
     *  having their visit deadline within 4 weeks from today. Also, for each patient, display the
     *  remaining days counting from today to that deadline.
     */
    public function upcoming()
    {
        $expiredDate = date('Y-m-d', strtotime(' + 30 days'));
        $patients = Patient::where('deadline', '>=', $expiredDate)->get();
        foreach ($patients as $patient) {
             $to = \Carbon\Carbon::createFromFormat('Y-m-d', $expiredDate);
             $from = \Carbon\Carbon::createFromFormat('Y-m-d', $patient->deadline);
             $remaining_in_days = $to->diffInDays($from);
             $patient['remaining'] = $remaining_in_days;
        }
        return view('patient.upcoming')->with('patients', $patients);
    }


    /*
    *  4. Create a mechanism to process missed visits. You can either create a command, job, or a
    *  web route, etc. for this. This will retrieve all patients that missed a visit by the deadline and
    *  record the string missed in the follow_up field of these patients. Using web route for this problem.
    */
    public function record_followup(Patient $patient)
    {
        $currentDate = date('Y-m-d');
        $patient = Patient::where('deadline', '<', $currentDate)
                    ->update(['follow_up' => "missed"]);
        session()->flash('success', 'follow up was successfully');
        return redirect('/index');
    }


    /*
     *  5. Create an API route GET /missed that returns the list of patients that missed their visits in JSON format
    */
    public function missed()
    {
        $result = Patient::where('follow_up', 'missed')->select('id', 'name', 'age', 'start_date', 'deadline')->get();
        return response()->json([
            'status' => 'success',
            'data' => $result,
        ]);
    }

}
