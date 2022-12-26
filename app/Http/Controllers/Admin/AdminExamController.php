<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\ExamCorrection;
use App\Models\ExamSubject;
use App\Models\Kelas;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class AdminExamController extends Controller
{

    public function exam() {
        $exams = Exam::get();
        return view('admin.exam.index')->with([
            'exams' => $exams
        ]);
    }

    public function examForm($id = null) {
        $subjects = Subject::get();
        $classOptions = Kelas::get();
        if($id == null) {
            return view('admin.exam.exam-form')->with([
                'classOptions' => $classOptions,
                'subjects' => $subjects,
            ]);
        }
        $exam = Exam::findOrFail($id);
        return view('admin.exam.exam-form')->with([
            'classOptions' => $classOptions,
            'subjects' => $subjects,
            'exam' => $exam,
        ]);
    }

    public function examSave(Request $input, $id=null) {
        $exam = new Exam;
        if($id != null) {
            $exam = Exam::findOrFail($id);
        }
        $exam->exam_name = $input->exam_name;
        $exam->class_id = $input->class_id;
        $exam->date = $input->date;
        $exam->save();

        ExamSubject::where('exam_id', $exam->id)->delete();

        foreach ($input->subjects as $value) {
            $examSubject = new ExamSubject;
            $examSubject->class_id = $input->class_id;
            $examSubject->exam_id = $exam->id;
            $examSubject->subject_id = $value;
            $examSubject->save();
        }
        
        return redirect()->route('admin.exam');
    }

    public function examHistory() {
        $exams = Exam::get();
        $selectedExam = null;
        $students = [];
        $corrections = [];
        
        if(isset($_GET['examId']) && $_GET['examId'] != '') {
            $selectedExam = Exam::find($_GET['examId']);
            $students = User::where('kelas', $selectedExam->class_id)->get();
            $corrections = ExamCorrection::where('exam_id', $selectedExam->id)->get();
        }

        return view('admin.exam.history')->with([
            'exams' => $exams,
            'selectedExam' => $selectedExam,
            'students' => $students,
            'corrections' => $corrections,
        ]);
    }

    public function examHistoryForm($id = null) {
        $examId = $_GET['examId'];
        $subjects = ExamSubject::where('exam_id', $examId)->get();

        return view('admin.exam.history-form')->with([
            'subjects' => $subjects,
            'examId' => $examId,
            'userId' => $id,
        ]);
    }

    public function examHistorySave(Request $input, $id = null) {
        // return $input;

        $exam = Exam::findOrFail($input->exam_id);

        $correction = ExamCorrection::where('student_id', $input->user_id)
                                    ->where('exam_id', $exam->id)
                                    ->get();
        
        if($correction->count() > 0) {
            ExamCorrection::where('student_id', $input->user_id)->where('exam_id', $exam->id)->delete();
        }

        foreach ($input->exam_subject_id as $key => $subjectId) {
            $correction = new ExamCorrection;
            $correction->student_id = $input->user_id;
            $correction->exam_subject_id = $input->exam_subject_id[$key];
            $correction->class_id = $exam->class_id;
            $correction->exam_id = $exam->id;
            $correction->question_total = $input->question_total[$key];
            $correction->correct = $input->correct[$key];
            $correction->incorrect = $input->incorrect[$key];
            $correction->score = $input->score[$key];
            $correction->save();
        }

        // $examId = $_GET['examId'];
        // $subjects = ExamSubject::where('exam_id', $examId)->get();

        return redirect()->route('admin.exam.history', ['examId' => $exam->id]);
    }

}
